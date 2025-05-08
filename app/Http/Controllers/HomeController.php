<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        if (!Auth::check()) {
            return redirect('/')->with('error', 'Please login first');
        }

        // or
        // $user = Auth::user();
        // if (!$user) {
        //     return redirect('/')->with('error', 'Please login first');
        // };

        $user = Auth::user();
        return view('home' , compact('user'));
    }
}
