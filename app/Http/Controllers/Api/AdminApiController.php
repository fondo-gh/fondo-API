<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\InvestorCollection;
use App\Http\Resources\StartupCollection;
use App\Http\Resources\UserCollection;
use App\Investor;
use App\Startup;
use App\Traits\ApiBaseController;
use App\User;
use App\UserType;
use Illuminate\Http\Request;
use App\Http\Resources\Startup as StartupResource;
use Illuminate\Support\Facades\Validator;

/**
 * @group Admin Startup Management
 * Management of startups by Administrators.
 *
 * @authenticated
 * Class AdminApiController
 * @package App\Http\Controllers\Api
 */
class AdminApiController extends Controller
{

    use ApiBaseController;

    /**
     * Startups.
     *
     * Startups registered by all entrepreneurs, both approved and unapproved
     *
     * @apiResourceCollection App\Http\Resources\StartupCollection
     * @apiResourceModel App\Startup
     * @return StartupCollection
     */
    public function startups()
    {
        return new StartupCollection(Startup::all());
    }

    /**
     * Startups for Entrepreneur.
     *
     * Startups registered by an entrepreneur, both approved and unapproved
     * @queryParam userId required The id of the user (entrepreneur) Example: 1
     *
     * @apiResourceCollection App\Http\Resources\StartupCollection
     * @apiResourceModel App\Startup
     * @param $userId
     * @return StartupCollection
     */
    public function startupsForEntrepreneur($userId)
    {
        //find the user
        $user = User::query()->find($userId);
        return new StartupCollection($user->startups);
    }

    /**
     *
     * Approve a Startup
     *
     * Registers a user as an entrepreneur or investor.
     *
     * @bodyParam startup_id id required The id of the startup to approve. Example: 1
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
    public function approveStartup(Request $request)
    {
        //validate credentials
        $validator = Validator::make($request->all(), [
            'startup_id' => 'required|integer|exists:startups,id',
        ]);

        //send validation error response if any
        if ($validator->fails()) {
            return $this->sendErrorResponse($validator->errors()->first());
        }

        //find the startup
        $startup = Startup::query()->find($request['startup_id']);

        //approve startup
        $startup->update(['approved' => 1]);

        return $this->sendSuccessResponse();
    }

    /**
     *Entrepreneurs.
     *
     * All entrepreneurs registered on the system.
     *
     * @apiResourceCollection App\Http\Resources\UserCollection
     * @apiResourceModel App\User
     * @return UserCollection
     */
    public function entrepreneurs()
    {
        //get users who are entrepreneurs
        $users = User::query()->where('user_type_id', UserType::USER_TYPE_ENTREPRENEUR_ID)->get();
        return new UserCollection($users);
    }

    /**
     *Investors.
     *
     * All investors registered on the system.
     *
     * @apiResourceCollection App\Http\Resources\InvestorCollection
     * @apiResourceModel App\Investor
     * @return InvestorCollection
     */
    public function investors()
    {
        //get all investors
        return new InvestorCollection(Investor::all());
    }

}
