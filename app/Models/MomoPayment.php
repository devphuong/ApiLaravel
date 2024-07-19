<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MomoPayment extends Model
{
    use HasFactory;

    protected $fillable = [
        'amount',
        'orderType',
        'redirectUrl',
        'transId',
        'resultCode',
        'payType',
        'signature'
    ];
}
//php artisan make:model MomoPayment 
