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

    public function showPreviousOrders()
    {
        $user = Auth::user();
        $userOrders = $user->orders;

    return view('profile', compact('userOrders'));
    }
}

