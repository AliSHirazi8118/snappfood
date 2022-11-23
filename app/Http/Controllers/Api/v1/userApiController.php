<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\v1\users\AddAddressRequest;
use App\Http\Requests\Api\v1\users\UpdateAddressRequest;
use App\Http\Resources\Api\v1\users\addressResource;
use App\Models\Address;
use App\Models\User;
use Illuminate\Http\Request;

class UserApiController extends Controller
{
    public function index()
    {
        $data = Address::all();
        return new addressResource($data);
    }

    public function store(AddAddressRequest $request)
    {
        $inputs = $request->all();
        $inputs['user_id'] = 1 ;// auth()->user()->id;
        Address::query()->create($inputs);

        return response()->json([
            'message' => "address added successfully"
        ]);
    }

    public function update(UpdateAddressRequest $request , $id)
    {

        Address::find($id)->update([
            'title' => $request->title,
            'address'=> $request->address,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude
        ]);

        return response()->json([
            'message' => "current address updated successfully"
        ]);
    }
}
