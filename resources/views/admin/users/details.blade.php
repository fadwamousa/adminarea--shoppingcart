@extends('admin.layouts.master')
@section('title','users')
@section('page')
   user detail product
@stop
@section('content')
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Address</th>
      <th scope="col">Qty</th>
      <th scope="col">Total Price</th>
      <th scope="col">Date</th>
    </tr>
  </thead>

  <tbody>
    <tr>
      <th scope="row">
        @foreach($orders as $order)
          {{ $order->id }}
        @endforeach
      </th>
      <td>
        @foreach($orders as $order)
          {{ $order->address }}
        @endforeach

      </td>

      <td>
        @foreach ($orders as $order)
        @foreach ($order->products as $product)
           $product->pivot->qty
        @endforeach
        @endforeach

      </td>

      <td>
        @foreach ($orders as $order)
        @foreach ($order->products as $product)
           $product->pivot->price
        @endforeach
        @endforeach

      </td>
    </tr>
  </tbody>


</table>
@stop
