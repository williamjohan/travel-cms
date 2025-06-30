<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
    if (Auth::check()) {
        return redirect()->route('home');
    }
    return view('pages.auth.login2');
});

Route::middleware('auth')->group(function () {
    Route::get('/home', function () {
        return view('pages.dashboard');
    })->name('home');

    // Route::get('/users', function () {
    //     return view('pages.users.index');
    // })->name('users');
});


// Route::get('/login', function () {
//     return view('pages.auth.login2');
// })->name('login');

// Route::get('/register', function () {
//     return view('pages.auth.register');
// })->name('register');

// Route::get('/users', function () {
//     return view('pages.users.index');
// })->name('users');