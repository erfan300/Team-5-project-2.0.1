<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChPassword extends Model
{
    protected $table = 'users';
    
    protected $primaryKey = 'User_ID';
    
    protected $fillable = [
        'Username', 'Password', 'Email', 'User_Type'
    ];
    public $timestamps = false;
}

