<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InventoryLog extends Model
{
    use HasFactory;

    protected $table = 'inventorylog';
    protected $primaryKey = 'Log_ID';
    public $timestamps = false;

    protected $fillable = [
        'Log_ID', 
        'Product_ID', 
        'Admin_ID',
        'TransactionType',
        'TransactionDate',
        'TransactionQuantity',
        'NewStockLevel'
    ];

 
}