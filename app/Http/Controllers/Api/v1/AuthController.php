<?php

namespace App\Http\Controllers\Api\v1;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\v1\auth\loginRequest;
use App\Http\Requests\Api\v1\auth\registerRequest;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(registerRequest $request)
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

    public function login(loginRequest $request)
    {
        if(auth()->attempt($request->all()))//Auth::attempt(['email' => $request->email , 'password' => $request->password])
        {
            $user = User::find(auth()->user()->id);
            $token = $user->createToken('My App')->plainTextToken;
            return response()->json(
                [
                    'data' => [
                        'name' => $user->name,
                        'email' => $user->email,
                        'token' =>$token
                    ]
                ]
            );
        }
        else
        {
            return response()->json(
                [
                    'data' =>[
                        'message' => 'The entered information is not correct',
                    ]
                ],
                401
            );
        }
    }


}
