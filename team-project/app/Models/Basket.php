<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Basket extends Model
{
    use HasFactory;
    protected $table = 'basket';
    protected $primaryKey = 'Basket_ID';
    public $timestamps = false;

    protected $fillable = [
        'Customer_ID',
        'Admin_ID',
        'Product_ID',
        'Quantity',
        'Price',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'Customer_ID');
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class, 'Admin_ID');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'Product_ID');
    }
}

