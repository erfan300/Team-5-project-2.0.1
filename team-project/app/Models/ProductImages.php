<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductImages extends Model
{
    use HasFactory;

    protected $table = 'productimages';
    protected $primaryKey = 'Image_ID';
    public $timestamps = false;

    protected $fillable = [
        'Product_ID',
        'Image_URL',
    ];

    public function product()
    {
        return $this->belongsTo(Products::class, 'Product_ID');
    }
}
