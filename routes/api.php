<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});


/**
 * Normal routes
 */
Route::group(['prefix' => 'v1', 'namespace' => 'Api'], function () {
    /**
     * Authentication routes for user
     */
    Route::post('user/login', 'AuthApiController@loginUser');
    Route::get('user/types', 'AuthApiController@userTypes');
    Route::post('user/register', 'AuthApiController@registerUser');
});

/**
 *Authenticated routes
 */
Route::group(['prefix' => 'v1', 'middleware' => 'auth:user', 'namespace' => 'Api'], function () {
    Route::post('startup/register', 'StartupRegistrationApiController@registerStartup');
    Route::post('startup/startup_detail', 'StartupRegistrationApiController@startupDetail');
    Route::post('startup/contact_detail', 'StartupRegistrationApiController@startupContactDetail');
    Route::post('startup/business_model', 'StartupRegistrationApiController@startupBusinessModel');
    Route::post('startup/product_detail', 'StartupRegistrationApiController@startupProductDetail');
});



//fallback route
Route::fallback(function () {
    return response()->json(
        [
            'error' => [
                'code' => 404,
                'message' => "API route does not exist."
            ]
        ],
        404
    );
});
