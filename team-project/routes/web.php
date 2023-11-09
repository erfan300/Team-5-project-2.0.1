<?php

use App\Models\Products;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\ProductsController;

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

Route::get('/', [ProductsController::class, 'index'])->name('home');

Route::get('/home', function () {
    return view('Home', [
        'books' => Products::all()
    ]);
})->name('home');

Route::get('/register', function () {
    return view('Signup');
});


Route::get('/signup', function () {
    return view('SignUp');
})->name('Signup');

Route::post('/register', 'App\Http\Controllers\UserController@register');

Route::post('/login', 'App\Http\Controllers\UserController@login')->name('login');


Route::get('/book/{book}', [ProductsController::class, 'show']); 

Route::get('/search', [SearchController::class, 'index'])->name('Search');

Route::get('/login', function () {
    return view('login', ['title' => 'Login']);
})->name('login');

Route::get('/aboutus', function () {
    return view('about');
});