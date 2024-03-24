<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{
    protected $table = 'threads'; 
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'thread',
        'created_at',
        'description',
        'author',
        
    ];

    

   
}