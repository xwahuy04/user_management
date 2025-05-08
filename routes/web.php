<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\loginController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('login');
});

Route::get('/register', function () {
    return view('register');
});

Route::post('login' , [loginController::class, 'login']);

Route::get('logout' , [loginController::class, 'logout']);

Route::post('register' , [RegisterController::class, 'register']);

Route::post('register' , [RegisterController::class, 'register']);

Route::get('home' , [HomeController::class, 'index']);


Route::prefix('contact/')->group(function (){
 Route::get('list' , [ContactController::class, 'index']);
 Route::get('create' , [ContactController::class, 'create']);
 Route::post('store' , [ContactController::class, 'store']);
 Route::get('edit/{id}' , [ContactController::class, 'edit']);
 Route::post('update' , [ContactController::class, 'update']);
 Route::get('delete/{id}' , [ContactController::class, 'delete']);
 Route::get('show/{id}' , [ContactController::class, 'show']);
});
