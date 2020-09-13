<?php

namespace App\Http\Controllers\Api;

use App\BusinessModel;
use App\BusinessTeam;
use App\Cofounder;
use App\CofounderDetail;
use App\CofounderRole;
use App\ContactDetail;
use App\Http\Controllers\Controller;
use App\Http\Resources\BusinessTeamCollection;
use App\Http\Resources\CofounderRoleCollection;
use App\Http\Resources\ProductProgressCollection;
use App\Http\Resources\StartupCollection;
use App\Http\Resources\StartupIndustryCollection;
use App\Http\Resources\StartupTypeCollection;
use App\ProductDetail;
use App\ProductProgress;
use App\Startup;
use App\StartupDetail;
use App\StartupIndustry;
use App\StartupTeam;
use App\StartupType;
use App\Traits\ApiBaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

/**
 * @group Startup Registration
 * API routes for registering startups on the platform
 *
 * @authenticated
 *
 * Class StartupRegistrationApiController
 * @package App\Http\Controllers\Api
 */
class StartupRegistrationApiController extends Controller
{
    use ApiBaseController;

    /**
     * User(Entrepreneur) Startups.
     *
     * Startups registered by the logged in entrepreneur, both approved and unapproved.
     *
     * @apiResourceCollection App\Http\Resources\StartupCollection
     * @apiResourceModel App\Startup
     * @return StartupCollection
     */
    public function startups()
    {
        //find the logged in user
        $user = auth()->user();
        return new StartupCollection($user->startups);
    }

    /**
     *Register a Startup
     *
     * Registers a startup. First step out of 7 steps.
     * The same route is used to update the startup, if startup id is provided.
     * When registration is done, a startup id is returned. This then can be used for the next stages.
     *
     * @bodyParam company_name string required The name of the startup Example: Jane Ventures
     * @bodyParam caption string required The caption of the startup.
     * @bodyParam product_image_file file  The image of the startup product. Do not submit a null image field.
     * @bodyParam funds_to_raise string required The funds to raise for startup Example: Ghc 234.00
     * @bodyParam duration_for_raise string required The duration needed to raise funds Example: 3 months.
     * @bodyParam startup_id int The id of the startup if updating Example: 1
     *
     * @response 200 {
     * "success": {
     * "code": 200,
     * "message": "Request completed successfully."
     * },
     * "data": {
     * "startup_id": 1,
     * "uuid": 'EIFAJEAF-EAFHEOA-4343D",
     * }
     * }
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function registerStartup(Request $request)
    {

        //perform different validation if request has startup id - it means validation should match update
        if ($request->has('startup_id')) {
            $validator = Validator::make($request->all(), [
                'company_name' => 'required|string|max:255|unique:startups,company_name,' . $request['startup_id'],
                'caption' => 'required|string|max:255',
                'product_image_file' => 'nullable|image',
                'funds_to_raise' => 'required|string',
                'duration_for_raise' => 'required|string',
                'startup_id' => 'nullable|integer|exists:startups,id'
            ]);
        } else {
            $validator = Validator::make($request->all(), [
                'company_name' => 'required|string|max:255|unique:startups',
                'caption' => 'required|string|max:255',
                'product_image_file' => 'nullable|image',
                'funds_to_raise' => 'required|string',
                'duration_for_raise' => 'required|string',
                'startup_id' => 'nullable|integer|exists:startups,id'
            ]);
        }


        //send validation error response if any
        if ($validator->fails()) {
            return $this->sendErrorResponse($validator->errors()->first());
        }

        //attach the user id
        $request['user_id'] = auth()->user()->id;

        //save image to disk, get url
        if ($request->hasFile('product_image_file')) {
            // store on s3
            $path = $request->file('product_image_file')->store('startups/' . $request['company_name'], 's3');
            //save the image name the database
            $request['product_image'] = $path;
        }

        //create or update the startup details information
        if ($request->has('startup_id')) {
            $startup = Startup::query()->find($request['startup_id']);
            $startup->update($request->all());
        } else {
            $startup = Startup::query()->create($request->all());
        }

        return $this->sendSuccessResponse(['startup_id' => $startup->id]);
    }

    /**
     * Data For Startup Details Registration.
     *
     * The endpoint provides startup types and startup industries which will be needed
     * to populate a select input for startup details registration by entrepreneur
     *
     * @response 200 {
     * "startup_types": {
     * "data": [
     * {
     * "id": 1,
     * "uuid": "EIFAJEAF-EAFHEOA-4343D",
     * "name": "LLP - Limited liability Partnership"
     * },
     * {
     * "id": 2,
     * "uuid": "EIFAJEAF-EAFHEOA-4343D",
     * "name": "LP - Limited Partnership"
     * }
     * ]
     * },
     * "startup_industries": {
     * "data": [
     * {
     * "id": 1,
     * "uuid": "EIFAJEAF-EAFHEOA-4343D",
     * "name": "Agriculture"
     * },
     * {
     * "id": 2,
     * "uuid": "EIFAJEAF-EAFHEOA-4343D",
     * "name": "Finance"
     * }
     * ]
     * }
     * }
     * @return array
     */
    public function dataForStartupDetailsRegistration()
    {
        return [
            'startup_types' => new StartupTypeCollection(StartupType::all()),
            'startup_industries' => new StartupIndustryCollection(StartupIndustry::all())
        ];
    }

