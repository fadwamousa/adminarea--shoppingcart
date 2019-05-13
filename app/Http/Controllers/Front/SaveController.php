<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Gloudemans\Shoppingcart\Facades\Cart;
class SaveController extends Controller
{
    //

    public function remove($id){



          Cart::instance('saveForLater')->remove($id);


          return redirect()->back()->with('msg','Item has been removed from cart');



    }




    public function move($id){


          $item = Cart::instance('saveForLater')->get($id);

          Cart::instance('saveForLater')->remove($id);

          $dubl = Cart::instance('saveForLater')->search(function ($cartItem, $rowId) use ($id) {
              return $cartItem->id === $id;
          });

          if ($dubl->isNotEmpty()) {
              return redirect()->back()->with('msg','Item is save for later');
          }

          Cart::instance('default')->add($item->id, $item->name, 1, $item->price)->associate('App\Product');

          return redirect()->back()->with('msg','Item has been Moved to cart');


    }
}
