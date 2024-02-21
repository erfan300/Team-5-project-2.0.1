<?php

use App\Models\Products;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\BasketController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DiscountController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\ChPasswordController;
use App\Http\Controllers\PrevOrdersController;
use App\Http\Controllers\CommentController;


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
//Contact page

Route::post('/save-contact', [ContactController::class, 'store'])->name('save.contact');


// index/home page
Route::get('/', [ProductsController::class, 'index'])->name('home');

Route::get('/home', [ProductsController::class, 'index'])->name('home');

// Shows register page
Route::get('/register', [UserController::class, 'register']);

// Creates a new user
Route::post('/users', [UserController::class, 'store']);

// Store new book into Database
Route::post('/store', [ProductsController::class, 'store']); 

// Shows single book
Route::get('/book/{book}', [ProductsController::class, 'show']); 

// Shows searched books
Route::get('/search', [SearchController::class, 'index'])->name('Search');

// Shows Login Form
Route::get('/login', [UserController::class, 'login'])->name('login'); 
Route::post('/login', [UserController::class, 'login']);


// Shows contact page
Route::get('/contact', function () {
    return view('contact');
})->name('contact');

//Logs in User
Route::post('/authenticate', [UserController::class, 'authenticate']);

//Logs out User
Route::post('/logout', [UserController::class, 'logout']);

// Shows about us page
Route::get('/aboutus', function () {
    return view('about');
})->name('about');


//Shows Payment
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
    Route::get('/discountpage', [DiscountController::class , 'index'])->name('discountpage');
    Route::post('/create-discount', [DiscountController::class, 'create'])->name('create-discount');

});

// Apply discount method for form
Route::post('/apply-discount', [BasketController::class, 'applyDiscount'])->name('apply-discount');

// Middleware for admin access only
Route::middleware('admin')->group(function () {
    // Shows edit book form
    Route::get('/book/{book}/edit', [ProductsController::class, 'edit']);

    // Update any new edits 
    Route::put('/book/{book}', [ProductsController::class, 'update']);

    // Delete book
    Route::delete('/book/{book}', [ProductsController::class, 'delete']);
    
    // Shows create page for admins
    Route::get('/create', [ProductsController::class, 'create']);

    Route::get('/list', [AdminController::class, 'listCustomers'])->name('list-customers');
    Route::get('/customer/{id}', [AdminController::class, 'showCustomerDetails'])->name('customer.details');
    Route::delete('/customer/{id}', [AdminController::class, 'deleteCustomer'])->name('customer.delete');
    Route::get('/customer/{id}/modify', [AdminController::class, 'modifyCustomer'])->name('modify-customer');
    Route::put('/customer/{id}/update', [AdminController::class, 'updateCustomer'])->name('update-customer');
    Route::get('/create-customer', [AdminController::class, 'createCustomer'])->name('create-customer');
    Route::post('/store-customer', [AdminController::class, 'storeCustomer'])->name('store-customer');

    //show order details page
    Route::get('/order-report', [OrderController::class, 'orderReports'])->name('order-report');

});

Route::get('/about', function () {
    return view('about');
});
// Show Basket page
Route::get('/basket', [BasketController::class,'showBasket'])->name('basket');

// Adds book to basket
Route::post('/addToBasket/{id}', [BasketController::class, 'addToBasket'])->name('addToBasket');

// Update the quantity in the basket
Route::post('/updateQuantity/{id}', [BasketController::class, 'updateQuantity']);

// Remove book from basket
Route::get('/removeFromBasket/{id}', [BasketController::class,'removeFromBasket']);

// Show Wishlist page
Route::get('/wishlist', [WishlistController::class,'showWishlist'])->name('wishlist');

// Add book to Wishlist
Route::post('/addToWishlist/{id}', [WishlistController::class, 'addToWishlist'])->name('addToWishlist');

// Remove book from wishlist
Route::get('/removeFromWishlist/{id}', [WishlistController::class,'removeFromWishlist']);

// Show change password form
Route::get('/change-password', [ChPasswordController::class, 'showChangePasswordForm'])->name('change-password-form');

// Handle change password request
Route::post('/change-password', [ChPasswordController::class, 'changePassword'])->name('change-password');


Route::post('/checkout', [BasketController::class, 'checkout'])->name('checkout');

// View forum page
Route::get('/forum', function () {
    return view('forum');
});


Route::post('comments/{product}', [CommentController::class, 'store'])->middleware('auth')->name('comments.store');
Route::get('comments/{product}', [CommentController::class, 'show'])->middleware('auth')->name('comments.show');
Route::post('/comments/reply/{product_id}/{comment_id}', [CommentController::class, 'reply'])->middleware('auth')->name('comments.reply');
Route::delete('/comments/{product_id}/{comment_id}', [CommentController::class, 'destroy'])->middleware('auth')->name('comments.destroy');
