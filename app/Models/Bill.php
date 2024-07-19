<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Bill extends Model
{
    use HasFactory;

    protected $fillable = [
        'category',
        'product_name',
        'short_description',
        'price',
        'promotional_price',
        'pdf_file',
        'quantity_bill',
        'totalAmount',
        'full_name',
        'email',
        'phone_number',
        'address',
        'signature',
        'resultCode'
    ];
}
//php artisan make:model Bill -m
