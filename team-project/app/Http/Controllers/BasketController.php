<?php

namespace App\Http\Controllers;

use App\Models\Basket;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BasketController extends Controller{

    public function addToBasket(Request $request, $id){
    if (Auth::id()) {
        $user = Auth::user();
        $book = Products::find($id);

        // Check if the item is already in the basket
        $basketItem = Basket::where('Product_ID', $book->Product_ID);

        // Check the user type
        if ($user->User_Type === 'Customer') {
            $basketItem->where('Customer_ID', $user->customer->Customer_ID);
        } elseif ($user->User_Type === 'Admin') {
            $basketItem->where('Admin_ID', $user->admin->Admin_ID);
        }

        $basketItem = $basketItem->first();

        if ($basketItem) {
            // Update the quantity of the existing item
            $basketItem->update([
                'Quantity' => $basketItem->Quantity + $request->quantityBox,
                'Price' => $book->Price * ($basketItem->Quantity + $request->quantityBox),
            ]);
        } else {
            $basket = new Basket;

            // Check the user type
            if ($user->User_Type === 'Customer') {
                $basket->Customer_ID = $user->customer->Customer_ID;
                $basket->Admin_ID = null;
            } elseif ($user->User_Type === 'Admin') {
                $basket->Admin_ID = $user->admin->Admin_ID;
                $basket->Customer_ID = null;
            }

            $basket->Product_ID = $book->Product_ID;
            $basket->Quantity = $request->quantityBox;
            $basket->Price = $book->Price * $basket->Quantity;

            $basket->save();
        }

        return redirect()->back()->with('message', 'Item added to the basket successfully!');
    } else {
        return redirect('login')->with('message', 'Must be logged in!');
    }
}

    public function showBasket(){
        $user = Auth::user();
        if (!$user) {
            return redirect('login')->with('message', 'Must be logged in!');
        }
        // Check the user type
        if ($user->User_Type === 'Customer') {
            $customerID = $user->customer->Customer_ID;
            $basket = Basket::where('Customer_ID', $customerID)->get();
        } elseif ($user->User_Type === 'Admin') {
            $adminID = $user->admin->Admin_ID;
            $basket = Basket::where('Admin_ID', $adminID)->get();
        } 

        return view('basket', [
            'basket' => $basket,
        ]);
    }

    public function removeFromBasket($id){
        $basket = Basket::find($id);
        $basket->delete();

        return redirect()->back();
    }
}


