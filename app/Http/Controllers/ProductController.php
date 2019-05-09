<?php

namespace App\Http\Controllers;

use App\Product;
use Session;
use Illuminate\Http\Request;
use App\Http\Requests\CreateProductRequest;

class ProductController extends Controller
{

    public function index()
    {
        $products = Product::paginate(10);
        return view('admin.products.index',compact('products'));
    }


    public function create()
    {
        return view('admin.products.create');
    }


    public function store(CreateProductRequest $request)
    {

       $input   = $request->all();
       if($file = $request->file('file')){

         $name_file = time(). $file->getClientOriginalName();
         $file->move('images',$name_file);
         $input['file'] = $name_file;
       }
       $product = Product::create($input);
       Session::put('msg','Product Created');
       return redirect()->back();
    }


    public function show($id)
    {

      $product = Product::find($id);
      return view('admin.products.details',compact('product'));

    }


    public function edit($id)
    {
      $product = Product::find($id);
      return view('admin.products.edit',compact('product'));
    }


    public function update(Request $request, Product $product)
    {
      $input   = $request->all();
      if($file = $request->file('file')){

        $name_file = time(). $file->getClientOriginalName();
        $file->move('images',$name_file);
        $input['file'] = $name_file;
      }
      $product->update($input);
      Session::flash('msg','Product Updated');
      return redirect('/products');
    }


    public function destroy($id)
    {
      $product = Product::find($id);
      unlink(public_path().'/images/'.$product->file);
      $product->delete();
      return back();
    }
}
