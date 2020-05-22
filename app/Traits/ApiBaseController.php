<?php


namespace App\Traits;


use App\Admin;
use App\User;
use App\UserType;

trait ApiBaseController
{

    /**
     * Error response for api calls, default error - 422, is validation error
     * @param string $message
     * @param int $status
     * @return \Illuminate\Http\JsonResponse
     */
    public function sendErrorResponse($message = "An error occurred.", $status = 422)
    {
        return response()->json(
            [
                'error' => [
                    'code' => $status,
                    'message' => $message
                ]
            ],
            $status
        );
    }

    /**
     * Success response for api calls
     * @param $data
     * @param $message
     * @return \Illuminate\Http\JsonResponse
     */
    public function sendSuccessResponse($data = [], $message = "Request completed successfully.")
    {
        return response()->json(
            [
                'success' => [
                    'code' => 200,
                    'message' => $message
                ],
                'data' => $data
            ],
            200
        );
    }


    /**
     * @param User $user
     * @return array
     *
     */
    public function generateUserData(User $user)
    {
        //image path
        $imageUrl = $user->picture ? url('/') . '/users/' . $user->picture : '';

        $data = array();
        $data['id'] = $user->id;
        $data['uuid'] = $user->uuid;
        $data['first_name'] = $user->first_name;
        $data['last_name'] = $user->last_name;
        $data['email'] = $user->email;
        $data['picture'] = $imageUrl;
        $data['user_type'] = $user->user_type->name;
        //if user type is investor, add profile completion status
        if ($user->user_type_id == UserType::USER_TYPE_INVESTOR_ID) {
            $data['profile_is_completed'] = $user->investor->profile_is_completed;
        }

        $data['token'] = $user->createToken(env('APP_NAME'))->accessToken;
        return $data;
    }

    /**
     * @param Admin $admin
     * @return array
     */
    public function generateAdminData(Admin $admin)
    {
        $data = array();
        $data['id'] = $admin->id;
        $data['uuid'] = $admin->uuid;
        $data['name'] = $admin->name;
        $data['email'] = $admin->email;
        $data['token'] = $admin->createToken(env('APP_NAME'))->accessToken;
        return $data;
    }
}
