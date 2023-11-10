<?php

use App\Models\Products;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\UserController;

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

// index/home page
Route::get('/', [ProductsController::class, 'index'])->name('home');

Route::get('/home', [ProductsController::class, 'index'])->name('home');

Route::get('/register', function () {
    return view('signup');
});

Route::get('/signup', function () {
    return view('signUp');
})->name('Signup');

Route::post('/register', 'App\Http\Controllers\UserController@register');

Route::post('/login', 'App\Http\Controllers\UserController@login')->name('login');

// Shows single book
Route::get('/book/{book}', [ProductsController::class, 'show']); 

// Shows searched books
Route::get('/search', [SearchController::class, 'index'])->name('Search');

Route::get('/create', [ProductsController::class, 'create']);

Route::get('/login', function () {
    return view('login', ['title' => 'Login']);
})->name('login');

Route::get('/aboutus', function () {
    return view('about');
});