<?php

namespace App\Http\Controllers\Api\v1;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\v1\auth\registerRequest;
use App\Http\Resources\Api\v1\auth\registerResource;

class authApiController extends Controller
{
    public function register(registerRequest $request)
    {
        $inputs = $request->all();
        $inputs['password'] = bcrypt($inputs['password']);
        $user = User::query()->create($inputs);
        $token = $user->createToken('My App')->plainTextToken;

        return new registerResource($user , $token);

        // return response()->json(
        //     [
        //         'data' => [
        //             'name' => $user->name,
        //             'email' => $user->email,
        //             'token' => $token
        //         ]
        //     ]
        // );
    }

    public function login()
    {
        
    }


}