    /**
     * Startup Detail for a Startup
     *
     * Updates a startup with further startup details.
     * The same route is used to update.
     *
     * @bodyParam startup_id int required The id of the startup that startup details belong to Example: 1
     * @bodyParam startup_type_id int required The id of the startup type - ie LIMITED Example: 1
     * @bodyParam startup_industry_id int required The id of the startup industry - ie Agriculture Example: 1
     * @bodyParam has_patent boolean required  Startup has patent or not. Example: 1 for tru, 0 for false
     * @bodyParam location string  Startup location.
     * @bodyParam business_registration_number string required  Startup business registration number.
     *
     * @response 200 {
     * "success": {
     * "code": 200,
     * "message": "Request completed successfully."
     * }
     * }
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function startupDetail(Request $request)
    {
        //validate credentials
        $validator = Validator::make($request->all(), [
            'startup_id' => 'required|integer|exists:startups,id',
            'startup_type_id' => 'required|integer|exists:startup_types,id',
            'startup_industry_id' => 'required|integer|exists:startup_industries,id',
            'has_patent' => 'required|boolean',
            'location' => 'nullable|string',
            'business_registration_number' => 'required|string',
        ]);

        //send validation error response if any
        if ($validator->fails()) {
            return $this->sendErrorResponse($validator->errors()->first());
        }

        //update or create based on startup id
        StartupDetail::query()->updateOrCreate(
            ['startup_id' => $request['startup_id']],
            $request->all()
        );

        return $this->sendSuccessResponse();
    }

    /**
     * Contact Details for a Startup
     *
     * Updates a startup with Contact details.
     * The same route is used to update.
     *
     * @bodyParam startup_id int required The id of the startup that contact details belongs to. Example: 1
     * @bodyParam id int The id of the contact detail data when updating. This is used to enhance uniqueness validation for email. Example: 1
     * @bodyParam email string required The email of the startup. Example: jane@ventures.com
     * @bodyParam phone string required The phone number of the startup. Example 02438373838, 383738373
     * @bodyParam facebook_handle string  The facebook handle of the startup.
     * @bodyParam twitter_handle string  The twitter handle of the startup.
     * @bodyParam instagram_handle string  The instagram handle of the startup.
     * @bodyParam linkdin_handle string  The linkdin handle of the startup.
     * @bodyParam skype_handle string  The skype handle of the startup.
     *
     * @response 200 {
     * "success": {
     * "code": 200,
     * "message": "Request completed successfully."
     * }
     * }
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function startupContactDetail(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'startup_id' => 'required|integer|exists:startups,id',
            'email' => 'required|email|max:255',
            'phone' => 'required',
            'facebook_handle' => 'nullable|string|max:255',
            'twitter_handle' => 'nullable|string|max:255',
            'instagram_handle' => 'nullable|string|max:255',
            'linkdin_handle' => 'nullable|string|max:255',
            'skype_handle' => 'nullable|string|max:255',
        ]);


        //send validation error response if any
        if ($validator->fails()) {
            return $this->sendErrorResponse($validator->errors()->first());
        }

        //update or create a contact detail based on startup
        ContactDetail::query()->updateOrCreate(
            ['startup_id' => $request['startup_id']],
            $request->all()
        );

        return $this->sendSuccessResponse();
    }

    /**
     * Business Model for a Startup
     *
     * Updates a startup with Business model detail.
     * The same route is used to update.
     *
     * @bodyParam startup_id int required The id of the startup that business model belongs to. Example: 1
     * @bodyParam key_resources string  Startup key resources.
     * @bodyParam customer_target string  Startup customer target.
     * @bodyParam value_proposition string  Startup value proposition.
     * @bodyParam sales_channels string  Startup sales channel.
     * @bodyParam revenue_streams string  Startup revenue streams.
     * @bodyParam key_metrics string  Startup key metrics.
     * @bodyParam cost_structure string  Startup cost structure.
     * @bodyParam financial_file_upload file  Startup financial file (format - pdf, word, etc).
     * @bodyParam optional_file_upload file  Startup optional documents (format - pdf, word, etc).
     *
     * @response 200 {
     * "success": {
     * "code": 200,
     * "message": "Request completed successfully."
     * }
     * }
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function startupBusinessModel(Request $request)
    {
        //validate credentials
        $validator = Validator::make($request->all(), [
            'startup_id' => 'required|integer|exists:startups,id',
            'key_resources' => 'nullable|string',
            'customer_target' => 'nullable|string',
            'value_proposition' => 'nullable|string',
            'sales_channels' => 'nullable|string',
            'revenue_streams' => 'nullable|string',
            'key_metrics' => 'nullable|string',
            'cost_structure' => 'nullable|string',
            'financial_file_upload' => 'nullable|file',
            'optional_file_upload' => 'nullable|file',
        ]);


        //send validation error response if any
        if ($validator->fails()) {
            return $this->sendErrorResponse($validator->errors()->first());
        }

        //find the startup
        $startup = Startup::find($request['startup_id']);

        //save image to disk, get url
        if ($request->hasFile('financial_file_upload')) {
            // store on s3
            $path = $request->file('financial_file_upload')->store('startups/' . $startup->company_name, 's3');
            //save the image name the database
            $request['financial_file'] = $path;
        }

        //save image to disk, get url
        if ($request->hasFile('optional_file_upload')) {
            // store on s3
            $path = $request->file('optional_file_upload')->store('startups/' . $startup->company_name, 's3');
            //save the image name the database
            $request['optional_file'] = $path;
        }

        //update or create based on startup id
        BusinessModel::query()->updateOrCreate(
            ['startup_id' => $request['startup_id']],
            $request->all()
        );

        return $this->sendSuccessResponse();
    }

    /**
     * Data for Product Detail Registration
     *
     * The endpoint provides product progress which will be needed
     * to populate a select input for startup product details registration by entrepreneur
     *
     * @response 200 {
     *"data": [
     * {
     * "id": 1,
     * "uuid": "EIFAJEAF-EAFHEOA-4343D",
     * "name": "Concept only"
     * },
     * {
     * "id": 2,
     * "uuid": "EIFAJEAF-EAFHEOA-4343D",
     * "name": "Product development"
     * }]
     *
     * }
     * @return ProductProgressCollection
     */
    public function dataForProductDetailRegistration()
    {
        return new ProductProgressCollection(ProductProgress::all());
    }

