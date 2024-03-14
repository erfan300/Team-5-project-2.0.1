<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\OrderDetails;
use App\Models\Orders;
use App\Models\InventoryLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;



class PrevOrdersController extends Controller
{
    //public function profile()
    //{
      //  $user = auth()->user();

        
        //$userOrders = $user->orders()->with(['orderDetails.product'])->get();
    
        //return view('profile', compact('user', 'userOrders'));
    //}
    
    public function showPreviousOrders(Request $request)
{
    $user = auth()->user();
    $userId = $user->User_ID;

    $orders = Orders::query()
        ->join('customers', 'orders.Customer_ID', '=', 'customers.Customer_ID')
        ->where('customers.User_ID', $userId)
        ->with('orderDetails.product')
        ->get();

    // return the PrevOrders view with the orders data
    return view('PrevOrders', compact('orders'));

}

public function returnOrder($orderDetailId)
    {
        DB::transaction(function () use ($orderDetailId) {
            $orderDetail = OrderDetails::findOrFail($orderDetailId);
            $product = $orderDetail->product; 
            $quantity = $orderDetail->Quantity;

            // Update the inventory
            $latestInventory = InventoryLog::where('Product_ID', $product->Product_ID)->latest('TransactionDate')->first();
            if ($latestInventory) {
                InventoryLog::create([
                    'Product_ID' => $product->Product_ID,
                    'Admin_ID' => auth()->user()->id, 
                    'TransactionType' => 'In', // using In for transaction type
                    'TransactionDate' => now(),
                    'TransactionQuantity' => $quantity,
                    'NewStockLevel' => $latestInventory->NewStockLevel + $quantity,
                ]);
            }

            
            $orderDetail->delete();
        });

        return back()->with('success', 'Order returned and inventory updated.');
    }
  
}
