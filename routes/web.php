<?php



use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CityController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\BackendController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BloodTypeController;
use App\Http\Controllers\GovernorateController;
use App\Http\Controllers\Frontend\AuthController;
use App\Http\Controllers\Frontend\FrontController;
use App\Http\Controllers\DonationRequestController;



Route::get('/', [FrontController::class, 'home'])->name('home');
Route::get('/', [FrontController::class, 'home'])->name('home');

Route::group( [ 'namespace' => 'Frontend', [ 'middleware' => 'auth:client-web' ] ] ,function () {

// Route::group( [ 'middleware' => 'auth:client-web', ['Except' => ['logout']] ,function () {


    Route::post('toggle-favourite', [FrontController::class, 'toggleFavourite'])->name('toggle-favourite');
    Route::get('about', [FrontController::class, 'about'])->name('about');
    Route::get('articles', [FrontController::class, 'articles'])->name('articles');
    Route::get('article/{id}', [FrontController::class, 'article'])->name('article');

    Route::get('donation-requests', [FrontController::class, 'donationRequests'])->name('requests');
    Route::get('donation-request/{id}', [FrontController::class, 'donationReq'])->name('single_request');

    Route::get('contact-us', [FrontController::class, 'contactUs'])->name('contact-us');
    Route::post('contact-us/store', [FrontController::class, 'contactUsStore'])->name('contact-us.store');
    Route::get('home-search', [FrontController::class, 'search'])->name('home-search');
});

// auth for clients -> frontend
Route::get('register-client', [AuthController::class, 'registerClient'])->name('register-client');
Route::post('register-client/store', [AuthController::class, 'registerClientStore'])->name('register-client.store');

Route::get('login-client', [AuthController::class, 'loginClient'])->name('login-client');
Route::post('login-client/store', [AuthController::class, 'loginClientStore'])->name('login-client.store');
Route::get('client-logout', [AuthController::class, 'logOut'])->name('client.front-logout'); //client logout

Route::get('reset-client', [AuthController::class, 'resetClient'])->name('reset-client');
Route::post('reset-client/link', [AuthController::class, 'resetClientLink'])->name('reset-client.link');
Route::get('reset-client/pin-num', [AuthController::class, 'resetPinNum'])->name('reset-client.pin-num');
Route::post('reset-client/pin-num-check', [AuthController::class, 'resetPinNumCheck'])->name('reset-client.pin-num-check');

Route::get('client-pass', [AuthController::class, 'updateClientPage'])->name('client.change-password');
Route::post('client-pass/update', [AuthController::class, 'UpdateClientPassword'])->name('reset-client.update-pass-client');

// });



// Route::prefix('admin')->middleware(['auto-check-permission' , 'auth'])->group(function ()
//     {
//     });

// cities
Route::resource('cities', CityController::class);
Route::delete('city/softDelete/{id}', [CityController::class, 'softDelete'])->name('cities.softDelete'); // cities.softDelete
Route::get('city/trash', [CityController::class, 'cityTrash'])->name('cities.trash'); // cities.trash
Route::get('city/restore/{id}', [CityController::class, 'cityRestore'])->name('cities.restore'); // cities.restore

// categories
Route::resource('categories', CategoryController::class);
Route::delete('category/softDelete/{id}', [CategoryController::class, 'softDelete'])->name('categories.softDelete'); // categories.softDelete
Route::get('category/trash', [CategoryController::class, 'categoryTrash'])->name('categories.trash'); // categories.trash
Route::get('category/restore/{id}', [CategoryController::class, 'categoryRestore'])->name('categories.restore'); // categories.restore

//  governorates
Route::resource('governorates', GovernorateController::class);
Route::delete('governorate/softDelete/{id}', [GovernorateController::class, 'softDelete'])->name('governorates.softDelete'); // governorates.softDelete
Route::get('governorate/trash', [GovernorateController::class, 'governorateTrash'])->name('governorates.trash'); // governorates.trash
Route::get('governorate/restore/{id}', [GovernorateController::class, 'governorateRestore'])->name('governorates.restore'); // governorates.restore

// posts
Route::resource('posts', PostController::class);
Route::delete('post/softDelete/{id}', [PostController::class, 'softDelete'])->name('posts.softDelete'); // posts.softDelete
Route::get('post/trash', [PostController::class, 'postTrash'])->name('posts.trash'); // posts.trash
Route::get('post/restore/{id}', [PostController::class, 'postRestore'])->name('posts.restore'); // posts.restore

