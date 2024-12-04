<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('index');
});

route::get('/saved' , function(){
    return view('saved');
});

Route::get('/shop', function () {
    return view('shop');
})->name('shop'); //allows login function in AuthController to redirect to shop once logged in

Route::get('/login', function () {
    return view('login');
});

Route::post('/register', [AuthController::class, 'register'])->name('register');

Route::post('/login', [AuthController::class, 'login'])->name('login');