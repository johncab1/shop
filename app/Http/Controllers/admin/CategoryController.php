<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;

class CategoryController extends Controller
{
    public function index()
    {
    	$categories = Category::orderBy('id')->paginate(10);
    	return view('admin.categories.index')->with(compact('categories'));
    }


    public function create()
    {
    	return view('admin.categories.create');
    }


    public function store(Request $request)
    {

        $this->validate($request, Category::$rules, Category::$messages);

        //registrar el nuevo producto en la DB
        //dd($request->all());

        // $product = new Product();
        // $product->name = $request->input('name');
        // $product->description = $request->input('description');
        // $product->price = $request->input('price');
        // $product->long_description = $request->input('long_description');  
        // $product->save(); //insert

        Category::create($request->all());  //asignación masiva

        return redirect('/admin/categories');
    }


    public function edit(Category $category)
    {
      
        return view('admin.categories.edit')->with(compact('category')); //formulario de registro
    }


    public function update(Request $request, Category $category)
    {
    	

           $this->validate($request, Category::$rules, Category::$messages);
        
        $category->update($request->all());
        
        return redirect('/admin/categories');
    }


     public function destroy(Category $category)
    {

        $category->delete();

        return redirect('/admin/categories');
    }
}
