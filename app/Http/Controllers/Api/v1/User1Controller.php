<?php

namespace App\Http\Controllers\Api\v1;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class User1Controller extends Controller
{
    public function index(){

        $users = User::all();
        return $users;

    }

    public function store(Request $request)
    {
        $inputs = $request->all();
        $inputs['password'] = bcrypt($inputs['password']);
        $user = User::query()->create($inputs);
        $token = $user->createToken('My App')->plainTextToken;

        return response()->json(
            [
                'data' => [
                    'name' => $user->name,
                    'email' => $user->email,
                    'token' => $token
                ]
            ]
        );
    }

    public function show($id){

        $user = User::find($id);
        return $user;
    }

    public function update(Request $request ,$id)
    {
        $user = User::find($id)->update([
            'name' => $request->name
        ]);
        return User::find($id);
    }



    public function destroy(){

    }
}
