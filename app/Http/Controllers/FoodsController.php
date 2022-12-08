<?php

namespace App\Http\Controllers;

use App\Http\Requests\Foods\addDiscountRequest;
use App\Http\Requests\Foods\FoodCreateRequest;
use App\Http\Requests\Foods\FoodUpdateRequest;
use App\Models\Food;
use App\Models\Restaurnt;
use App\Models\FoodCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class FoodsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $foods = Food::all()->where('restaurant_id' , auth()->user()->id);
        return view('Foods.index' , compact('foods'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $rest = Restaurnt::all();
        $foodCat = FoodCategory::all();
        return view('Foods.create' , compact('rest' , 'foodCat'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FoodCreateRequest $request)
    {
        $foodId = FoodCategory::where('food_categories' , $request->food_cat)->get();
        foreach ($foodId as $id) {
            $food_cat_id = $id->id;
        }

        $image = $request->file('photo')->getClientOriginalName();
        $request->file('photo')->move(public_path('images/foods') , $image);


        $food = new Food();
        $food->food_name = $request->name;
        $food->material = $request->material;
        $food->price = $request->price;
        $food->food_cat = $request->food_cat;
        $food->food_cat_id = $food_cat_id;
        $food->image = $image;
        $food->restaurant_id = auth()->user()->id;
        $food->save();

        return redirect('foods');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $foodCat = FoodCategory::find($id);
        $food = Food::find($id);
        Gate::authorize('view' , $food);
        return view('Foods.show' , compact('foodCat' , 'food'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $foodCat = FoodCategory::all();
        $food = Food::find($id);
        Gate::authorize('view' , $food);
        return view('Foods.update' , compact('food' , 'foodCat'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(FoodUpdateRequest $request, $id)
    {
        $food = Food::find($id);
        Gate::authorize('view' , $food);
        $foodId = FoodCategory::where('food_categories' , $request->food_cat)->get();
        foreach ($foodId as $food) {
            $food_cat_id = $food->id;
        }

        $image = $request->file('photo')->getClientOriginalName();
        $request->file('photo')->move(public_path('images/foods') , $image);


        Food::find($id)
            ->update([
                'food_name' => $request->name,
                'material' => $request->material,
                'price' => $request->price,
                'food_cat' => $request->food_cat,
                'food_cat_id' => $food_cat_id,
                'image' => $image,
                'discount' => null,
            ]);

        return redirect('foods');

    }
//------------------------------------------------------------------
    public function showAddDiscount($id)
    {
        $food = Food::find($id);
        Gate::authorize('view' , $food);
        return view('Foods.addDiscount' , compact('food'));
    }
    public function addDiscount(addDiscountRequest $request , $id)
    {
        Food::find($id)->update([
            'discount' => $request->discount,
        ]);
        return redirect('foods');
    }
//------------------------------------------------------------------


//------------------------------------------------------------------
    public function addFoodParty($id)
    {
        $food = Food::find($id);

        if ($food->food_party == 'no')
        {
            Food::find($id)->update([
                'food_party' => 'yes'
            ]);
        }
        else
        {
            Food::find($id)->update([
                'food_party' => 'no'
            ]);
        }

        return redirect('foods');
    }
//------------------------------------------------------------------

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Food::destroy($id);
        return redirect('foods');
    }
}
