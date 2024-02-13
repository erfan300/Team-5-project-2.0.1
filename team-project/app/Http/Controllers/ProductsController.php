<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;
use App\Models\ProductImages;
use App\Models\ProductStatus;
use Illuminate\Support\Facades\Log;
use App\Models\Comment;


class ProductsController extends Controller
{
    
    // Show all books specific to a certain category on the homepage
    public function index() {

        // Retrieve books for the specified category
        $general = Products::where('Category_ID', 1)->get();
        $bestSellers = Products::where('Category_ID', 2)->get();
        $newBooks = Products::where('Category_ID', 3)->get();
        $classics = Products::where('Category_ID', 4)->get();
        $recommended = Products::where('Category_ID', 5)->get();
        $booksForChildren = Products::where('Category_ID', 6)->get();
        $booksForYoungAdults = Products::where('Category_ID', 7)->get();
        $historicalPeriod = Products::where('Category_ID', 8)->get();

        return view('index', [
            'books' => Products::all(),
            'general' => $general,
            'bestSellers' => $bestSellers,
            'newBooks' => $newBooks,
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
        $genre = $book->Book_Genre;
        $author = $book->Author_Name;

        $comments = Comment::where('product_id', $book->Product_ID)->whereNull('parent_id')->with('replies.user')->get();


        // filtering recommended books based on what the customer or admin chose to view
        $recommendedBooks = Products::where(function($query) use ($genre, $author) {
            $query->where('Author_Name', $author)
                  ->orWhere('Book_Genre', $genre);
        })
        ->where('Product_ID', '!=', $book->Product_ID)
    ->take(5)
    ->get();
    

        return view('show', [
            'book' => $book,
            'recommendedBooks' => $recommendedBooks,
            'comments' => $comments,
        ]);
    }

    //Show form for adding book
    public function create() {
        return view('create');
    }

    //store new book data
    public function store(Request $request) {   
        $formFields = $request->validate([
            'Product_Name' => 'required',
            'Description' => 'required',
            'Price' => 'required',
            'Stock_Level' => 'required',
            'Author_Name' => 'required',
            'Book_Type' => 'required',
            'Book_Genre' => 'required',
            'Category_ID' => 'required',
            'Book_Image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $product = Products::create($formFields);

        // Handle image upload
        if ($request->hasFile('Book_Image')) {
            $imagePath = $request->file('Book_Image')->store('product_images', 'public');
    
            // Creates a new product image and stores it in the ProductImages table
            $product->productimages()->create([
                'Image_URL' => $imagePath,
            ]);
        }
        $this->updateProductStatus($product);

        return redirect('/')->with('message', 'Book Added Successfully!');

    }

    //Show edit book form
    public function edit(Products $book) {
        return view('edit', ['book' => $book]);
    }

    //Update book data
    public function update(Request $request, Products $book) {   
        $formFields = $request->validate([
            'Product_Name' => 'required',
            'Description' => 'required',
            'Price' => 'required',
            'Stock_Level' => 'required',
            'Author_Name' => 'required',
            'Book_Type' => 'required',
            'Book_Genre' => 'required',
            'Category_ID' => 'required',
            'Book_Image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Update the book data
        $book->update($formFields);

        if ($request->hasFile('Book_Image')) {
            $imagePath = $request->file('Book_Image')->store('product_images', 'public');

            if ($book->productimages->first()) {
                // If yes, update the existing image
                $book->productimages->first()->update([
                    'Image_URL' => $imagePath,
                ]);
            } else {
                // If no, create a new image
                $book->productimages()->create([
                    'Image_URL' => $imagePath,
                ]);
            }
        }

        $this->updateProductStatus($book);

        return redirect('/book/' . $book->Product_ID)->with('message', 'Book Updated Successfully!');
    }

    protected function updateProductStatus(Products $product){
        $stockLevel = $product->Stock_Level;
    
        $threshold = 9;
    
        if ($stockLevel >= 10) {
            $status = 'In Stock';
        } elseif ($stockLevel > 0) {
            $status = 'Low Stock';
        } else {
            $status = 'Out of Stock';
        }
    
        $productStatus = $product->productStatus;
    
        if (!$productStatus) {
            $product->productStatus()->create([
                'Stock_Status' => $status,
                'Threshold' => $threshold,
            ]);
        } else {
            $productStatus->update([
                'Stock_Status' => $status,
                'Threshold' => $threshold,
            ]);
        }
    }

    // Delete book from database
    public function delete(Products $book) {
        $book->productImages()->delete(); //deletes image first
        $book->productStatus()->delete(); //deletes product status second
        $book->delete(); //than deletes the book
        return redirect('/')->with('message', 'Book Deleted Successfully!');
    }

}
