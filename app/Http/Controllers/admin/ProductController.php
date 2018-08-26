<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Product;
use App\ProductImage;
use App\Http\Controllers\Controller;
use App\Category;

class ProductController extends Controller
{
    public function index()
    {
    	$products = Product::paginate(10);
    	return view('admin.products.index')->with(compact('products')); //listado de productos
    }

    public function create() //ver formulario de registro
    {
        $categories = Category::orderBy('name')->get();
    	return view('admin.products.create')->with(compact('categories'));
    }

    public function store(Request $request) // registrar el nuevo producto en la bd
    {
        //validaciones

        $messages = [
            'name.required' => 'Debe ingresar un nombre para el producto.',
            'name.min' => 'El nombre del producto debe tener al menos 3 caracteres.',

            'description.required' => 'debe ingresar una descripcion para el producto',
            'description.max' => 'El maximo de la descripcion debe ser de 200 caracteres.',

            'price.required' => 'debe ingresar un precio para el producto.'

        ];

        $rules = [
            'name' => 'required|min:3',
            'description' => 'required|max:200',
            'price' => 'required|numeric|min:0'
        ];
        $this->validate($request, $rules, $messages);

        //registrar el nuevo producto en la DB
        //dd($request->all());

        $product = new Product();
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->long_description = $request->input('long_description');
        $product->category_id = $request->category_id;
        $product->save(); //insert

        return redirect('/admin/products');

    }


    public function edit($id)
    {
        $product = Product::find($id);
        $categories = Category::orderBy('name')->get();      
        return view('admin.products.edit')->with(compact('product', 'categories')); //formulario de registro
    }

    public function update(Request $request, $id)
    {

        $messages = [
            'name.required' => 'Debe ingresar un nombre para el producto.',
            'name.min' => 'El nombre del producto debe tener al menos 3 caracteres.',

            'description.required' => 'debe ingresar una descripcion para el producto',
            'description.max' => 'El maximo de la descripcion debe ser de 200 caracteres.',

            'price.required' => 'debe ingresar un precio para el producto.'

        ];

        $rules = [
            'name' => 'required|min:3',
            'description' => 'required|max:200',
            'price' => 'required|numeric|min:0'
        ];
        $this->validate($request, $rules, $messages);
        
        $product = Product::find($id);
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->long_description = $request->input('long_description');
         $product->category_id = $request->category_id;
        $product->save(); //insert
        
        return redirect('/admin/products');
    }


    public function destroy($id)
    {
         ProductImage::where('product_id', $id)->delete();
        $product = Product::find($id);
        $product->delete();
        return redirect('/admin/products');
    }
}
