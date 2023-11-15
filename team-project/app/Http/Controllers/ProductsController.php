<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    
    // Show all books specific to a certain category
    public function index() {

        // Retrieve books for the specified category
        $general = Products::where('Category_ID', 1)->get();
        $bestSellers = Products::where('Category_ID', 2)->get();
        $newBooks = Products::where('Category_ID', 3)->get();
        $paperbacks = Products::where('Category_ID', 4)->get();
        $hardbacks = Products::where('Category_ID', 5)->get();
        $classics = Products::where('Category_ID', 6)->get();
        $recommended = Products::where('Category_ID', 7)->get();
        $booksForChildren = Products::where('Category_ID', 8)->get();
        $booksForYoungAdults = Products::where('Category_ID', 9)->get();
        $historicalPeriod = Products::where('Category_ID', 10)->get();

        return view('index', [
            'books' => Products::all(),
            'general' => $general,
            'bestSellers' => $bestSellers,
            'newBooks' => $newBooks,
            'paperbacks' => $paperbacks,
            'hardbacks' => $hardbacks,
            'classics' => $classics,
            'recommended' => $recommended,
            'booksForChildren' => $booksForChildren,
            'booksForYoungAdults' => $booksForYoungAdults,
            'historicalPeriod' => $historicalPeriod,
        ]);
    }

    // Show a single book from the products table
    public function show(Products $book){
        if (!$book) {
            return abort(404); 
        }
        return view('show', [
            'book' => $book
        ]);
    }

    //Show form for adding book
    public function create() {
        return view('create');
    }
}
