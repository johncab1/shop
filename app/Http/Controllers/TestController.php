<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class TestController extends Controller
{
    public function welcome()
    {
    	$products = Product::all();
    	return View('welcome')->with(compact('products'));
    }
}
