<?php

namespace App\Http\Controllers\Api;

use App\BusinessModel;
use App\BusinessTeam;
use App\CofounderRole;
use App\ContactDetail;
use App\Http\Controllers\Controller;
use App\Http\Resources\BusinessTeamCollection;
use App\Http\Resources\CofounderRoleCollection;
use App\Http\Resources\ProductProgressCollection;
use App\Http\Resources\StartupIndustryCollection;
use App\Http\Resources\StartupTypeCollection;
use App\ProductDetail;
use App\ProductProgress;
use App\Startup;
use App\StartupDetail;
use App\StartupIndustry;
use App\StartupType;
use App\Traits\ApiBaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

/**
 * @group Startup Registration
 * API routes for registering startups on the platform
 *
 * Class StartupRegistrationApiController
 * @package App\Http\Controllers\Api
 */
class StartupRegistrationApiController extends Controller
{
    use ApiBaseController;

    public function startups()
    {
        //todo:implement logic
        //returns startups for the user/entrepreneur if user id is specified
        //else returns all startups
        //returns simple or all startups information format
    }

    /**
     *Register a Startup
     *
     * Registers a startup. First step out of 7 steps.
     * The same route is used to update the startup, if startup id is provided.
     * When registration is done, a startup id is returned. This then can be used for the next stages.
     *
     * @bodyParam company_name string required The name of the startup. Example: Jane Ventures
     * @bodyParam caption string required The caption of the startup.
     * @bodyParam product_image file  The image of the startup product. Do not submit a null image field.
     * @bodyParam funds_to_raise string required The funds to raise for startup. Example: Ghc 234.00
     * @bodyParam duration_for_raise string required The duration needed to raise funds. Example: 3 months.
     * @bodyParam startup_id int The id of the startup if updating. Example: 1
     *
     * @response 200 {
     * "success": {
     * "code": 200,
     * "message": "Request completed successfully."
     * },
     * "data": {
     * "startup_id": 1
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
                'product_image' => 'required|image',
                'funds_to_raise' => 'required|string',
                'duration_for_raise' => 'required|string',
                'startup_id' => 'nullable|integer|exists:startups,id'
            ]);
        } else {
            $validator = Validator::make($request->all(), [
                'company_name' => 'required|string|max:255|unique:startups',
                'caption' => 'required|string|max:255',
                'product_image' => 'required|image',
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
        if ($request->hasFile('product_image')) {
            $name = date('Y-m-d-H:i:s') . '.' . $request->file('product_image')->getClientOriginalExtension();
            $request->file('product_image')->move(public_path() . '/startups/products/', $name);

            //save the image name the database
            $request['product_image'] = $name;
        }

        //create or update the startup details information
        if ($request->has('startup_id')) {
            $startup = Startup::query()->find($request['startup_id'])->update($request->all());
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
     * "name": "LLP - Limited liability Partnership"
     * },
     * {
     * "id": 2,
     * "name": "LP - Limited Partnership"
     * },
     * ]
     * },
     * "startup_industries": {
     * "data": [
     * {
     * "id": 1,
     * "name": "Agriculture"
     * },
     * {
     * "id": 2,
     * "name": "Finance"
     * },
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
     * @bodyParam startup_id int required The id of the startup that startup details belong to. Example: 1
     * @bodyParam startup_type_id int required The id of the startup type - ie LIMITED. Example: 1
     * @bodyParam startup_industry_id int required The id of the startup industry - ie Agriculture. Example: 1
     * @bodyParam has_patent boolean required  Startup has patent or not. Example: 1 for true, 0 for false
     * @bodyParam location string  Startup location.
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
            'has_patent' => 'required|integer|max:1|min:0',
            'location' => 'nullable|string',
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
     * @bodyParam phone string required The phone number of the startup.
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
        //perform different validation if request has id - it means validation should match update
        if ($request->has('id')) {
            $validator = Validator::make($request->all(), [
                'startup_id' => 'required|integer|exists:startups,id',
                'email' => 'required|email|max:255|unique:contact_details,email,' . $request['id'],
                'phone' => 'required|digits:10',
                'facebook_handle' => 'nullable|string|max:255',
                'twitter_handle' => 'nullable|string|max:255',
                'instagram_handle' => 'nullable|string|max:255',
                'linkdin_handle' => 'nullable|string|max:255',
                'skype_handle' => 'nullable|string|max:255',
            ]);
        } else {
            $validator = Validator::make($request->all(), [
                'startup_id' => 'required|integer|exists:startups,id',
                'email' => 'required|email|max:255|unique:contact_details',
                'phone' => 'required|digits:10',
                'facebook_handle' => 'nullable|string|max:255',
                'twitter_handle' => 'nullable|string|max:255',
                'instagram_handle' => 'nullable|string|max:255',
                'linkdin_handle' => 'nullable|string|max:255',
                'skype_handle' => 'nullable|string|max:255',
            ]);
        }


        //send validation error response if any
        if ($validator->fails()) {
            return $this->sendErrorResponse($validator->errors()->first());
        }

        //update or create a startup detail based on startup
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
     * @bodyParam financial_file file  Startup financial file (format - pdf, word, etc).
     * @bodyParam optional_file file  Startup optional documents (format - pdf, word, etc).
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
            'financial_file' => 'nullable|file',
            'optional_file' => 'nullable|file',
        ]);


        //send validation error response if any
        if ($validator->fails()) {
            return $this->sendErrorResponse($validator->errors()->first());
        }

        //save image to disk, get url
        if ($request->hasFile('financial_file')) {
            $name = date('Y-m-d-H:i:s') . '.' . $request->file('financial_file')->getClientOriginalExtension();
            $request->file('financial_file')->move(public_path() . '/startups/files/', $name);

            //save the image name to the database
            $request['financial_file'] = $name;
        }

        //save image to disk, get url
        if ($request->hasFile('optional_file')) {
            $name = date('Y-m-d-H:i:s') . '.' . $request->file('optional_file')->getClientOriginalExtension();
            $request->file('optional_file')->move(public_path() . '/startups/files/', $name);

            //save the image name to the database
            $request['optional_file'] = $name;
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
     * "name": "Concept only"
     * },
     * {
     * "id": 2,
     * "name": "Product development"
     * },
     * ]
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
     * "name": "Concept only"
     * },
     * {
     * "id": 2,
     * "name": "Product development"
     * },
     *
     * ]
     * }
     *
     *
     * @return CofounderRoleCollection
     */
    public function dataForCofounderDetailsRegistration()
    {
        return new CofounderRoleCollection(CofounderRole::all());
    }

    public function startupCofounderDetails(Request $request)
    {
        //todo:implement logic
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
     * "name": "Sales and marketing team",
     * "description": "Responsible for bringing the product to market. They use several approaches to get the word out regarding their new invention."
     * },
     * {
     * "id": 2,
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

    public function startupTeam(Request $request)
    {
        //todo:implement logic
    }

}
