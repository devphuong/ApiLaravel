<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'category',
        'product_name',
        'detailed_description',
        'short_description', 
        'price', 
        'promotional_price',
        'imgproduct',
        'album',
        'pdf_file',
        'quantity'
    ];
}
