<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;

    protected $table = 'orders';
    protected $primaryKey = 'Order_ID';
    public $timestamps = false;

    protected $fillable = [
        'Order_ID', 
        'Customer_ID', 
        'Admin_ID',
        'Order_Data',
        'Total_Price'
    ];
    public function customer() {
        return $this->belongsTo(Customer::class, 'Customer_ID');
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class, 'Admin_ID', 'Admin_ID');
    }

    public function logs() {
        return $this->hasMany(InventoryLog::class, 'Order_ID');
    }
 
    public function orderDetails()
    {
        return $this->hasMany(OrderDetails::class, 'Order_ID', 'Order_ID');
    }
}
