<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(){
        return view('search', [
            'books' => Products::filter(request(['author', 'search']))->orderBy('Product_ID', 'desc')->get()
        ]);
    }


}
