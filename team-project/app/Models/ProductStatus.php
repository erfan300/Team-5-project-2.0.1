<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductStatus extends Model
{
    use HasFactory;

    protected $table = 'productstatus';
    protected $primaryKey = 'ProductStatus_ID';
    public $timestamps = false;

    protected $fillable = [
        'Product_ID', 
        'Stock_Status', 
        'Threshold'
    ];

    // Relationship to products table 
    public function product(){
        return $this->belongsTo(Products::class, 'Product_ID');
    }
}
