<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
