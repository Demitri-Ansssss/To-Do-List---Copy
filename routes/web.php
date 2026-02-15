<?php

use Illuminate\Support\Facades\Route;

Route::get('/debug', function () {
    return response()->json([
        'message' => 'Debug route working',
        'env' => app()->environment(),
        'routes_loaded' => count(Route::getRoutes()),
    ]);
});

Route::get('/', function () {
    return view('Login');
})->name('login');

Route::get('/home', function () {
    return view('Homepage');
});
Route::get('/signup', function () {
    return view('Signup');
});

