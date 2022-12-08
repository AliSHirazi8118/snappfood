<?php

namespace App\Http\Controllers;

use App\Http\Requests\Restaurant\RestaurantCreateRequest;
use App\Http\Requests\Restaurant\RestaurantUpdateRequest;
use App\Models\Restaurnt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Gate::authorize('viewAny' , Restaurnt::class);
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
        Gate::authorize('viewAny' , Restaurnt::class );
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
        Gate::authorize('create' , Restaurnt::class );
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
        Gate::authorize('viewAny' , Restaurnt::class );
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
        Gate::authorize('viewAny' , Restaurnt::class );
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
        Gate::authorize('viewAny' , Restaurnt::class );
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
        Gate::authorize('viewAny' , Restaurnt::class );
        Restaurnt::destroy($id);
        return redirect('restaurant');
    }
}
