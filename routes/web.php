<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContactUsController;

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

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('/aboutUs', function () {
    return view('aboutUs');
});

Route::get('/index', function () {
    return view('index');
});

Route::post('/register', [AuthController::class, 'register'])->name('register');

Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::post('/contact', [ContactUsController::class, 'contactUs'])->name('contactUs');