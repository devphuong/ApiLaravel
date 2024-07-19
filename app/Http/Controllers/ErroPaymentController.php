<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ErroPaymentController extends Controller
{
    //
    public function paymentFailed()
    {
        return view('erro-payment');
    }
}
