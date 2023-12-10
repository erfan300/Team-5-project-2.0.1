<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;

class SearchController extends Controller{
    public function index(Request $request){
        return view('search', [
            'books' => Products::filter([
                'author' => $request->input('author'),
                'search' => $request->input('search'),
                'genre' => $request->input('genre'),
                'category' => $request->input('category'),
                'type' => $request->input('type'),
            ])->orderBy('Product_ID', 'desc')->paginate(14)
        ]);
    }


}
