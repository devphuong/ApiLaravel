<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'category',
        'product_name',
        'short_description',
        'price',
        'promotional_price',
        'totalAmount',
        'pdf_file',
        'quantity_bill',
        'success',
        'unsuccessful',
        'approving',
        'full_name',
        'email',
        'phone_number',
        'address',
        'signature',
        'resultCode'
    ];
}
//php artisan make:model Cart -m