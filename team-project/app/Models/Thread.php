<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{
    protected $table = 'threads'; 
    protected $primaryKey = 'id';
    protected $fillable = [
        'thread',
        'created_at',
        'description',
        'author',
        
    ];

   
}