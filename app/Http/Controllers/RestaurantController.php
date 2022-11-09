<?php

namespace App\Http\Controllers;

use App\Http\Requests\Restaurant\RestaurantCreateRequest;
use App\Http\Requests\Restaurant\RestaurantUpdateRequest;
use App\Models\Restaurnt;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    // public function __construct()
    // {

    // }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rest = Restaurnt::all();
        return view('Resturant.resturant' , compact('rest'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Resturant.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RestaurantCreateRequest $request)
    {
        $rest = new Restaurnt();
        $rest->restaurnt_categories = $request->name;
        $rest->description = $request->des;
        $rest->save();

        return redirect('restaurant');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $rest = Restaurnt::find($id);
        return view('Resturant.show' , compact('rest'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $rest = Restaurnt::find($id);
        return view('Resturant.update' , compact('rest'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RestaurantUpdateRequest $request, $id)
    {
        Restaurnt::find($id)
	    ->update([
		    'restaurnt_categories' => $request->name,
		    'description' => $request->des,
	    ]);

        return redirect('restaurant');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Restaurnt::destroy($id);
        return redirect('restaurant');
    }
}
