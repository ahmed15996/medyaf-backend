<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\HomeController;
use App\Http\Controllers\Api\PartyController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('lang')->group(function () {



    Route::post('/sign-up' , [AuthController::class , 'register']);
    Route::post('/sign-in' , [AuthController::class , 'login']);
    Route::post('/sing-in-with-social' , [AuthController::class , 'login_social']);




    // ========================= routes auth driver ========================================
    Route::middleware('auth:sanctum')->group(function () {

        // auth user
        Route::group(['prefix' => 'user'] , function(){
            Route::post('/update-profile'  , [AuthController::class , 'update_profile']);
            Route::get('/get-profile'      , [AuthController::class , 'get_profile']);
            Route::get('/delete-profile'   , [AuthController::class , 'delete_profile']);
            Route::post('/reset-password'  , [AuthController::class , 'reset_password']);
            Route::post('/change-password' , [AuthController::class , 'change_Password']);
            Route::post('/logout'          , [AuthController::class , 'logout']);

        });

        // invitation balance
        Route::post('add-balance'             , [PartyController::class , 'add_balance']);
        Route::get('get-user-balance'         , [PartyController::class , 'get_user_balance']);

        // invitations
        Route::post('add-invitation'          , [PartyController::class , 'add_invitation']);
        Route::get('user-invitations'         , [PartyController::class , 'user_invitations']);
        Route::get('invitation-details/{id}'  , [PartyController::class , 'invitation_details']);
        Route::post('update-invitation/{id}'  , [PartyController::class , 'update_invitation']);
        Route::get('delete-invitation/{id}'   , [PartyController::class , 'delete_invitation']);



    });

    // routes not auth
    Route::get('on-bording'        , [HomeController::class , 'boarding']);
    Route::get('footer'            , [HomeController::class , 'setting']);
    Route::get('terms'             , [HomeController::class , 'terms']);
    Route::get('about-us'          , [HomeController::class , 'us']);
    Route::get('questions'         , [HomeController::class , 'questions']);
    Route::get('countries'         , [HomeController::class , 'countries']);
    Route::get('get-all-packages'  , [PartyController::class, 'get_all_packages']);
    Route::post('contact-us'       , [HomeController::class , 'contact_us']);














});








