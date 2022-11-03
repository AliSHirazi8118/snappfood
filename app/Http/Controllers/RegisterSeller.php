<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Seller;
use App\Models\Restaurnt;
use Illuminate\Http\Request;

class RegisterSeller extends Controller
{
    public function register_view()
    {
        return view('seller.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|min:2',
            'email' => 'required|email|unique:sellers',
            'phone' => 'required|integer|unique:sellers|min:10',
            'password' => 'required|min:6',
            'verify_password' => 'required_with:password|same:password|min:6',
        ]);

        $seller = new Seller();
        $seller->name = $request->name;
        $seller->email = $request->email;
        $seller->phone = $request->phone;
        $seller->password = $request->password;
        $seller->save();

        $role = 'seller';
        User::find(auth()->user()->id)
            ->update([
                'role' => $role
        ]);

        return redirect('dashboard');
    }
}
