<?php

use App\Http\Controllers\Auth\RegisterController;
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

Route::post('register' , [RegisterController::class, 'register']);

Route::prefix('user/')->group(function (){
 Route::get('list' , [UserController::class, 'index']);
 Route::get('create' , [UserController::class, 'create']);
 Route::post('store' , [UserController::class, 'store']);
 Route::get('edit/{id}' , [UserController::class, 'edit']);
 Route::post('update' , [UserController::class, 'update']);
 Route::get('delete/{id}' , [UserController::class, 'delete']);
 Route::get('show/{id}' , [UserController::class, 'show']);
});
