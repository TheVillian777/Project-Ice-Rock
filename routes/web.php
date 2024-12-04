<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

route::get('/saved' , function(){
    return view('saved');

});

Route::get('/shop', function () {
    return view('shop');
});

Route::get('/login', function () {
    return view('login');
});

//To run locally you must go to gitbash, navigate to the project directory in
//cd C:\xampp\htdocs\dashboard\'whateveryourfileiscalled'
//start apache and mysql in xammp then in gitbash type php artisan serve
//this will then run locally and you can then test changes