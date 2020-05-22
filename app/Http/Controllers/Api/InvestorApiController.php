<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\StartupCollection;
use App\Startup;
use App\Traits\ApiBaseController;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

/**
 * @group Investor
 *
 * Investor and startups management endpoints.
 * @authenticated
 *
 * Class InvestorApiController
 * @package App\Http\Controllers\Api
 */
class InvestorApiController extends Controller
{

    use ApiBaseController;

    /**
     * Startups.
     *
     * Startups registered by all entrepreneurs and approved by the admins.
     *
     * @apiResourceCollection App\Http\Resources\StartupCollection
     * @apiResourceModel App\Startup
     * @return StartupCollection
     */
    public function startups()
    {
        return new StartupCollection(Startup::approved()->get());
    }

    /**
     * Complete Investor Profile
     * Provide required additional data about investor such as a short bio, occupations etc
     *
     * @bodyParam bio string required A short bio of investor.
     * @bodyParam interests string  A short note of investor's interests.
     * @bodyParam startups_invested_in string Startups investor invested in if any.
     * @bodyParam amount_invested string Amount investor invested in startups if any.
     * @bodyParam occupations string required Occupation(s) of investor.
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
    public function completeProfile(Request $request)
    {
        //validate credentials
        $validator = Validator::make($request->all(), [
            'bio' => 'required|string',
            'interests' => 'nullable|string',
            'startups_invested_in' => 'nullable|string',
            'amount_invested' => 'nullable|string',
            'occupations' => 'required|string',
        ]);


        //send validation error response if any
        if ($validator->fails()) {
            return $this->sendErrorResponse($validator->errors()->first());
        }

        //find the user
        $user = auth()->user();

        //set the profile completed flag to true
        $request['profile_is_completed'] = 1;

        //update the investor details
        $user->investor->update($request->all());

        return $this->sendSuccessResponse();
    }
}
