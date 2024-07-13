<?php

use App\Http\Controllers\Dashboard\AdminController;
use App\Http\Controllers\Dashboard\AuthController;
use App\Http\Controllers\Dashboard\BoardaringController;
use App\Http\Controllers\Dashboard\CountryController;
use App\Http\Controllers\Dashboard\EventController;
use App\Http\Controllers\Dashboard\EventUserController;
use App\Http\Controllers\Dashboard\HomeController;
use App\Http\Controllers\Dashboard\PartyController;
use App\Http\Controllers\Dashboard\QuestationController;
use App\Http\Controllers\Dashboard\RoleController;
use App\Http\Controllers\Dashboard\StaticController;
use App\Http\Controllers\Dashboard\UserController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/





Route::get('/opt', function () {
    Artisan::call('optimize');
    return 0;
});

Route::get('language/{locale}', function ($locale) {
    app()->setLocale($locale);
    session()->put('locale', $locale);
    return redirect()->back();
})->name('language');

Route::get('/', [AuthController::class , 'showLoginForm'])->name('login');


Route::prefix('admin')->middleware('localization')->name('admin.')->group(function () {
    Route::get('/login', [AuthController::class , 'showLoginForm'])->name('login');
    Route::post('login', [AuthController::class , 'login'])->name('login.post');



    /* Dashboard Routes */
    Route::middleware('auth:admin')->group(function () {

        Route::get('/home', [HomeController::class , 'home'])->name('home');
        Route::get('logout', [AuthController::class , 'logout'])->name('logout');

        // roles
        Route::resource('roles', RoleController::class)->name('*','roles');
        Route::get('get-roles' , [RoleController::class , 'get_roles'])->name('get-roles');

        // admins
        Route::resource('/admins' , AdminController::class);
        Route::get('get-admin' , [AdminController::class , 'get_admins'])->name('get-admins');

        // users
        Route::resource('/users' , UserController::class);
        Route::get('get-users'   , [UserController::class , 'get_users'])->name('get-users');
        Route::get('/changeActiveUser', [UserController::class , 'changeActiveUser'])->name('changeActiveUser');
        Route::get('get-user-events'  , [UserController::class , 'get_user_events'])->name('get-user-events');
        Route::get('get-user-parties'  , [UserController::class , 'get_user_parties'])->name('get-user-parties');

        // countries
        Route::resource('/countries' , CountryController::class);
        Route::get('get-countries'   , [CountryController::class , 'get_countries'])->name('get-countries');

        // events
        Route::resource('/events'     ,  EventController::class);
        Route::get('get-events'       , [EventController::class , 'get_events'])->name('get-events');

        // event-users
        Route::resource('/event-users'     ,  EventUserController::class);
        Route::get('get-event-users'       , [EventUserController::class , 'get_event_users'])->name('get-event-users');

        // parties
        Route::resource('/parties'     ,  PartyController::class);
        Route::get('get-parties'       , [PartyController::class , 'get_parties'])->name('get-parties');

        // boardings
        Route::resource('/boardings'     ,  BoardaringController::class);
        Route::get('get-boardings'       , [BoardaringController::class , 'get_boardings'])->name('get-boardings');


        // questions
        Route::resource('/questions'     ,  QuestationController::class);
        Route::get('get-questions'       , [QuestationController::class , 'get_questions'])->name('get-questions');


         // static
        Route::get('us' , [StaticController::class , 'us'])->name('us');
        Route::put('update-us' , [StaticController::class , 'update_us'])->name('update-us');

        Route::get('terms' , [StaticController::class , 'terms'])->name('terms');
        Route::put('update-terms' , [StaticController::class , 'update_terms'])->name('update-terms');

        Route::get('setting' , [StaticController::class , 'setting'])->name('setting');
        Route::put('update-setting' , [StaticController::class , 'update_setting'])->name('update-setting');





    });


});

