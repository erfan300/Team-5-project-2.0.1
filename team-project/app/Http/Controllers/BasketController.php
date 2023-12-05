<?php

namespace App\Http\Controllers;

use App\Models\Basket;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\InventoryLog;
use App\Models\Orders;

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

    public function updateQuantity(Request $request, $id){
        $basket = Basket::find($id);
    
        // Validate and update the quantity
        $request->validate([
            'quantity' => 'required|integer|min:1',
        ]);
    
        $basket->update([
            'Quantity' => $request->quantity,
            'Price' => $basket->product->Price * $request->quantity,
        ]);
    
        return redirect()->back();
    }
    

    public function removeFromBasket($id){
        $basket = Basket::find($id);
        $basket->delete();

        return redirect()->back();
    }

    public function checkout(){
        $user = Auth::user();
    
        // Check if the user is logged in
        if (!$user) {
            return redirect('login')->with('message', 'Must be logged in!');
        }
    
        $customerID = null; // Initialize customerID
        $adminID = null; // Initialize adminID
    
        // Get the items in the basket and set customer/admin ID based on the user type
        if ($user->User_Type === 'Customer') {
            $customerID = $user->customer->Customer_ID;
            $basketItems = Basket::where('Customer_ID', $customerID)->get();
        } elseif ($user->User_Type === 'Admin') {
            $adminID = $user->admin->Admin_ID;
            $basketItems = Basket::where('Admin_ID', $adminID)->get();
        } 
    
        // Create a new order
        $order = new Orders();
        $order->Customer_ID = $customerID; // Set customer ID
        $order->Admin_ID = $adminID; // Set admin ID or null if Customer
        $order->Order_Date = now(); // Set order date to current date
        $order->Total_Price = 0; // Initialize total price
    
        $order->save();
    
        // Process each item in the basket
        foreach ($basketItems as $basketItem) {
            // Create order details for each item
            $orderDetail = new OrderDetails();
            $orderDetail->Order_ID = $order->Order_ID;
            $orderDetail->Product_ID = $basketItem->Product_ID;
            $orderDetail->Quantity = $basketItem->Quantity;
            $orderDetail->Subtotal = $basketItem->Price;
    
            $orderDetail->save();
    
            // Update total price of the order
            $order->Total_Price += $basketItem->Price;
    
            // Update inventory log and product stock level
            $product = Products::find($basketItem->Product_ID);
            if ($product) {
                $product->Stock_Level -= $basketItem->Quantity;
                $product->save();
    
                // Log inventory transaction
                $inventoryLog = new InventoryLog();
                $inventoryLog->Product_ID = $product->Product_ID;
                $inventoryLog->Admin_ID = $adminID; // or null if Customer
                $inventoryLog->TransactionType = 'Out';
                $inventoryLog->TransactionDate = now(); // or any other date
                $inventoryLog->TransactionQuantity = $basketItem->Quantity;
                $inventoryLog->NewStockLevel = $product->Stock_Level;
    
                $inventoryLog->save();
            }
    
            // Remove item from the basket
            $basketItem->delete();
        }
    
        // Update total price of the order
        $order->save();
    
        return redirect()->route('home')->with('message', 'Order placed successfully!');
    }
    
}


