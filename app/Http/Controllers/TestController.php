<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class TestController extends Controller
{
    public function welcome()
    {
    	$categories = Category::has('products')->get();
    	return View('welcome')->with(compact('categories'));
    }
}
