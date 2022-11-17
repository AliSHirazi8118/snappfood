<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\v1\AuthController;
use App\Http\Controllers\Api\v1\User1Controller;
use App\Http\Controllers\Api\v1\UserApiController;
use App\Http\Controllers\Api\v1\RestaurantController;

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

    $router->post('register' , [AuthController::class  , 'register']);
    $router->post('login' , [AuthController::class , 'login']);

 });

 Route::group( ['prefix' => 'v1'] , function($router){

    $router->get('addresses' , [UserApiController::class  , 'getAddresses']);
    $router->post('addresses' , [UserApiController::class , 'AddAddress']);
    $router->post('addresses/{id}' , [UserApiController::class , 'SetCurrentAddress']);

 });

 Route::group( ['prefix' => 'v1'] , function($router){

    $router->get('restaurants/{id}' , [RestaurantController::class  , 'getRestaurantData']);
    $router->get('restaurants/{id}/foods' , [RestaurantController::class , 'getRestaurantFoods']);

 });



 Route::apiResource( 'users' , User1Controller::class);
