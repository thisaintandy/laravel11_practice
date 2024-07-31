<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'Product_Name',
        'Product_Qty',
        'Product_Price',
        'Product_Image',
        'Product_Description',
    ];
    
}
