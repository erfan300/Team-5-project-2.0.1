<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    // Show all books in the products table
    public function index(){
        return view('index', [
            'books' => Products::all()
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
