<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{
    public function index()
    {
    	$products = Product::paginate(10);
    	return view('admin.products.index')->with(compact('products')); //listado de productos
    }

    public function create() //ver formulario de registro
    {
    	return view('admin.products.create');
    }

    public function store(Request $request) // registrar el nuevo producto en la bd
    {
        //registrar el nuevo producto en la DB
        //dd($request->all());

        $product = new Product();
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->long_description = $request->input('long_description');  
        $product->save(); //insert

        return redirect('/admin/products');

    }


    public function edit($id)
    {
        $product = Product::find($id);        
        return view('admin.products.edit')->with(compact('product')); //formulario de registro
    }

    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->long_description = $request->input('long_description');  
        $product->save(); //insert
        
        return redirect('/admin/products');
    }
}