// clients
Route::resource('clients', ClientController::class);
Route::get('clients/search', [ClientController::class, 'clientSearch'])->name('clients.search'); // clients.search
Route::post('user/is-active/{id}', [ClientController::class, 'isActive'])->name('users.isActive'); // donations.isActive

Route::delete('client/softDelete/{id}', [ClientController::class, 'softDelete'])->name('clients.softDelete'); // clients.softDelete
Route::get('client/trash', [ClientController::class, 'clientTrash'])->name('clients.trash'); // clients.trash
Route::get('client/restore/{id}', [ClientController::class, 'clientRestore'])->name('clients.restore'); // clients.restore

// bloodTypes
Route::resource('blood-types', BloodTypeController::class);
Route::delete('blood_type/softDelete/{id}', [BloodTypeController::class, 'softDelete'])->name('blood-types.softDelete'); // blood-types.softDelete
Route::get('blood_type/trash', [BloodTypeController::class, 'bloodTypeTrash'])->name('blood-types.trash'); // blood-types.trash
Route::get('blood_type/restore/{id}', [BloodTypeController::class, 'bloodTypeRestore'])->name('blood-types.restore'); // blood-types.restore

// Contacts
Route::get('contacts', [ContactController::class, 'index'])->name('contacts.home');
Route::post('contacts/search', [ContactController::class, 'contactSearch'])->name('contacts.search'); // contacts.search
Route::get('contacts/edit/{id}', [ContactController::class, 'edit'])->name('contacts.edit');
Route::put('contacts/update/{id}', [ContactController::class, 'update'])->name('contacts.update');

Route::delete('contact/softDelete/{id}', [ContactController::class, 'softDelete'])->name('contacts.softDelete'); // contacts.softDelete
Route::get('contact/trash', [ContactController::class, 'contactTrash'])->name('contacts.trash'); // contacts.trash
Route::get('contact/restore/{id}', [ContactController::class, 'contactRestore'])->name('contacts.restore'); // contacts.restore
Route::delete('contacts/delete/{id}', [ContactController::class, 'destroy'])->name('contacts.delete');

// DonationRequest
Route::resource('donations', DonationRequestController::class);
Route::delete('donation/softDelete/{id}', [DonationRequestController::class, 'softDelete'])->name('donations.softDelete'); // donations.softDelete
Route::get('donation/trash', [DonationRequestController::class, 'contactTrash'])->name('donations.trash'); // donations.trash
Route::get('donation/restore/{id}', [DonationRequestController::class, 'contactRestore'])->name('donations.restore'); // donations.restore

// Settings
Route::get('settings', [SettingController::class, 'index'])->name('settings.home');
Route::get('setting/edit', [SettingController::class, 'edit'])->name('settings.edit');
Route::put('setting/update', [SettingController::class, 'update'])->name('settings.update');

Route::delete('setting/softDelete/{id}', [SettingController::class, 'softDelete'])->name('settings.softDelete'); // settings.softDelete
Route::get('setting/trash', [SettingController::class, 'settingTrash'])->name('settings.trash'); // settings.trash
Route::get('setting/restore/{id}', [SettingController::class, 'settingRestore'])->name('settings.restore'); // settings.restore

// Users
Route::resource('users', UserController::class);
Route::delete('user/softDelete/{id}', [UserController::class, 'softDelete'])->name('users.softDelete'); // donations.softDelete
Route::get('user/trash', [UserController::class, 'userTrash'])->name('users.trash'); // donations.trash
Route::get('user/restore/{id}', [UserController::class, 'userRestore'])->name('users.restore'); // donations.restore


Route::get('logout', [BackendController::class, 'logout'])->name('auth.logout'); // logout
// Route::get('change-password', [BackendController::class, 'updatePassword'])->name('admin.updatePassword'); // logout

Route::get('/change-password', [BackendController::class, 'changePassword'])->name('change-password');
Route::post('/change-password', [BackendController::class, 'updatePassword'])->name('update-password');



// roles - laratrust
Route::resource('roles', RoleController::class);


//  jetstream
Route::middleware( ['auth:sanctum', config('jetstream.auth_session') , 'verified' ])->group(function ()
{
    Route::get('/dashboard', function () {
        return view('dashboard'); })->name('dashboard');
});
