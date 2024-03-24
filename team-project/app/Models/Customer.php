<?php

namespace App\Models;

use App\Models\Basket;
use App\Models\Wishlist;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\ContactController;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Customer extends Model
{
    use HasFactory;
    protected $table = 'customers';
    protected $primaryKey = 'Customer_ID';
    public $timestamps = false;

    protected $fillable = [
        'User_ID',
        'First_Name',
        'Last_Name',
        'Address',
        'Phone_Number',
    ];

    public function user() {
        return $this->belongsTo(User::class, 'User_ID', 'User_ID');
    }

    public function contactUs() {
        return $this->hasMany(Contact::class, 'Customer_ID', 'Customer_ID');
    }

    public function orders() {
        return $this->hasMany(Orders::class, 'Customer_ID');
    }

    public function basket(){
        return $this->hasMany(Basket::class, 'Customer_ID');
    }

    public function wishlist(){
        return $this->hasMany(Wishlist::class, 'Customer_ID');
    }


}
