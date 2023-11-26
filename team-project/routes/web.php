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

// Store new book into Database
Route::post('/store', [ProductsController::class, 'store']);

// Shows edit book form
Route::get('/book/{book}/edit', [ProductsController::class, 'edit']);

// Update any new edits 
Route::put('/book/{book}', [ProductsController::class, 'update']);

// Delete book
Route::delete('/book/{book}', [ProductsController::class, 'delete']); 

// Shows single book
Route::get('/book/{book}', [ProductsController::class, 'show']); 

// Shows searched books
Route::get('/search', [SearchController::class, 'index'])->name('Search');

// Shows create page for admins
Route::get('/create', [ProductsController::class, 'create']);

// Shows Login Form
Route::get('/login', [UserController::class, 'login']); 

// Shows contact page
Route::get('/contact', function () {
    return view('contact');
});

//Logs in User
Route::post('/authenticate', [UserController::class, 'authenticate']);

// Shows about us page
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

//Shows Forgot Password
Route::get('/password', function () {
    return view('password');
});


//Shows Password update page
Route::get('/updatePassword', function () {
    return view('pass-update');
});

Route::middleware('auth')->group(function () {
    //route to display user profile
    Route::get('/profile', [UserController::class, 'showProfile'])->name('profile');

    //route to update user profile
    Route::post('/profile/update', [UserController::class, 'updateProfile'])->name('update-profile');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/Basket', function () {
    return view('Basket');
});

Route::get('/profile', function () {
    return view('profile');
});

