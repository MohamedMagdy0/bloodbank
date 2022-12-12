<?php

use Illuminate\Http\Request;

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


// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\MainController;


Route::group( ['prefix' => 'v1' , 'namespace' => 'Api'] , function () {

    // url  =  api/v1/..... maincycle
    Route::get('cities', [MainController::class, 'cities'])->name('cities'); // cities
    Route::get('governorates', [MainController::class, 'governorates'])->name('governorates'); // governorates
    Route::get('blood-types', [MainController::class, 'bloodTypes'])->name('blood-types'); // blood-types
    Route::get('categories', [MainController::class, 'categories'])->name('categories'); // postFavourite

    // url  =  api/v1/..... authcycle
    Route::post('register', [AuthController::class, 'register'])->name('api.register'); // register
    Route::post('login', [AuthController::class, 'login'])->name('api.login'); // login
    Route::post('reset-password', [AuthController::class, 'resetPassword'])->name('reset-password'); // reset-password
    Route::post('new-password', [AuthController::class, 'newPassword'])->name('new-password'); // resnewet-password


    Route::group( ['middleware' => 'auth:api'] ,function () {

        // url  =  api/v1/.....  with auth
        Route::post('contacts', [AuthController::class, 'contacts'])->name('contacts'); // contacts
        Route::get('profile', [AuthController::class, 'profile'])->name('profile'); // profile

        Route::get('posts', [AuthController::class, 'posts'])->name('posts'); // posts
        Route::get('post', [AuthController::class, 'post'])->name('post'); // post => single post

        Route::get('settings', [AuthController::class, 'settings'])->name('api.settings'); // settings
        Route::post('setting-create', [AuthController::class, 'settingCreate'])->name('api.setting-create'); // setting-create
        Route::post('setting-update', [AuthController::class, 'settingUpdate'])->name('api.setting-update'); // setting-update

        Route::post('notification_settings', [AuthController::class, 'notificationSettings'])->name('notification_settings'); // notification_settings
        Route::get('post-favourite', [AuthController::class, 'postFavourite'])->name('post-favourite'); // postFavourite
        Route::get('my-favourite', [AuthController::class, 'myFavourite'])->name('my-favourite'); // myFavourite

        Route::post('tokens', [AuthController::class, 'tokens'])->name('tokens'); // tokens
        Route::post('remove-token', [AuthController::class, 'removeToken'])->name('remove-token'); // remove-token

        Route::post('notifications', [AuthController::class, 'notifications'])->name('notifications'); // notifications

        Route::get('donation-request', [AuthController::class, 'donationRequest'])->name('donation-request'); // donation-request
        Route::post('donation-request/create', [AuthController::class, 'donationRequestCreate'])->name('donation-request.create'); // donationRequest

    });  // end maincycle with auth posts & category

});




