<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

route ::get('/aboutUs' , function(){
    return view('aboutUs');

});

Route::get('/index', function () {
    return view('index');
});

Route::get('/register', function () {
    return view('register');
});

//To run locally you must go to gitbash, navigate to the project directory in
//cd C:\xampp\htdocs\dashboard\'whateveryourfileiscalled'
//start apache and mysql in xammp then in gitbash type php artisan serve
//this will then run locally and you can then test changes