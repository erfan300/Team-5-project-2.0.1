<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Orders;
use App\OrderDetail;
use App\Models\OrderDetails;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function orderReports()
    {
        // gets all the order details and stores it into orderDetails
        $orderDetails = OrderDetails::with(['order.customer', 'order.admin', 'product'])->get();
        return view('orderReport', compact('orderDetails'));
    }

    //This allows admin to process order
    public function updateOrderProcess($orderID) {
        $order = Orders::find($orderID);
        if ($order) {
            $order->Order_Process = 'Order Processed';
            $order->save();
            return redirect()->back()->with('message', 'Order process status updated successfully.');
        }
        return redirect()->back()->with('message', 'Failed to update order process status.');
    }

    public function showPreviousOrders()
    {
        $user = Auth::user();
        $userOrders = $user->orders;

    return view('profile', compact('userOrders'));
    }
}

