<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VendorProductController extends Controller
{
    public function index(){
        return view('products.index');
    }

    public function all(Request $request)
    {
        
    }
}