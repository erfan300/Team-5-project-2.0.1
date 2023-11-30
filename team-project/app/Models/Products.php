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

    protected $fillable = [
    'Category_ID',
    'Product_Name',
    'Description',
    'Price',
    'Stock_Level',
    'Author_Name',
    'Book_Type',
    'Book_Genre'];

    public function scopeFilter($query, array $filters) {
        //This filter is for author link in the book showcase
        if($filters['author'] ?? false) {
            $query->where('Author_Name', 'like', '%' . request('author') . '%');
        }

        //This filter is for the search bar
        if ($filters['search'] ?? false) {
            $query->where(function ($query) use ($filters) {
                $query->where('Product_Name', 'like', '%' . request('search') . '%')
                    ->orWhere('Author_Name', 'like', '%' . request('search') . '%')
                    ->orWhere('Description', 'like', '%' . request('search') . '%')
                    ->orWhere('Book_Type', 'like', '%' . request('search') . '%')
                    ->orWhere('Book_Genre', 'like', '%' . request('search') . '%');
    
                $query->orWhereHas('category', function ($query) use ($filters) {
                    $query->where('Category_Name', 'like', '%' . request('search') . '%');
                });
            });
        }

        //These three filters are for the filter list next to the searchbar
        if ($filters['genre'] ?? false) {
            $query->where('Book_Genre', $filters['genre']);
        }

        if ($filters['category'] ?? false) {
            $query->where('Category_ID', $filters['category']);
        }

        if ($filters['type'] ?? false) {
            $query->where('Book_Type', $filters['type']);
        }
    }

    //Relationship between products model and the productCategory model
    public function category(){
        return $this->belongsTo(ProductCategories::class, 'Category_ID');
    }

    //Relationship between Product and the productImages model
    public function productImages(){
        return $this->hasMany(ProductImages::class, 'Product_ID');
    }

    // One-to-one relationship with the ProductStatus model:
    public function productStatus(){
        return $this->hasOne(ProductStatus::class, 'product_id');
    }
}
