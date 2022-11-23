<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Address;
use App\Models\Restaurnt;
use App\Models\FoodCategory;
use Illuminate\Http\Request;
use App\Models\InformationRest;
use App\Http\Requests\RestaurantInformation\RestInformationRequest;
use App\Http\Requests\RestaurantInformation\RestInformationUpdateRequest;

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
        $restaurantData = Restaurnt::all();
        return view('seller.InfoRest' , compact('restaurantData'));
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

        $work_times =
            '_____'.' '.'_____'.' '.
            '_____'.' '.'_____'.' '.
            '_____'.' '.'_____'.' '.
            '_____'.' '.'_____'.' '.
            '_____'.' '.'_____'.' '.
            '_____'.' '.'_____'.' '.
            '_____'.' '.'_____'
        ;

        $restData = new InformationRest();
        $restData->rest_name = $request->name;
        $restData->rest_type = $request->rest_cat;
        $restData->phone = $request->phone;
        $restData->address = $request->address;
        $restData->account_number = $request->account_number;
        $restData->seller_id = $seller->id;
        $restData->work_times = $work_times;
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
        $restaurantData = InformationRest::find($id);
        $times = explode( ' ' , $restaurantData->work_times);

        return view('seller.show' , compact('restaurantData' , 'times'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $restaurantData = InformationRest::find($id);
        $restaurants = Restaurnt::all();
        $foodCategories = FoodCategory::all();
        return view('seller.update' , compact('restaurantData' , 'restaurants' , 'foodCategories' ));
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

        $work_times =
            $request->start_time_1.' '.$request->end_time_1.' '.
            $request->start_time_2.' '.$request->end_time_2.' '.
            $request->start_time_3.' '.$request->end_time_3.' '.
            $request->start_time_4.' '.$request->end_time_4.' '.
            $request->start_time_5.' '.$request->end_time_5.' '.
            $request->start_time_6.' '.$request->end_time_6.' '.
            $request->start_time_7.' '.$request->end_time_7
        ;

        InformationRest::find($id)
	    ->update([
		    'rest_name' => $request->name,
		    'rest_type' => $request->rest_cat,
            'food_type' => $request->food_cat,
            'address' => $request->address,
            'phone' => $request->phone,
            'account_number' => $request->account_number,
            'post_cash' => $request->post_cash,
            'work_times' => $work_times,
            'image' => $image,
	    ]);

        return redirect('RestInormations/'. $id);
    }

    public function openOrClose($id)
    {
        $restaurant = InformationRest::find($id);
        if ($restaurant->state == 'close') {
            $restaurant->update(['state' => 'open']);
        }else{
            $restaurant->update(['state' => 'close']);
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
