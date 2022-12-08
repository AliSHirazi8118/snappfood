<?php

namespace App\Http\Controllers\Api\v1;

use App\Models\Order;
use App\Models\Address;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\Api\v1\carts\CartResource;
use App\Http\Resources\Api\v1\users\addressResource;

class CartController extends Controller
{
    public function index()
    {
        $data = Order::all();
        return new CartResource($data);
    }

    
}