    /**
     * Product Detail for a Startup
     *
     * Updates a startup with product detail.
     * The same route is used to update.
     *
     * @bodyParam startup_id int required The id of the startup that product detail belongs to. Example: 1
     * @bodyParam product_progress_id int required The id of the startup progress. Example: 1
     * @bodyParam product_url string  Startup product url.
     *
     * @response 200 {
     * "success": {
     * "code": 200,
     * "message": "Request completed successfully."
     * }
     * }
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function startupProductDetail(Request $request)
    {
        //validate credentials
        $validator = Validator::make($request->all(), [
            'startup_id' => 'required|integer|exists:startups,id',
            'product_progress_id' => 'required|integer|exists:product_progresses,id',
            'product_url' => 'nullable|string',
        ]);


        //send validation error response if any
        if ($validator->fails()) {
            return $this->sendErrorResponse($validator->errors()->first());
        }

        //update or create based on startup id
        ProductDetail::query()->updateOrCreate(
            ['startup_id' => $request['startup_id']],
            $request->all()
        );

        return $this->sendSuccessResponse();
    }

    /**
     * Data for Cofounder Details registration
     *
     * The endpoint provides cofounder roles which will be needed
     * to populate a select input for startup cofounder details registration by entrepreneur
     *
     * @response 200 {
     *"data": [
     * {
     * "id": 1,
     * "uuid": "EIFAJEAF-EAFHEOA-4343D",
     * "name": "Chairman"
     * },
     * {
     * "id": 2,
     * "uuid": "EIFAJEAF-EAFHEOA-4343D",
     * "name": "Chief Executive Officer"
     * }]
     * }
     *
     *
     * @return CofounderRoleCollection
     */
    public function dataForCofounderDetailsRegistration()
    {
        return new CofounderRoleCollection(CofounderRole::all());
    }

