<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiscountCode extends Model
{
    use HasFactory;

    protected $table = 'discountcodes';

    protected $fillable = [
        'code',
        'percentage',
        'expiry_date',
        'active',
    ];

    protected $casts = [
        'expiry_date' => 'date',
        'active' => 'boolean',
    ];

    public $timestamps = false;
}
