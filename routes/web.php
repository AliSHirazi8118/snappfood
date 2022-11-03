<?php

use App\Models\Restaurnt;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FoodCatController;
use App\Http\Controllers\DiscountController;
use App\Http\Controllers\FoodsController;
use App\Http\Controllers\InfoRestController;
use App\Http\Controllers\RegisterSeller;
use App\Http\Controllers\RestaurantController;
use App\Models\InformationRest;
use App\Models\Seller;
use App\Models\User;

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
    return view('HomePage');
})->name('home');


Route::get('/dashboard', function () {

    $user = User::find(auth()->user()->id);
    $id = Seller::all()->where('email' , $user->email);

    foreach ($id as $id) {
        $user_id = $id->id;
    }
    $info = false;
    if (isset($user_id)) {
        $info = InformationRest::find($user_id);
    }

    return view('dashboard' , compact('user' , 'info'));


})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';


Route::resource('restaurant' , RestaurantController::class);
Route::resource('food_categories' , FoodCatController::class);
Route::resource('discounts' , DiscountController::class);
Route::resource('RestInormations' , InfoRestController::class);
Route::resource('foods' , FoodsController::class);

Route::get('state/{id}' , [InfoRestController::class , 'openOrClose'])->name('state');

Route::get('Register' , [RegisterSeller::class , 'register_view'])->name('registerSeller');
Route::post('RegisterSellers' , [RegisterSeller::class , 'register']);

// Route::get('DataRest' , [RegisterSeller::class , 'showDataRest'])->name('ShowFormRest');
// Route::post('SubmitDataRest' , [RegisterSeller::class , 'submitDataRest']);