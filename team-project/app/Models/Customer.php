<?php

namespace App\Models;

use App\Http\Controllers\ContactController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $table = 'customers';
    protected $primaryKey = 'Customer_ID';
    public $timestamps = false;

    protected $fillable = [
        'User_id',
        'First_name',
        'Last_name',
        'Address',
        'Phone_number',
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


}
