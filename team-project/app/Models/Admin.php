<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Admin extends Model
{
    use HasFactory;
    protected $table = 'admins';
    protected $primaryKey = 'Admin_ID';
    public $timestamps = false;
    
    protected $fillable = [
        'User_ID',
        'First_Name',
        'Last_Name',
        'Email',
        'Phone_Number',
    ];

    public function user(){
        return $this->belongsTo(User::class, 'User_ID', 'User_ID');
    }

    public function orders() {
        return $this->hasMany(Orders::class, 'Admin_ID');
    }

}
