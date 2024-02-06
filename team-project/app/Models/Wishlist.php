<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    use HasFactory;
    protected $table = 'wishlist';
    protected $primaryKey = 'Wishlist_ID';
    public $timestamps = false;

    protected $fillable = [
        'Customer_ID',
        'Admin_ID',
        'Product_ID',
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
        return $this->belongsTo(Products::class, 'Product_ID');
    }
}

