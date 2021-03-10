<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DevicesController;
use App\Http\Controllers\ReqMaintenanceController;
use App\Http\Controllers\HandelrequestController;
use App\Http\Controllers\UserProfileController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});


Route::middleware(['auth', 'authcheck'])->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/nextHome', [HandelrequestController::class, 'nextHome']);
});

Auth::routes(['verify' => true]);

Route::middleware(['auth'])->group(function () {
    Route::get('devices/return_date/{id}', [DevicesController::class, 'return_date']);
    // Route::post('devices/return_date/{id}/update', [DevicesController::class, 'Requpdate']);
    Route::Post('/devices/return_date/updateme/{id}', [DevicesController::class, 'Requpdate']);
    Route::post('/HandleRequest/updatefirst/{id}', [HandelrequestController::class, 'updatefirst']);
    Route::post('/HandleRequest/updatesecond/{id}', [HandelrequestController::class, 'updatesecond']);
    Route::post('/HandleRequest/updatethird/{id}', [HandelrequestController::class, 'updatethird']);
    Route::get('HandleRequest/view/{id}', [HandelrequestController::class, 'view']);
    Route::post('/userprofile/ban/{id}', [UserProfileController::class, 'ban']);
    Route::post('/userprofile/ban/{id}', [UserProfileController::class, 'notban']);
    Route::Post('HandleRequest/remarks/{id}', [HandelrequestController::class, 'remarks']);
    Route::get('profile/{id}', [UserProfileController::class, 'show']);
    Route::get('userprofile/view/{id}', [UserProfileController::class, 'view']);

    Route::get('devices/export/', [DevicesController::class, 'export']);

    Route::resource('userprofile', UserProfileController::class);
    Route::resource('devices', DevicesController::class);
    Route::resource('requestMan', ReqMaintenanceController::class);
    Route::resource('HandleRequest', HandelrequestController::class);
});
