<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Products;
use Illuminate\Database\Seeder;

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
            'Author_Name' => 'Billy',
            'Description' => 'book description test',
            'Price' => 9.99,
            'Book_Type' => 'Hardback',
            'Stock_Level' => 10
        ]);

        Products::create([
            'Product_Name' => 'Book Title 2',
            'Author_Name' => 'Samantha',
            'Description' => 'book description test',
            'Price' => 8.50,
            'Book_Type' => 'Paperback',
            'Stock_Level' => 7
        ]);

        Products::create([
            'Product_Name' => 'Book Title 3',
            'Author_Name' => 'Billy',
            'Description' => 'book description test',
            'Price' => 10.50,
            'Book_Type' => 'Paperback',
            'Stock_Level' => 9
        ]);
    }
}
