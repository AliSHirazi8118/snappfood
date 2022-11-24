<?php

namespace App\Http\Controllers;

use auth;
use App\Models\User;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\InformationRest;

class DashboardController extends Controller
{
    public function index()
    {
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
