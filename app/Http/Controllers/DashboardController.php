<?php

namespace App\Http\Controllers;

use auth;
use App\Models\Food;
use App\Models\User;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\InformationRest;
use Illuminate\Support\Facades\Gate;

class DashboardController extends Controller
{
    public function index()
    {
        // $array = [
        //           1 => 2,
        //           2 => 5
        //          ];
        // foreach ($array as $key => $value) {
        //     // $values[] = $value;
        //     $array2[] = Food::find($key);
        // }
        // $i = 1;
        // foreach ($array2 as $food) {
        //     $array3[] = $food->food_name ." >>> ". $food->price * $array[$i] ." ----- تخفیف : ". $food->discount ." ---- تعداد: ". $array[$i] ;
        //     $i++;
        // }
        // dd($array3);

        $user = User::find(auth()->user()->id);
        $restaurantData = InformationRest::where('seller_id',$user->id)->get();
        $orders = Order::where('user_id' , $user->id)->get();

        foreach ($restaurantData as $data) {
            $restaurantId = $data->id;
        }

        if(isset($restaurantId))
        {
            $restaurantOrders = Order::where('restaurant_id' , $restaurantId)->get();
        }
        else
        {
            $restaurantOrders = null;
        }

        return view('dashboard' , compact('user' , 'restaurantData', 'orders', 'restaurantOrders'));
    }
}