    /**
     *Cofounder Detail for a Startup
     *
     * Updates a startup with product detail.
     * The same route is used to update.
     * As part of the parameters provided, the cofounders parameter accepts an array of cofounder personal
     * information object. The nature is as this: <br><code>
     * [<br>
     * {<br>
     * name: 'Jane Doe',<br>
     * email: 'jane@doe.com',<br>
     * cofounder_role_id: 4<br>
     * },<br>
     * {<br>
     * name: 'John Doe',<br>
     * email: 'john@doe.com',<br>
     * cofounder_role_id: 5<br>
     * }<br>
     * ]<br>
     * </code><br>
     * <b>The data submitted for cofounders will replace any existing record.</b>
     *
     * @bodyParam startup_id int required The id of the startup that cofounder detail belongs to Example: 1
     * @bodyParam funding_amount numeric required The amount for funding Example: 3000.0
     * @bodyParam funding_amount numeric required The amount for funding Example: 3000.0
     * @bodyParam rate_of_devotion string required  Devotion entrepreneurs put into startup. Could be any of the following: Part time dedication(<35 hours per week), Full time dedication(>35 hours per week), I don’t know
     * @bodyParam cofounders array required name, email, cofounder_role_id object of as many cofounders stored in an array.
     *
     * @response 200 {
     * "success": {
     * "code": 200,
     * "message": "Request completed successfully."
     * }
     * }
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function startupCofounderDetails(Request $request)
    {
        //Rate of devotion
//        Part time dedication(<35 hours per week)
//        Full time dedication(>35 hours per week)
//        I don’t know

        //validate credentials
        $validator = Validator::make($request->all(), [
            'startup_id' => 'required|integer|exists:startups,id',
            'funding_amount' => 'required|numeric|min:1',
            'rate_of_devotion' => 'required|string',
            'cofounders' => 'required|array'
        ]);

        //send validation error response if any
        if ($validator->fails()) {
            return $this->sendErrorResponse($validator->errors()->first());
        }
        //execute in transaction
        DB::beginTransaction();

        //create or update co-founder detail
        //update or create based on startup id
        $cofounderDetail = CofounderDetail::query()->updateOrCreate(
            ['startup_id' => $request['startup_id']],
            $request->all()
        );

        //delete already existing cofounders
        $cofounderDetail->cofounders()->delete();

        //loop through the cofounder arrays, attach detail id, save them
        //cofounders array/json
//        [
//      {
//          name: 'Jane Doe',
//        email: 'jane@doe.com',
//        cofounder_role_id: 4
//      },
//      {
//          name: 'John Doe',
//        email: 'john@doe.com',
//        cofounder_role_id: 5
//      }
//    ]
        Collect($request['cofounders'])->each(function ($cofounderArray) use ($cofounderDetail) {
            Cofounder::query()->create(
                [
                    'email' => $cofounderArray['email'],
                    'name' => $cofounderArray['name'],
                    'cofounder_role_id' => $cofounderArray['cofounder_role_id'],
                    'cofounder_detail_id' => $cofounderDetail->id,
                ]
            );
        });

        DB::commit();

        //return response
        return $this->sendSuccessResponse();
    }

    /**
     * Data for Startup Team registration
     *
     * The endpoint provides business teams  which will be needed
     * to populate a select input for startup teams registration by entrepreneur
     *
     * @response 200 {
     *"data": [
     * {
     * "id": 1,
     * "uuid":"'EIFAJEAF-EAFHEOA-4343D",
     * "name": "Sales and marketing team",
     * "description": "Responsible for bringing the product to market. They use several approaches to get the word out regarding their new invention."
     * },
     * {
     * "id": 2,
     * "uuid": "EIFAJEAF-EAFHEOA-4343D",
     * "name": "Operations and Production team",
     * "description": "Responsible for bringing the product to life. They receive the product's vision and bring it into its finished stage."
     * }]
     *
     * }
     *
     * @return BusinessTeamCollection
     */
    public function dataForStartupTeamRegistration()
    {
        return new BusinessTeamCollection(BusinessTeam::all());
    }


