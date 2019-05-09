<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\User;
use App\Order;
class DashboardController extends Controller
{
    public function index(){
      $product = new Product();
      $user    = new User();
      $order   = new Order();
      return view('admin.dashboard',compact('user','order','product'));
    }
}
