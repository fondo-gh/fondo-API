<?php


namespace App\Http\Controllers\Api;

use App\Admin;
use App\Http\Resources\UserTypeCollection;
use App\Investor;
use App\Mail\AdminResetPasswordMail;
use App\Mail\UserResetPasswordMail;
use App\Traits\ApiBaseController;
use App\User;
use App\UserType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\Investor as InvestorResource;
use App\Http\Resources\User as UserResource;
use Illuminate\Support\Str;

/**
 * @group User and Admin Management
 *
 * APIs for managing users - entrepreneurs and investors
 */
class AuthApiController extends Controller
{
    use ApiBaseController;


    /**
     *  Get User types
     *
     * Displays listing of user types needed to register for an account on the system
     *
     * @apiResourceCollection App\Http\Resources\UserTypeCollection
     * @apiResourceModel App\UserType
     * @return UserTypeCollection
     */
    public function userTypes()
    {
        return new UserTypeCollection(UserType::all());
    }


    /**
     * Login a User
     *
     * Authenticates an entrepreneur or investor.
     *
     * @bodyParam email string required The email of the user. Example: mail@mail.com
     * @bodyParam password string required The password of the user.
     *
     * @response 200 {
     * "success": {
     * "code": 200,
     * "message": "Request completed successfully."
     * },
     * "data": {
     * "id": 1,
     * "uuid": "EIFAJEAF-EAFHEOA-4343D",
     * "first_name": "Jane",
     * "last_name": "Doe",
     * "email": "jane@doe.com",
     * "picture": "http://www.fondo.com/user/kkjdfj.jpg",
     * "user_type": "Investor",
     * "profile_is_completed": "false",
     * "token": "7geRI9P4LUFj3ensaxOV070Uk1yXeQ23ptqerJYc",
     *  }
     * }
     *
     * @response 404 {
     *  "error": {
     *  "code": 422,
     *  "message": "Invalid credentials."
     *   }
     *}
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function loginUser(Request $request)
    {
        //validate credentials
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        //send validation error response if any
        if ($validator->fails()) {
            return $this->sendErrorResponse($validator->errors()->first());
        }

        //extract credentials
        $credentials = $request->only(['email', 'password']);

        //attempt login, if successful, send back response
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            //data to be sent back
            $data = $this->generateUserData($user);
            return $this->sendSuccessResponse($data);
        }

        //if authentication fails, send error response
        return $this->sendErrorResponse("Invalid credentials.");
    }

    /**
     * Register a User
     *
     * Registers a user as an entrepreneur or investor.
     *
     * @bodyParam first_name string required The first name of the user. Example: Jane
     * @bodyParam last_name string required The last name of the user. Example: Doe
     * @bodyParam picture_upload file  The image of the person. Do not submit a null picture field.
     * @bodyParam user_type_id int required The id of the type of user. Example: 1 for Entrepreneur, 2 for Investor
     * @bodyParam email string required The email of the user. Example: mail@mail.com
     * @bodyParam password string required The password of the user.
     * @bodyParam password_confirmation string required The password confirmation for the password.
     *
     * @response 200 {
     * "success": {
     * "code": 200,
     * "message": "Request completed successfully."
     * },
     * "data": {
     * "id": 1,
     * "uuid": "EIFAJEAF-EAFHEOA-4343D",
     * "first_name": "Jane",
     * "last_name": "Doe",
     * "email": "jane@doe.com",
     * "picture": "http://www.fondo.com/user/kkjdfj.jpg",
     * "user_type": "Entrepreneur",
     * "profile_is_completed": "true",
     * "token": "7geRI9P4LUFj3ensaxOV070Uk1yXeQ23ptqerJYc"
     *    }
     * }
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function registerUser(Request $request)
    {
        //validate credentials
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'picture_upload' => 'nullable|image',
            'user_type_id' => 'required|integer|exists:user_types,id',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed'
        ]);

        //send validation error response if any
        if ($validator->fails()) {
            return $this->sendErrorResponse($validator->errors()->first());
        }

        //save image to disk, get url
        if ($request->hasFile('picture_upload')) {
            // store on s3
            $path = $request->file('picture_upload')->store('users', 's3');
            //save the image name the database
            $request['picture'] = $path;
        }

        DB::beginTransaction();

        //create the user
        $user = User::query()->create($request->all());

        //if the user user is an investor, create an investor table
        if ($user->user_type_id == UserType::USER_TYPE_INVESTOR_ID) {
            Investor::query()->create(['user_id' => $user->id]);
        }

        DB::commit();

        //data to be sent back
        return $this->sendSuccessResponse($this->generateUserData($user));
    }


    /**
     * Login an Admin
     *
     * Authenticates an administrator.
     *
     * @bodyParam email string required The email of the admin. Example: mail@mail.com
     * @bodyParam password string required The password of the admin.
     *
     * @response 200 {
     * "success": {
     * "code": 200,
     * "message": "Request completed successfully."
     * },
     * "data": {
     * "id": 1,
     * "uuid": "EIFAJEAF-EAFHEOA-4343D",
     * "name": "Jane Doe",
     * "email": "jane@doe.com",
     * "token": "7geRI9P4LUFj3ensaxOV070Uk1yXeQ23ptqerJYc"
     *  }
     * }
     *
     * @response 422 {
     *  "error": {
     *  "code": 422,
     *  "message": "Invalid credentials."
     *   }
     *}
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function loginAdmin(Request $request)
    {
        //validate credentials
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        //send validation error response if any
        if ($validator->fails()) {
            return $this->sendErrorResponse($validator->errors()->first());
        }

        //extract credentials
        $credentials = $request->only(['email', 'password']);

        //attempt login, if successful, send back response
        if (Auth::guard('admin')->attempt($credentials)) {
            $admin = Auth::guard('admin')->user();
            //data to be sent back
            $data = $this->generateAdminData($admin);
            return $this->sendSuccessResponse($data);
        }

        //if authentication fails, send error response
        return $this->sendErrorResponse("Invalid credentials.");
    }


    /**
     * User Profile
     * Gets the profile for investor or entrepreneur
     *
     * @apiResource App\Http\Resources\Investor
     * @apiResourceModel App\Investor
     *
     * @return InvestorResource|UserResource
     */
    public function profile()
    {
        //find the user
        $user = auth()->user();

        if ($user->user_type_id == UserType::USER_TYPE_INVESTOR_ID) {
            return new InvestorResource($user->investor);
        }

        return new UserResource($user);
    }

