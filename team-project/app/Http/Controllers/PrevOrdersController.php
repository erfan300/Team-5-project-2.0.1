<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InventoryLog;

class PrevOrdersController extends Controller
{
    public function index()
{
    $userId = auth()->user()->User_ID;

    $userOrders = InventoryLog::where('Customer_ID', $userId)->get();
    
    return view('profile', compact('userOrders'));
}

    
    public function processReturn(Request $request)
    {
        // Handle the return process and update the stock level
        $logId = $request->input('log_id');

    $inventoryLog = InventoryLog::find($logId);

        if ($inventoryLog) {
            //the return process involves increasing the stock level
            $newStockLevel = $inventoryLog->NewStockLevel + $inventoryLog->TransactionQuantity;
            $inventoryLog->NewStockLevel = $newStockLevel;
            $inventoryLog->save();
        }

 
        
        return redirect()->route('profile');
    }
}
