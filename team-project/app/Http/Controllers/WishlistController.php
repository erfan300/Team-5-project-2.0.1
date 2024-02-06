<?php

namespace App\Http\Controllers;

use App\Models\Products;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function addToWishlist(Request $request, $id){
        if (Auth::id()) {
            $user = Auth::user();
            $book = Products::find($id);

            // Check if the item is already in the wishlist
            $wishlistItem = Wishlist::where('Product_ID', $book->Product_ID);

            // Check the user type
        if ($user->User_Type === 'Customer') {
            $wishlistItem->where('Customer_ID', $user->customer->Customer_ID);
        } elseif ($user->User_Type === 'Admin') {
            $wishlistItem->where('Admin_ID', $user->admin->Admin_ID);
        }

        $wishlistItem = $wishlistItem->first();

        if ($wishlistItem) {
            return redirect()->back()->with('message', 'This book is already in your wishlist!');
        } else {
            $wishlist = new Wishlist;

            // Check the user type
            if ($user->User_Type === 'Customer') {
                $wishlist->Customer_ID = $user->customer->Customer_ID;
                $wishlist->Admin_ID = null;
            } elseif ($user->User_Type === 'Admin') {
                $wishlist->Admin_ID = $user->admin->Admin_ID;
                $wishlist->Customer_ID = null;
            }

            $wishlist->Product_ID = $book->Product_ID;
            $wishlist->save();
        }

        return redirect()->back()->with('message', 'Item added to the wishlist successfully!');
        } else {
            return redirect('login')->with('message', 'Must be logged in!');
        }
    }

    public function showWishlist(){
        $user = Auth::user();
        if (!$user) {
            return redirect('login')->with('message', 'Must be logged in!');
        }
        // Check the user type
        if ($user->User_Type === 'Customer') {
            $customerID = $user->customer->Customer_ID;
            $wishlist = Wishlist::where('Customer_ID', $customerID)->get();
        } elseif ($user->User_Type === 'Admin') {
            $adminID = $user->admin->Admin_ID;
            $wishlist = Wishlist::where('Admin_ID', $adminID)->get();
        } 

        return view('wishlist', [
            'wishlist' => $wishlist,
        ]);
    }

    public function removeFromWishlist($id){
        $wishlist = Wishlist::find($id);
        $wishlist->delete();

        return redirect()->back();
    }





}

