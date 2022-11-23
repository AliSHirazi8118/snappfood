<?php

namespace App\Http\Controllers;

use App\Models\Food;
use App\Models\InformationRest;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        date_default_timezone_set("Asia/Tehran");

        // if(date("h") == 12){
            $foods = Food::all()->where('food_party' , 'yes');
            $restaurants = InformationRest::all();
        // }
        // elseif(date("h") != 12)
        // {
        //     $foods = null;
        //     $restaurants = null;
        // }

        return view('HomePage' , compact('foods' , 'restaurants'));
    }
}
