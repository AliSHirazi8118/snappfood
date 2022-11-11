<?php

use App\Http\Controllers\Api\v1\authApiController;
use App\Http\Controllers\Api\v1\restaurantController;
use App\Http\Controllers\Api\v1\userApiController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::group( ['prefix' => 'v1'] , function($router){

    $router->post('register' , [authApiController::class  , 'register']);
    $router->post('login' , [authApiController::class , 'login']);

 });

 Route::group( ['prefix' => 'v1'] , function($router){

    $router->get('addresses' , [userApiController::class  , 'getAddresses']);
    $router->post('addresses' , [userApiController::class , 'AddAddress']);
    $router->post('addresses/{id}' , [userApiController::class , 'SetCurrentAddress']);

 });

 Route::group( ['prefix' => 'v1'] , function($router){

    $router->get('restaurants/{id}' , [restaurantController::class  , 'getRestaurantData']);
    $router->post('addresses' , [restaurantController::class , 'AddAddress']);
    $router->post('addresses/{id}' , [restaurantController::class , 'SetCurrentAddress']);

 });
