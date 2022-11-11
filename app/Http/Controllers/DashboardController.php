<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\InformationRest;

class DashboardController extends Controller
{
    public function index()
    {
        $user = User::find(auth()->user()->id);
        $info = InformationRest::where('seller_id',$user->id)->get();

        return view('dashboard' , compact('user' , 'info'));
    }
}
