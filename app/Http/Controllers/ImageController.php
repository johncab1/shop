<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\ProductImage;

class ImageController extends Controller
{
    public function index($id)
    {
    	$product = Product::find($id);
    	$images = $product->images;
    	return view('admin.products.images.index')->with(compact('product', 'images'));
    }


    public function store(Request $request, $id)
    {
    	$file = $request->file('photo');
    	$path = public_path().'/images/products';
    	$fileName = uniqid().$file->getClientOriginalName();
    	$file->move($path, $fileName);

    	$productImage = new ProductImage();
    	$productImage->image = $fileName;
    	//$porductImage->featured = false;
    	$productImage->product_id = $id;
    	$productImage->save();

    	return back();

    }

    public function destroy()
    {

    }
}