    /**
     * Send Reset Password for User
     * Generates password reset code for users and sends to mail with instruction.
     *
     * @bodyParam email string required The email of the user. Example: mail@mail.com
     *
     * @response 200 {
     * "success": {
     * "code": 200,
     * "message": "The reset code is sent via email. Kindly follow the mail to complete the password reset process."
     * },
     * "data": []
     * }
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function generatePasswordResetCodeForUser(Request $request)
    {
        $validator = Validator::make($request->all(), ['email' => 'required|email|max:255|exists:users,email']);

        if ($validator->fails()) {
            return $this->sendErrorResponse($validator->errors()->first());
        }

        $user = User::query()->where('email', $request['email'])->first();
        $user->update(['reset_code' => strtoupper(Str::random(5))]);

        //send mail to user
        Mail::send(new UserResetPasswordMail($user));

        return $this->sendSuccessResponse([], "The reset code is sent via email. Kindly follow the mail to complete the password reset process.");
    }

    /**
     *Reset Password for User
     *Reset the password for user using the detail provided.
     *
     * @bodyParam reset_code string required The reset code sent via mail. Example: LKJFAIE
     * @bodyParam email string required The email of the user. Example: mail@mail.com
     * @bodyParam password string required The password of the user.
     * @bodyParam password_confirmation string required The password confirmation of the user.
     *
     * @response 200 {
     * "success": {
     * "code": 200,
     * "message": "Request completed successfully."
     * },
     * "data": {
     * "id": 1,
     * "uuid": "EIFAJEAF-EAFHEOA-4343D",
     * "first_name": "Jane",
     * "last_name": "Doe",
     * "email": "jane@doe.com",
     * "picture": "http://www.fondo.com/user/kkjdfj.jpg",
     * "user_type": "Entrepreneur",
     * "profile_is_completed": "true",
     * "token": "7geRI9P4LUFj3ensaxOV070Uk1yXeQ23ptqerJYc"
     *    }
     * }
     *
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function passwordResetWithCodeForUser(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'reset_code' => 'required|exists:users,reset_code',
            'email' => 'required|email|exists:users,email',
            'password' => 'required|string|min:8|confirmed'
        ]);

        if ($validator->fails()) {
            return $this->sendErrorResponse($validator->errors()->first());
        }
        //find the right user to reset password for
        $user = User::query()->where('email', $request['email'])->where('reset_code', $request['reset_code'])->first();
        if (!$user) {
            return $this->sendErrorResponse("No record is found for email and reset code.");
        }

        //update the password
        $user->update(['reset_code' => null, 'password' => $request['password']]);

        //data to be sent back
        $data = $this->generateUserData($user);
        return $this->sendSuccessResponse($data, "Password Reset successful.");
    }

    /**
     * Send Reset Password for Admin
     * Generates password reset code for admins and sends to mail with instruction.
     *
     * @bodyParam email string required The email of the admin. Example: mail@mail.com
     *
     * @response 200 {
     * "success": {
     * "code": 200,
     * "message": "The reset code is sent via email. Kindly follow the mail to complete the password reset process."
     * },
     * "data": []
     * }
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function generatePasswordResetCodeForAdmin(Request $request)
    {
        $validator = Validator::make($request->all(), ['email' => 'required|email|max:255|exists:admins,email']);

        if ($validator->fails()) {
            return $this->sendErrorResponse($validator->errors()->first());
        }

        $admin = Admin::query()->where('email', $request['email'])->first();
        $admin->update(['reset_code' => strtoupper(Str::random(5))]);

        //send mail to user
        Mail::send(new AdminResetPasswordMail($admin));

        return $this->sendSuccessResponse([], "The reset code is sent via email. Kindly follow the mail to complete the password reset process.");
    }

    /**
     *Reset Password for Admin
     *Reset the password for admin using the detail provided.
     *
     * @bodyParam reset_code string required The reset code sent via mail. Example: LKJFAIE
     * @bodyParam email string required The email of the admin. Example: mail@mail.com
     * @bodyParam password string required The password of the admin.
     * @bodyParam password_confirmation string required The password confirmation of the admin.
     *
     * @response 200 {
     * "success": {
     * "code": 200,
     * "message": "Request completed successfully."
     * },
     * "data": {
     * "id": 1,
     * "uuid": "EIFAJEAF-EAFHEOA-4343D",
     * "name": "Jane Doe",
     * "email": "jane@doe.com",
     * "token": "7geRI9P4LUFj3ensaxOV070Uk1yXeQ23ptqerJYc"
     *  }
     * }
     *
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function passwordResetWithCodeForAdmin(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'reset_code' => 'required|exists:admins,reset_code',
            'email' => 'required|email|exists:admins,email',
            'password' => 'required|string|min:8|confirmed'
        ]);

        if ($validator->fails()) {
            return $this->sendErrorResponse($validator->errors()->first());
        }
        //find the right admin to reset password for
        $admin = Admin::query()->where('email', $request['email'])->where('reset_code', $request['reset_code'])->first();
        if (!$admin) {
            return $this->sendErrorResponse("No record is found for email and reset code.");
        }

        //update the password
        $admin->update(['reset_code' => null, 'password' => $request['password']]);

        //data to be sent back
        $data = $this->generateAdminData($admin);
        return $this->sendSuccessResponse($data, "Password Reset successful.");
    }

}
