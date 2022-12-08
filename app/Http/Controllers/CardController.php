<?php

namespace App\Http\Controllers;

use App\Models\Food;
use App\Models\InformationRest;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;

class CardController extends Controller
{

    public static $restaurant_id;

    public function setCard(Request $request , $id , $restaurant_id)
    {
        $this::$restaurant_id = $restaurant_id;

        $food = Food::find($id);

        session( [$food->food_name => [$id => $request->count]]);

        return redirect('card');
    }

    public function showCard()
    {
        $card = session()->all();
        $i = 0;
        foreach ($card as $key => $value) {
            $i++;
            if ($i >= 5 ) {
                $title[] = $key;
                $data[] = $value;
            }
        }

        // dd($data);

        foreach ($data as $key => $info) {
            foreach ($info as $key => $value) {
                $food_id[] = $key;
                $count[] = $value;
            }
        }

        foreach ($food_id as $key => $value) {
            $foods[] = Food::find($value);
            $cash[] = $foods[$key]->price * $count[$key];
        }

        $food = Food::find($food_id[0]);
        $user = User::find(auth()->user()->id);
        $restaurant_data = InformationRest::where('seller_id' , $food->restaurant_id)->get();
        $restaurant = $restaurant_data->first();

        $order = new Order();
        $order->user_name = $user->name;
        $order->user_id = $user->id;
        $order->restaurant = $restaurant->rest_name;
        $order->restaurant_id = $restaurant->id;
        $order->orders = implode(" " , $food_id);
        $order->order_cash = array_sum($cash);
        $order->post_cash = $restaurant->post_cash ;
        $order->address_id = 1;
        $order->save();

        return view('card' , compact('foods' , 'count'));
    }

    public function Buy()
    {
        return redirect('dashboard');
    }
}
