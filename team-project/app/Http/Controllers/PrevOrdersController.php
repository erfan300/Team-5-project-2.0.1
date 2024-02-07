<?php

namespace App\Http\Controllers;

use App\Models\Orders;
use Illuminate\Http\Request;
use App\Models\InventoryLog;

class PrevOrdersController extends Controller
{
    public function profile()
    {
        $user = auth()->user();
        $userOrders = Orders::where('Customer_ID', $user->Customer_ID)->get();
        
        return view('profile', compact('user', 'userOrders'));
    }
    
   public function processReturn(Request $request)
    {
        // Handles the return process and update the stock level
        $logId = $request->input('log_id');

    $inventoryLog = InventoryLog::find($logId);

        if ($inventoryLog) {
            //the return process involves increasing/decreasing the stock level
            $newStockLevel = $inventoryLog->NewStockLevel + $inventoryLog->TransactionQuantity;
            $inventoryLog->NewStockLevel = $newStockLevel;
            $inventoryLog->save();
        }

 
        
        return redirect()->route('profile');
    }
    
}
