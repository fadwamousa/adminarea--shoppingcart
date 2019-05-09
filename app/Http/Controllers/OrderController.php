<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;
use Session;
class OrderController extends Controller
{

    public function index()
    {
        $orders = Order::all();
        return view('admin.orders.index',compact('orders'));
    }


    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
          $order = Order::find($id);

          return view('admin.orders.details',compact('order'));

    }


    public function edit(Order $order)
    {
        //
    }


    public function update(Request $request,$id)
    {
        $order = Order::find($id);
        $order->status = $request->status;
        $order->save();

        return back();
    }

    public function destroy($id)
    {

      $order = Order::find($id);
      $order->delete();
      Session::flash('msg','Order deleted');
      return back();

    }
}
