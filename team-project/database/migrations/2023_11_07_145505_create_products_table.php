<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('Category_ID'); 
            $table->string('Product_Name', 255); 
            $table->text('Description')->nullable(); 
            $table->decimal('Price', 10, 2); // Price as DECIMAL(10, 2)
            $table->integer('Stock_Level');
            $table->string('Author_Name', 255);
            $table->string('Book_Type', 255);
            

            $table->foreign('Category_ID')->references('Category_ID')->on('productcategories');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
