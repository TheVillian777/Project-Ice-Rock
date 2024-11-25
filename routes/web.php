<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

route ::get('/aboutUs' , function(){
    return view('aboutUs');

});