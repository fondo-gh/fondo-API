<?php


namespace App\Traits;


use App\User;

trait ApiBaseController
{

    /**
     * Error response for api calls, default error - 422, is validation error
     * @param string $message
     * @param int $status
     * @return \Illuminate\Http\JsonResponse
     */
    public function sendErrorResponse($message = "An error occurred.", $status = 422) {
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
    public function sendSuccessResponse($data = [], $message = "Request completed successfully.") {
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
    public function generateUserData(User $user) {
        $data = array();
        $data['id'] = $user->id;
        $data['first_name'] = $user->first_name;
        $data['last_name'] = $user->last_name;
        $data['email'] = $user->email;
        $data['picture'] = $user->picture;
        $data['user_type'] = $user->user_type->name;
        $data['token'] = $user->createToken(env('APP_NAME'))->accessToken;
        return $data;
    }
}
