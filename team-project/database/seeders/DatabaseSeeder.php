<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Products;
use App\Models\ProductCategories;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Products::create([
            'Product_Name' => 'Book Title 1',
            'Category_ID' => 2,
            'Author_Name' => 'Billy',
            'Description' => 'book description test',
            'Price' => 9.99,
            'Book_Type' => 'Hardback',
            'Stock_Level' => 10,
            'Book_Genre' => 'Fiction'
        ]);

        Products::create([
            'Product_Name' => 'Book Title 2',
            'Category_ID' => 3,
            'Author_Name' => 'Samantha',
            'Description' => 'book description test',
            'Price' => 8.50,
            'Book_Type' => 'Paperback',
            'Stock_Level' => 7,
            'Book_Genre' => 'Romance'
        ]);

        Products::create([
            'Product_Name' => 'Book Title 3',
            'Category_ID' => 2,
            'Author_Name' => 'Billy',
            'Description' => 'book description test',
            'Price' => 10.50,
            'Book_Type' => 'Paperback',
            'Stock_Level' => 9,
            'Book_Genre' => 'True Crime'
        ]);
    }
}
