<?php

use App\Http\Controllers\Auth\UserController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function(){

    Route::get('/login', [UserController::class, 'index'])->name('login');

});

Route::get('/', function () {
    return view('welcome');
});
