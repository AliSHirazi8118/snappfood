<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use App\Models\Discount;
use Illuminate\Http\Request;

class DiscountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $discount = Discount::all();
        return view('Discounts.index' , compact('discount'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Discounts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'code' => 'required|min:6',
            'discount' => 'required|integer',
            'h' => 'required|integer',
            'd' => 'integer',
        ]);

        // $time = new Carbon();
        // // $time = Carbon::now('IRI');
        // $time = Carbon::now()->setTimezone('Asia/Tehran');//->format('Y/M/D H:i');
        // // $dt = Carbon::create(2021, 1, 31, 0);
        // // $carbon = new Carbon('first day of January 2021' , 'Asia/Tehran');
        // // $carbon1 = new Carbon('-3 days');
        // $e = 48;
        // $time->addHours($e);
        // dd($time);

        $time = Carbon::now()->setTimezone('Asia/Tehran');

        if (isset($request->h) || isset($request->d)) {
            $t = $time->addHours($request->h);
            $t = $time->addDays($request->d);
        }


        $discount = new Discount();
        $discount->code = $request->code;
        $discount->discounts = $request->discount;
        $discount->expire_time = $t;
        $discount->save();

        return redirect('discounts');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $discount = Discount::find($id);
        return view('Discounts.show' , compact('discount'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $discount = Discount::find($id);
        return view('Discounts.update' , compact('discount'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'code' => 'required|min:6',
            'discount' => 'required|integer',
            'h' => 'required|integer',
            'd' => 'integer',
        ]);

        $time = Carbon::now()->setTimezone('Asia/Tehran');

        if (isset($request->h) || isset($request->d)) {
            $t = $time->addHours($request->h);
            $t = $time->addDays($request->d);
        }

        Discount::find($id)
	    ->update([
		    'code' => $request->code,
            'discounts' => $request->discount,
            'expire_time' => $t,
	    ]);

        return redirect('discounts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Discount::destroy($id);
        return redirect('discounts');
    }
}
