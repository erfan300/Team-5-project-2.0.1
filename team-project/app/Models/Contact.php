<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $table = 'contactus'; 
    protected $primaryKey = 'ContactUs_ID'; 
    public $timestamps = false; 

    protected $fillable = [
        'Customer_ID',
        'Name', 
        'Email', 
        'Subject', 
        'Message', 
    ];

    public function customer() {
        return $this->belongsTo(Customer::class, 'Customer_ID', 'Customer_ID');
    }

}
