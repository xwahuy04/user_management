<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RegisterController extends Controller
{
    public function register(Request $request)
    {

        $validated = $request->validate([
            'first_name' => 'required|max:16|min:5',
            'last_name' => 'required|max:16|min:5',
            'email' => 'required|email|unique:users',
            'password' => 'required|max:16|min:6',
            'phone' => 'required|digits:10|integer',
        ]);

        if ($request->file('image')) {
            $image = $request->file('image');
            $img_name = rand(100000 , 999999). time() . '.' . $image->getClientOriginalExtension();
            $image->move('images', $img_name);
            $img_name = 'images/' . $img_name;
        }

        $user = new User();
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->gender = $request->gender;
        $user->hobby =  ($request->hobby) ? implode(',', $request->hobby) : null;
        $user->image = isset($img_name) ? $img_name : null;
        $user->save();

        return redirect('/')->with('success', 'User registered successfully');
    }
}
