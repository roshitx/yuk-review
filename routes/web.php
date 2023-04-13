<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ViewController;
use App\Http\Controllers\UpdatePasswordController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\ScrapperController;

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
// Route for landingpage and movies
    Route::get('/', [ViewController::class, 'home'])->name('home');
    Route::get('/movies', [ViewController::class, 'allMovies'])->name('all.movies');
    Route::get('/detail/{id}', [ViewController::class, 'detail'])->name('detail.movies');
    Route::get('/movies/search', [ViewController::class, 'searchMovie'])->name('search.movies');

// Routes profile && profile update
Route::get('/dashboard', [AdminController::class, 'index'])->middleware('auth')->name('admin');
Route::put('/admin/update', [AdminController::class, 'update'])->middleware('auth')->name('admin.update');

// Change password
Route::get('changepw', [UpdatePasswordController::class, 'index'])->middleware('auth')->name('password.edit');
Route::put('changepw/update', [UpdatePasswordController::class, 'update'])->middleware('auth')->name('password.update');

// Routes login
Route::get('/login', [LoginController::class, 'index'])->middleware('guest')->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Routes register
Route::get('/register', [RegisterController::class, 'index'])->name('register')->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

// Routes manage movies
Route::post('/scrap', [ScrapperController::class, 'scrapMovie'])->name('scrap.movie');
Route::group(['prefix' => 'dashboard', 'middleware' => 'auth'], function () {
    Route::group(['prefix' => 'movies', 'middleware' => 'admin'], function () {
        Route::get('/', [MovieController::class, 'view'])->name('manage.movies')->middleware('admin');
        Route::post('/add', [MovieController::class, 'create'])->name('movie.add');
        Route::get('/edit/{id}', [MovieController::class, 'updateView'])->name('movie.edit');
        Route::post('/edit/{id}', [MovieController::class, 'update'])->name('movie.update');
        Route::delete('/delete/{id}', [MovieController::class, 'destroy'])->name('movie.delete');
    });
    Route::group(['prefix' => 'users', 'middleware' => 'admin'], function () {
        Route::get('/', 'UserController@index')->name('user.index');
        Route::get('/{id}/edit', 'UserController@edit')->name('user.edit');
        Route::post('/{id}', 'UserController@update')->name('user.update');
        Route::delete('/{id}', 'UserController@delete')->name('user.delete');
    });
});


// Login by Google
// Route::get('/auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);