<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $table = 'contactus'; // Set the table name
    protected $primaryKey = 'ContactUs_ID'; // Set the primary key if different from 'id'
    public $timestamps = false; // If 'created_at' and 'updated_at' fields are not present

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
