<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Product;
use App\ProductImage;
use File;
use App\Http\Controllers\Controller;

class ImageController extends Controller
{
    public function index($id)
    {
    	$product = Product::find($id);
    	$images = $product->images()->orderBy('featured', 'desc')->get();
    	return view('admin.products.images.index')->with(compact('product', 'images'));
    }


    public function store(Request $request, $id)
    {
    	$file = $request->file('photo');
    	$path = public_path().'/images/products';
    	$fileName = uniqid().$file->getClientOriginalName();
    	$moved = $file->move($path, $fileName);

    	if($moved)
    	{
	    	$productImage = new ProductImage();
	    	$productImage->image = $fileName;
	    	//$porductImage->featured = false;
	    	$productImage->product_id = $id;
	    	$productImage->save();
    	}

    	return back();

    }

    public function destroy(Request $request, $id)
    {
    	$productImage = ProductImage::find($request->input('image_id'));

    	if(substr($productImage->image, 0,4) === "http")
    	{	
    		$deleted = true;
    	}

    	else
    	{
    		$fullPath = public_path().'/images/products/' . $productImage->image;
    		$deleted = File::delete($fullPath);
    	}

    	if ($deleted)
    	{
    		$productImage->delete();
    	}

    	return back();
    }


    public function select($id, $image)

    {   

        //desmarcando la anterior
        ProductImage::where('product_id', $id)->update([
            'featured' => false
        ]);


        //marcando imagen seleccionada
        $productImage = ProductImage::find($image);
        $productImage->featured = true;
        $productImage->save();


        return back();
    }
}
