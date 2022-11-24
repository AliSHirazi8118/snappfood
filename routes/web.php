<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FoodCatController;
use App\Http\Controllers\DiscountController;
use App\Http\Controllers\FoodsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InfoRestController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\RegisterSeller;
use App\Http\Controllers\RestaurantController;

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

Route::get('/', [HomeController::class , 'index'])->name('home');

Route::get('/dashboard', [DashboardController::class , 'index'])->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';


Route::resource('restaurant' , RestaurantController::class)->middleware('auth');
Route::resource('food_categories' , FoodCatController::class)->middleware('auth');
Route::resource('discounts' , DiscountController::class)->middleware('auth');


Route::resource('RestInormations' , InfoRestController::class)->middleware('auth');
Route::get('state/{id}' , [InfoRestController::class , 'openOrClose'])->name('state');

Route::resource('foods' , FoodsController::class)->middleware('auth');
Route::get('food/data/{id}' , [HomeController::class ,'showData']);

Route::get('AddDiscountPage/{id}' , [FoodsController::class , 'showAddDiscount']);
Route::post('addDiscount/{id}' , [FoodsController::class , 'addDiscount']);
Route::post('addFoodParty/{id}' , [FoodsController::class ,'addFoodParty']);


Route::post('order/preparing/{id}' , [OrderController::class ,'preparing']);
Route::post('order/posted/{id}' , [OrderController::class ,'posted']);
Route::post('order/received/{id}' , [OrderController::class ,'received']);
Route::get('order/archive' , [OrderController::class ,'archive']);



