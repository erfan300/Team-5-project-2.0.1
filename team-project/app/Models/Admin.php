<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;
    protected $table = 'admins';
    protected $primaryKey = 'Admin_ID';
    public $timestamps = false;
    
    protected $fillable = [
        'First_Name',
        'Last_Name',
        'Email',
        'Phone_Number',
        // Add other fields that are fillable here
    ];
}
