<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});


Route::resource('/dashboard', UserController::class);

Route::get('/about', function () {
    return view('about');
});
