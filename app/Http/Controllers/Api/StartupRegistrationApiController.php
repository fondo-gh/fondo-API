<?php

namespace App\Http\Controllers\Api;

use App\ContactDetail;
use App\Http\Controllers\Controller;
use App\Startup;
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

    /**
     * * Register a Startup
     *
     * Registers a startup. First step out of 7 steps.
     * The same route is used to update the startup, if startup id is provided.
     * When registration is done, a startup id is returned. This then can be used for the next stages
     *
     * @bodyParam company_name string required The name of the startup. Example: Jane Ventures
     * @bodyParam caption string required The caption of the startup.
     * @bodyParam product_image file  The image of the startup product.
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
        //validate credentials
        $validator = Validator::make($request->all(), [
            'company_name' => 'required|string|max:255|unique:startups',
            'caption' => 'required|string|max:255',
            'product_image' => 'image',
            'funds_to_raise' => 'required|string',
            'duration_for_raise' => 'required|string',
            'startup_id' => 'nullable|integer|exists:startups'
        ]);


        //send validation error response if any
        if ($validator->fails()) {
            return $this->sendErrorResponse($validator->errors()->first());
        }

        //attach the user id
        $request['user_id'] = auth()->user()->id;

        //save image to disk, get url
        if ($request->hasFile('product_image')) {
            $name = date('Y-m-d-H:i:s') . '.' . $request->file('product_image')->getClientOriginalExtension();
            $request->file('product_image')->move(public_path() . '/startups/', $name);

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
     * Contact Details for a Startup
     *
     * Updates a startup with Contact details.
     * The same route is used to update the contact details.
     *
     * @bodyParam startup_id int required The id of the startup contact details belong to. Example: 1
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
    public function startupContactDetails(Request $request)
    {
        //validate credentials
        $validator = Validator::make($request->all(), [
            'startup_id' => 'required|integer|exists:startups',
            'email' => 'required|email|max:255|unique:startup_details',
            'phone' => 'required|digits:10',
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

        //update or create a startup detail based on startup
        ContactDetail::query()->updateOrCreate(
            ['startup_id' => $request['startup_id']],
            $request->all()
        );

        return $this->sendSuccessResponse();
    }
}
