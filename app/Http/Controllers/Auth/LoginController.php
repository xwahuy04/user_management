<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
 public function login(Request $request)
 {
  $credentials = $request->validate([
   'email' => ['required', 'email'],
   'password' => ['required'],
  ]);

  if (Auth::attempt($credentials)) {
   $request->session()->regenerate();

   return redirect('home')->with('success', 'Login successful');
  }

  return back()->withErrors([
   'email' => 'The provided credentials do not match our records.',
  ])->onlyInput('email');
 }

 public function logout()
 {
  Auth::logout();
  return redirect('/')->with('success', 'Logout successful');
 }
}
