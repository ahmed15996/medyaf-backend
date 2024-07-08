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



    Route::post('/register' , [AuthController::class , 'register']);
    Route::post('/login' , [AuthController::class , 'login']);




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

        Route::post('puy-events'           , [PartyController::class , 'puy_events']);
        Route::post('add-party'            , [PartyController::class , 'add_party']);
        Route::get('user-statics'          , [PartyController::class , 'user_statics']);
        Route::get('user-parties'          , [PartyController::class , 'user_parties']);
        Route::get('party-details/{id}'    , [PartyController::class , 'party_details']);
        Route::post('update-party/{id}'    , [PartyController::class , 'update_party']);
        Route::get('delete-party/{id}'     , [PartyController::class , 'delete_party']);


    });

    // routes not auth
    Route::get('boardings'   , [HomeController::class , 'boarding']);
    Route::get('setting'     , [HomeController::class , 'setting']);
    Route::get('terms'       , [HomeController::class , 'terms']);
    Route::get('us'          , [HomeController::class , 'us']);
    Route::get('questions'   , [HomeController::class , 'questions']);
    Route::get('countries'   , [HomeController::class , 'countries']);
    Route::get('events'      , [PartyController::class, 'events']);
    Route::post('contact-us' , [HomeController::class , 'contact_us']);














});







