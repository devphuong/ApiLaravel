<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductManagementController extends Controller
{
    
    //
    public function index()
    {
        return view('product-management');
    }
}
