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
        'Name', 
        'Email', 
        'Subject', 
        'Message', 
        'Status', 
        'Response', 
        'Response_Date'
    ];
}
