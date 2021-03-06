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

    Route::post('user/password/email', 'AuthApiController@sendPasswordResetEmailLinkForUser');
    Route::post('user/password/reset', 'AuthApiController@resetPasswordForUser');


    /**
     * Authentication routes for admin
     */
    Route::post('admin/login', 'AuthApiController@loginAdmin');
    Route::post('admin/password/email', 'AuthApiController@sendPasswordResetEmailLinkForAdmin');
    Route::post('admin/password/reset', 'AuthApiController@resetPasswordForAdmin');
});

/**
 *Authenticated routes for Users
 */
Route::group(['prefix' => 'v1', 'middleware' => 'auth:user-api', 'namespace' => 'Api'], function () {
    Route::get('user/startups', 'StartupRegistrationApiController@startups');
    Route::post('startup/register', 'StartupRegistrationApiController@registerStartup');

    Route::get('startup/registration/data/startup_detail', 'StartupRegistrationApiController@dataForStartupDetailsRegistration');
    Route::post('startup/startup_detail', 'StartupRegistrationApiController@startupDetail');

    Route::post('startup/contact_detail', 'StartupRegistrationApiController@startupContactDetail');
    Route::post('startup/business_model', 'StartupRegistrationApiController@startupBusinessModel');

    Route::get('startup/registration/data/product_detail', 'StartupRegistrationApiController@dataForProductDetailRegistration');
    Route::post('startup/product_detail', 'StartupRegistrationApiController@startupProductDetail');

    Route::get('startup/registration/data/cofounder_detail', 'StartupRegistrationApiController@dataForCofounderDetailsRegistration');
    Route::post('startup/cofounder_detail', 'StartupRegistrationApiController@startupCofounderDetails');

    Route::get('startup/registration/data/startup_team', 'StartupRegistrationApiController@dataForStartupTeamRegistration');
    Route::post('startup/startup_team', 'StartupRegistrationApiController@startupTeam');

    // investor routes
    Route::get('investor/startups', 'InvestorApiController@startups');
    Route::post('investor/profile/complete', 'InvestorApiController@completeProfile');

    Route::get('user/profile', 'AuthApiController@profile');
});

/**
 *Authenticated routes for Admins
 */
Route::group(['prefix' => 'v1', 'middleware' => 'auth:admin-api', 'namespace' => 'Api'], function () {
    Route::get('admin/startups', 'AdminApiController@startups');
    Route::get('admin/startups/{id}/startup_detail', 'AdminApiController@startupDetail');
    Route::get('admin/startups/{id}/contact_detail', 'AdminApiController@contactDetail');
    Route::get('admin/startups/{id}/business_model', 'AdminApiController@businessModel');
    Route::get('admin/startups/{id}/product_detail', 'AdminApiController@productDetail');
    Route::get('admin/startups/{id}/cofounder_detail', 'AdminApiController@cofounderDetail');
    Route::get('admin/startups/{id}/startup_team', 'AdminApiController@startupTeam');

    Route::get('admin/entrepreneur/{userId}/startups', 'AdminApiController@startupsForEntrepreneur');
    Route::post('admin/startup/approve', 'AdminApiController@approveStartup');
    Route::get('admin/investors', 'AdminApiController@investors');
    Route::get('admin/entrepreneurs', 'AdminApiController@entrepreneurs');
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

