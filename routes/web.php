<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ViewController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\CaptchaController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ScrapperController;
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
// Route for landingpage and movies
    Route::get('/', [ViewController::class, 'home'])->name('home');
    Route::get('/movies', [ViewController::class, 'allMovies'])->name('all.movies');
    Route::get('/detail/{id}', [ViewController::class, 'detail'])->name('detail.movies');
    Route::post('/review/{id}', [ReviewController::class, 'store'])->name('review.store')->middleware('auth');
    Route::get('/movies/search', [ViewController::class, 'searchMovie'])->name('search.movies');
    Route::get('/movies/genre/{genre}', [ViewController::class, 'filterMovies'])->name('filter.movies');

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

// Routes manage movies & manage users
Route::post('/scrap', [ScrapperController::class, 'scrapMovie'])->name('scrap.movie');
Route::middleware(['auth', 'admin'])->prefix('dashboard')->group(function () {

    // movies
    Route::prefix('movies')->group(function () {
        Route::get('/', [MovieController::class, 'view'])->name('manage.movies');
        Route::post('/add', [MovieController::class, 'create'])->name('movie.add');
        Route::get('/edit/{id}', [MovieController::class, 'updateView'])->name('movie.edit');
        Route::post('/edit/{id}', [MovieController::class, 'update'])->name('movie.update');
        Route::delete('/destroy/{id}', [MovieController::class, 'destroy'])->name('movie.delete');
        Route::get('/statistics', [MovieController::class, 'movieStatistics'])->name('movie.statistics');
    });
    // users
    Route::prefix('users')->group(function () {
        Route::get('/', [UserController::class, 'viewAllUser'])->name('user.index');
        Route::get('/edit/{id}', [UserController::class, 'viewEditUser'])->name('user.edit');
        Route::post('/edit/update', [UserController::class, 'updateUser'])->name('user.update');
        Route::delete('/destroy/{id}', [UserController::class, 'deleteUser'])->name('user.delete');
        Route::get('/exportuser', [UserController::class, 'exportUser'])->name('user.export');
        Route::post('/importuser', [UserController::class, 'importUser'])->name('users.import');
        Route::get('/statistic', [UserController::class, 'genderStats'])->name('user.statistic');
    });
});

// Captcha 
Route::get('/reload-captcha', [CaptchaController::class, 'reloadCaptcha'])->name('reload.captcha');


// Login by Google
Route::get('/auth/google', [GoogleController::class, 'redirectToGoogle'])->name('google.login');
Route::get('/auth/google/callback', [GoogleController::class, 'handleGoogleCallback'])->name('google.callback');