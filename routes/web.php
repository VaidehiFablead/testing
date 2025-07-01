<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Regcontroller;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpKernel\Profiler\Profile;

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
    return view('welcome');
});
Route::get('/form', function () {
    return view('login');
});


// registration
Route::get('/register', function () {
    return view('reg');
});
Route::get('/showForm', [Regcontroller::class, 'showForm'])->name('showForm');
Route::post('/register', [Regcontroller::class, 'register'])->name('register');



// login
Route::get('/login', function () {
    return view('login');
});
Route::get('/login', [LoginController::class, 'showLogin'])->name('loginForm');
Route::post('/login', [LoginController::class, 'login'])->name('login');

Route::get('/', function () {
    if (session()->has('user')) {
        return "Welcome, " . session('user');
    } else {
        return redirect('/login');
    }
});


// Profile
Route::get('/profile', function () {
    return view('profile');
});
Route::get('/profile', [ProfileController::class, 'showProfile']);


// update
Route::post('/profile/update',[ProfileController::class,'updateProfile'])->name('profile.update');