<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\v1\AuthController;
use App\Http\Controllers\Api\v1\CartController;
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


Route::group( ['prefix' => 'auth'] , function($router){

    $router->post('register' , [AuthController::class  , 'register']);
    $router->post('login' , [AuthController::class , 'login']);

});

Route::group( ['prefix' => 'v1' ] , function($router){

    Route::apiResource( 'addresses' , UserApiController::class);

    Route::apiResource( 'restaurants' , RestaurantController::class);
    $router->get('restaurants/{id}/foods' , [RestaurantController::class , 'getRestaurantFoods']);

    Route::apiResource( 'carts' , CartController::class);


});
// , 'middleware' => 'auth:sanctum'
