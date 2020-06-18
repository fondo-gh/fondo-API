<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Investor;
use App\Startup;
use App\Traits\ApiBaseController;
use App\User;
use App\UserType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Http\Resources\BusinessModel as BusinessModelResource;
use App\Http\Resources\CofounderDetail as CofounderDetailResource;
use App\Http\Resources\ContactDetail as ContactDetailResource;
use App\Http\Resources\ProductDetail as ProductDetailResource;
use App\Http\Resources\StartupDetail as StartupDetailResource;
use App\Http\Resources\InvestorCollection;
use App\Http\Resources\SimpleStartupCollection;
use App\Http\Resources\StartupTeamCollection;
use App\Http\Resources\UserCollection;

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
     * @apiResourceCollection App\Http\Resources\SimpleStartupCollection
     * @apiResourceModel App\Startup
     * @return SimpleStartupCollection
     */
    public function startups()
    {
        return new SimpleStartupCollection(Startup::all());
    }

    /**
     * Startup Detail.
     *
     * Startup detail for selected startup.
     * @urlParam startup required The id of the startup. Example: 2
     *
     * @param Startup $startup
     * @return StartupDetailResource
     */
    public function startupDetail(Startup $startup)
    {
        return new StartupDetailResource($startup->startup_detail);
    }

    /**
     * Contact Detail.
     *
     * Contact detail for selected startup.
     * @urlParam startup required The id of the startup. Example: 2
     *
     * @param Startup $startup
     * @return ContactDetailResource
     */
    public function contactDetail(Startup $startup)
    {
        return new ContactDetailResource($startup->contact_detail);
    }

    /**
     * Business Model.
     *
     * Business Model for selected startup.
     * @urlParam startup required The id of the startup. Example: 2
     *
     * @param Startup $startup
     * @return BusinessModelResource
     */
    public function businessModel(Startup $startup)
    {
        return new BusinessModelResource($startup->business_model);
    }

    /**
     * Product Detail.
     *
     * Product Detail for selected startup.
     * @urlParam startup required The id of the startup. Example: 2
     *
     * @param Startup $startup
     * @return ProductDetailResource
     */
    public function productDetail(Startup $startup)
    {
        return new ProductDetailResource($startup->product_detail);
    }

    /**
     * Cofounder Detail.
     *
     * Cofounder Detail for selected startup.
     * @urlParam startup required The id of the startup. Example: 2
     *
     * @param Startup $startup
     * @return CofounderDetailResource
     */
    public function cofounderDetail(Startup $startup)
    {
        return new CofounderDetailResource($startup->cofounder_detail);
    }

    /**
     * Startup Team.
     *
     * Startup Team for selected startup.
     * @urlParam startup required The id of the startup Example: 2
     *
     * @apiResourceCollection App\Http\Resources\StartupTeamCollection
     * @apiResourceModel App\StartupTeam
     *
     * @param Startup $startup
     * @return StartupTeamCollection
     */
    public function startupTeam(Startup $startup)
    {
        return new StartupTeamCollection($startup->startup_teams);
    }


    /**
     * Startups for Entrepreneur.
     *
     * Startups registered by an entrepreneur, both approved and unapproved
     * @queryParam userId required The id of the user (entrepreneur). Example: 1
     *
     * @apiResourceCollection App\Http\Resources\SimpleStartupCollection
     * @apiResourceModel App\Startup
     * @param $userId
     * @return SimpleStartupCollection
     */
    public function startupsForEntrepreneur($userId)
    {
        //find the user
        $user = User::query()->find($userId);
        return new SimpleStartupCollection($user->startups);
    }

    /**
     *
     * Approve a Startup
     *
     * Approve a startup.
     *
     * @bodyParam startup_id integer required The id of the startup to approve. Example: 1
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