    /**
     * Startup Teams for a Startup
     *
     * Updates a startup with startup team. This marks the startup registration complete.
     * The same route is used to update. <br>
     * Startup team consist of name of person, and the id of the business team member belongs to.
     * ie. John Belongs to Marketing team.
     *
     * As part of the parameters provided, the startup_teams parameter accepts an array of members
     * and their respective business teams. The nature is as this: <br><code>
     * [<br>
     * {<br>
     * name: 'Jane Doe',<br>
     * business_team_id: 1, //ie Marketing business team<br>
     * },<br>
     * {<br>
     * name: 'John Doe',<br>
     * business_team_id: 3,  //ie CEO business team<br>
     * }<br>
     * ]<br>
     * </code><br>
     * <b>The data submitted for startup_teams will replace any existing record.</b>
     *
     * @bodyParam startup_id int required The id of the startup that startup teams belongs to Example: 1
     * @bodyParam startup_teams array required name, business_team_id object of as many startup teams stored in an array.
     *
     * @response 200 {
     * "success": {
     * "code": 200,
     * "message": "Request completed successfully."
     * }
     * }
     *
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function startupTeam(Request $request)
    {
        //validate credentials
        $validator = Validator::make($request->all(), [
            'startup_id' => 'required|integer|exists:startups,id',
            'startup_teams' => 'required|array'
        ]);

        //send validation error response if any
        if ($validator->fails()) {
            return $this->sendErrorResponse($validator->errors()->first());
        }

        //execute in transaction
        DB::beginTransaction();
        //find the startup
        $startup = Startup::query()->find($request['startup_id']);
        //delete all startup teams
        $startup->startup_teams()->delete();
        //add new startup teams
        //startup_teams array/json
//        [
//      {
//          name: 'Jane Doe',
//        business_team_id: 1,
//      },
//      {
//          name: 'John Doe',
//        business_team_id: 3,
//      }
//    ]
        Collect($request['startup_teams'])->each(function ($teamArray) use ($startup) {
            StartupTeam::query()->create(
                [
                    'name' => $teamArray['name'],
                    'business_team_id' => $teamArray['business_team_id'],
                    'startup_id' => $startup->id
                ]
            );
        });

        // indicate startup registration is complete
        $startup->update(['registration_is_complete' => 1]);

        DB::commit();

        //return response
        return $this->sendSuccessResponse();
    }

}
