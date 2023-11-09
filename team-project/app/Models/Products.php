<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $primaryKey = 'Product_ID';
    public $timestamps = false;

    public function scopeFilter($query, array $filters) {
        if($filters['author'] ?? false) {
            $query->where('Author_Name', 'like', '%' . request('author') . '%');
        }

        if($filters['search'] ?? false) {
            $query->where('Product_Name', 'like', '%' . request('search') . '%')
                ->orWhere('Author_Name', 'like', '%' . request('search') . '%')
                ->orWhere('Description', 'like', '%' . request('search') . '%')
                ->orWhere('Book_Type', 'like', '%' . request('search') . '%');
        }
    }
}
