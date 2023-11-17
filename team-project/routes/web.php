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

// Shows register page
Route::get('/register', [UserController::class, 'register']);

// Creates a new user
Route::post('/users', [UserController::class, 'store']);

// Shows single book
Route::get('/book/{book}', [ProductsController::class, 'show']); 

// Shows searched books
Route::get('/search', [SearchController::class, 'index'])->name('Search');

//Shows create page for admins
Route::get('/create', [ProductsController::class, 'create']);

// Shows Login Form
Route::get('/login', [UserController::class, 'login']); 




//Logs in User
Route::post('/authenticate', [UserController::class, 'authenticate']);

Route::get('/aboutus', function () {
    return view('about');
});
//Shows Basket
Route::get('/basket', function () {
    return view('Basket');
});
//Shows Basket
Route::get('/payment', function () {
    return view('Paymentpage');
});