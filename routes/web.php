<?php

use App\Http\Controllers\Auth\DriverLoginController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\BikeController;
use App\Http\Controllers\BikeDriver;
use App\Http\Controllers\BikeDriverController;
use App\Http\Controllers\DriverController;
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

Route::get('/', function () {
    return view('index');
});

Route::get('login',[LoginController::class , 'login'])->name('login');
Route::post('login',[LoginController::class , 'authenticate'])->name('login.confirm');

Route::get('driver-login',[DriverLoginController::class , 'login'])->name('driver.login');
Route::post('driver-login',[DriverLoginController::class , 'authenticate'])->name('driver.login.confirm');



Route::get('dashboard', function () {
    return view('welcome');
})->name('dashboard');
Route::get('logout',[LoginController::class , 'logout'])->name('logout');

Route::get('driver-bike-status',[BikeDriverController::class , 'index'])->middleware('auth:manager');



Route::resource('drivers',DriverController::class)->middleware('auth:manager');

Route::group(['middleware'=> ['auth:driver']],function(){
    Route::resource('bikes',BikeController::class);
    Route::post('driver-left/{bikeId}',[DriverController::class , 'left'])->name('driver-left');
    Route::post('driver-arrived/{bikeId}',[DriverController::class , 'arrived'])->name('driver-arrived');

});



    