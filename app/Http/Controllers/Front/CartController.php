<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Gloudemans\Shoppingcart\Facades\Cart;
class CartController extends Controller
{
    public function index(){
      return view('front.cart.index');
    }

    public function store(Request $request){

      Cart::add($request->id,$request->name,1,$request->price)->associate('App\Product');
      //<strong>{{ $item->model->name }}</strong><br> model refer to App\Product
      return back()->with('msg','Item has been added to cart');


    }

    public function destroy($id){
      Cart::remove($id);
      return back()->with('msg','Item has been Remove From Cart');
    }

    public function savelater($id){


       $item = Cart::get($id);
       cart::remove($id);
       Cart::instance('saveForLater')->add($item->id , $item->name , 1 , $item->price )->associate('App\Product');
       return back()->with('msg','Item has been Saved For Later');

    }
}
