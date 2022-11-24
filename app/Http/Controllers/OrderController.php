<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{

    public function preparing($id)
    {
        Order::find($id)
        ->update([
            'state' => 'preparing'
        ]);
        return redirect('dashboard');
    }

    public function posted($id)
    {
        Order::find($id)
        ->update([
            'state' => 'Posted'
        ]);
        return redirect('dashboard');
    }

    public function received($id)
    {
        Order::find($id)
        ->update([
            'state' => 'received'
        ]);

        Order::destroy($id);

        return redirect('dashboard');
    }


    public function archive()
    {
        $archive = Order::onlyTrashed()->get();

        return view('seller.archive' , compact('archive'));
    }

}
