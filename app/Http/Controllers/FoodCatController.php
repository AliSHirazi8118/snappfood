<?php

namespace App\Http\Controllers;

use App\Http\Requests\FoodCategory\FoodCatCreateRequest;
use App\Http\Requests\FoodCategory\FoodCatUpdateRequest;
use App\Models\Restaurnt;
use App\Models\FoodCategory;
use Illuminate\Http\Request;

class FoodCatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $foodCat = FoodCategory::all();
        return view('Food_Category.index' , compact('foodCat'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rest = Restaurnt::all();

        return view('Food_Category.create' , compact('rest'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FoodCatCreateRequest $request)
    {
        $foodCat = new FoodCategory();
        $foodCat->food_categories = $request->name;
        $foodCat->restaurant_id = $request->rest_cat;
        $foodCat->save();

        return redirect('food_categories');
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
        $rest = Restaurnt::all()->where('id' , $foodCat->restaurant_id);
        return view('Food_Category.show' , compact('foodCat' , 'rest'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $foodCat = FoodCategory::find($id);
        $rest = Restaurnt::all();
        return view('Food_Category.update' , compact('foodCat','rest'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(FoodCatUpdateRequest $request, $id)
    {
        FoodCategory::find($id)
	    ->update([
		    'food_categories' => $request->name,
            'restaurant_id' => $request->rest_cat,
	    ]);

        return redirect('food_categories');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        FoodCategory::destroy($id);
        return redirect('food_categories');
    }
}
