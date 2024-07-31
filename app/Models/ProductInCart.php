<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductInCart extends Model
{
    protected $table = 'product_in_cart'; // Ensure this is the correct table name

    // Define any fillable or guarded properties
    protected $fillable = [
        'cart_id',
        'Product_Name',
        'Product_Qty',
        'Product_Price',
        'Product_Description',
        'Product_Image',
    ];
}