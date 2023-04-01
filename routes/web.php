<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DetailMovieController;
use App\Http\Controllers\UpdatePasswordController;

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
    return view('home', [
        'active' => '/',
        'title' => 'Home'
    ]);
})->name('home');


Route::get('/movies', function () {
    return view('movies', [
        'active' => 'movies',
        'title' => 'Movies'
    ]);
});

Route::get('/detail', [DetailMovieController::class, 'index'])->name('detail-movies');

// Routes profile && profile update
Route::get('/admin', [AdminController::class, 'index'])->middleware('auth')->name('admin');
Route::put('/admin/update', 'App\Http\Controllers\AdminController@update')->middleware('auth')->name('admin.update');

// Change password
Route::get('changepw', [UpdatePasswordController::class, 'index'])->middleware('auth')->name('password.edit');
Route::put('changepw/update', 'App\Http\Controllers\UpdatePasswordController@update')->middleware('auth')->name('password.update');

// Routes login
Route::get('/login', [LoginController::class, 'index'])->middleware('guest')->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Routes register
Route::get('/register', [RegisterController::class, 'index'])->name('register')->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

// Login by Google
// Route::get('/auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);