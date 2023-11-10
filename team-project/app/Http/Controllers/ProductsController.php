<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    // Show all books specific to a certain category
    public function index() {

        // Retrieve books for the specified category
        $bestSellers = Products::where('Category_ID', 1)->get();
        $Fiction = Products::where('Category_ID', 2)->get();

        return view('index', [
            'books' => Products::all(),
            'bestSellers' => $bestSellers,
            'fiction' => $Fiction
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
}
