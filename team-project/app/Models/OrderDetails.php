<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Products;
use App\Models\Orders;
use App\Models\Customer;
use App\Models\Admin;

class OrderDetails extends Model
{
    use HasFactory;

    protected $table = 'orderdetails'; 
    protected $primaryKey = 'OrderDetail_ID';
    public $timestamps = false;

    protected $fillable = [
        'Order_ID', 
        'Product_ID', 
        'Quantity',
        'Subtotal'
    ];

    public function product()
    {
        return $this->belongsTo(Products::class, 'Product_ID', 'Product_ID');
    }

    public function order()
    {
        return $this->belongsTo(Orders::class, 'Order_ID', 'Order_ID');
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'Customer_ID', 'Customer_ID');
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class, 'Admin_ID', 'Admin_ID');
    }
}
