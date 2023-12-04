<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetails extends Model
{
    use HasFactory;

    protected $table = 'orderdetails'; // Adjust if your table name is different
    protected $primaryKey = 'OrderDetail_ID';
    public $timestamps = false;

    protected $fillable = [
        'Order_ID', 
        'Product_ID', 
        'Quantity',
        'Subtotal'
    ];

    // Define relationships if needed (e.g., with the Product model)
    public function product()
    {
        return $this->belongsTo(Product::class, 'Product_ID', 'Product_ID');
    }
}
