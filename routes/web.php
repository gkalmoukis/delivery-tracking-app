<?php

use Illuminate\Support\Facades\Route;

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


Route::group(['prefix' => 'shifts'], function () {
    Route::get('/',  [App\Http\Controllers\ShiftController::class, 'index'])->name('shifts-index');

    Route::get('/past',  [App\Http\Controllers\ShiftController::class, 'indexPast'])->name('past-index');
    Route::get('/new',  [App\Http\Controllers\ShiftController::class, 'create'])->name('new-shift-form');
    Route::post('/new-swift',  [App\Http\Controllers\ShiftController::class, 'store'])->name('new-shift');
    Route::get('/{id}/end',  [App\Http\Controllers\ShiftController::class, 'editEnd']);
    Route::post('/end',  [App\Http\Controllers\ShiftController::class, 'updateEnd']);
    Route::get('/{id}',  [App\Http\Controllers\ShiftController::class, 'show']);
});

Route::group(['prefix' => 'deliveries'], function () {
    Route::post('/',  [App\Http\Controllers\DeliveryController::class, 'store']);
    Route::get('/{shift}',  [App\Http\Controllers\DeliveryController::class, 'index']);
    Route::get('/new/{shift}',  [App\Http\Controllers\DeliveryController::class, 'create']);
    Route::get('/update-delivered-at/{id}',  [App\Http\Controllers\DeliveryController::class, 'updateDeliveredAt']);
    Route::get('/update-started-at/{id}',  [App\Http\Controllers\DeliveryController::class, 'updateStartedAt']);
});

Route::group(['prefix' => 'locations'], function () {
    Route::get('/{shift}',  [App\Http\Controllers\LocationController::class, 'index']);
});


Route::group(['prefix' => 'admins'], function () {
    Route::get('/active-shifts',  [App\Http\Controllers\ShiftController::class, 'indexAdmin']);
    Route::get('/past-shifts',  [App\Http\Controllers\ShiftController::class, 'indexAdminPast']);
});

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
