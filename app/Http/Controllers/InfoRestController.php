<?php

namespace App\Http\Controllers;

use App\Http\Requests\RestaurantInformation\RestInformationRequest;
use App\Http\Requests\RestaurantInformation\RestInformationUpdateRequest;
use App\Models\FoodCategory;
use App\Models\InformationRest;
use App\Models\Restaurnt;
use App\Models\User;
use Illuminate\Http\Request;

class InfoRestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rest = Restaurnt::all();
        return view('seller.InfoRest' , compact('rest'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RestInformationRequest $request)
    {
        $seller = User::find(auth()->user()->id);

        $restData = new InformationRest();
        $restData->rest_name = $request->name;
        $restData->rest_type = $request->rest_cat;
        $restData->phone = $request->phone;
        $restData->address = $request->address;
        $restData->account_number = $request->account_number;
        $restData->seller_id = $seller->id;
        $restData->save();

        User::find($seller->id)
            ->update([
                'role' => 'seller'
            ]);

        return redirect('dashboard');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $rest = InformationRest::find($id);
        return view('seller.show' , compact('rest'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $restInfo = InformationRest::find($id);
        $rest = Restaurnt::all();
        $food = FoodCategory::all();
        return view('seller.update' , compact('restInfo' , 'rest' , 'food' ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RestInformationUpdateRequest $request, $id)
    {
        $image = $request->file('photo')->getClientOriginalName();
        $request->file('photo')->move(public_path('images') , $image);

        InformationRest::find($id)
	    ->update([
		    'rest_name' => $request->name,
		    'rest_type' => $request->rest_cat,
            'food_type' => $request->food_cat,
            'address' => $request->address,
            'phone' => $request->phone,
            'account_number' => $request->account_number,
            'post_cash' => $request->post_cash,
            'work_times' => $request->work_times,
            'image' => $image,
	    ]);

        return redirect('RestInormations/'. $id);
    }

    public function openOrClose($id)
    {
        $rest = InformationRest::find($id);
        if ($rest->state == 'close') {
            $rest->update(['state' => 'open']);
        }else{
            $rest->update(['state' => 'close']);
        }
        return redirect('RestInormations/' . $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
