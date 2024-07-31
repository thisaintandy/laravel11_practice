<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductInCartTable extends Migration
{
    public function up()
    {
        Schema::create('product_in_cart', function (Blueprint $table) {
            $table->id();
            $table->string('Product_Name');
            $table->integer('Product_Qty');
            $table->decimal('Product_Price', 8, 2); 
            $table->text('Product_Description')->nullable();
            $table->string('Product_Image')->nullable();
            $table->timestamps();

            // Optionally add a foreign key constraint
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('product_in_cart');
    }
}

