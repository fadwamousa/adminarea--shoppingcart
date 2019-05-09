@extends('admin.layouts.master')
@section('title','Orders')
@section('page')
   Order
@stop
@section('content')
<h2>Order Details</h2>
<div class="table-responsive">
    <table class="table table-striped table-sm">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">userName</th>
      <th scope="col">Address</th>
      <th scope="col">Product</th>
      <th scope="col">Quantity</th>
      <th scope="col">Price</th>
      <th scope="col">status</th>

    </tr>
  </thead>

  <tbody>
    <tr>
      <th scope="row">{{ $order->id }}</th>
      <td>{{ $order->user->name }}</td>
      <td>{{ $order->address }}</td>
      <td>
        @foreach($order->products as $product)
        {{ $product->name }}
        @endforeach
      </td>
      <td>
        @foreach($order->products as $product)
        {{ $product->pivot->qty }}
        @endforeach
      </td>
      <td>
        @foreach($order->products as $product)
        {{ $product->pivot->price }}
        @endforeach
      </td>
      <td>{{ $order->status == 1 ? 'Complete' : 'Pending' }}</td>
    </tr>
  </tbody>

</table>
<h2>User Details</h2>


  <div class="table-responsive">
          <table class="table table-striped table-sm">
            <thead>
              <tr>
                <th>#</th>

                <th>Name</th>
                <th>Email</th>
                <th>Date</th>
              </tr>
            </thead>

            <tbody>
              <tr>

                <td>{{ $order->user->id }}</td>
                <td>{{ $order->user->name }}</td>
                <td>{{ $order->user->email }}</td>
                <td>{{ $order->user->created_at->diffForHumans()}}</td>

              </tr>
            </tbody>
          </table>
        </div>

<h2>Product Details</h2>

  <div class="table-responsive">
          <table class="table table-striped table-sm">
            <thead>
              <tr>
                <th>#</th>
                <th>Name</th>
                <th>detail</th>
                <th>price</th>
              </tr>
            </thead>

            <tbody>
              <tr>

                <td>
                   @foreach($order->products as $product)
                     {{ $product->id }}-
                   @endforeach
                </td>

                <td>
                   @foreach($order->products as $product)
                     {{ $product->name }}-
                   @endforeach
                </td>

                <td>
                   @foreach($order->products as $product)
                     {{ $product->detail }}-
                   @endforeach
                </td>

                <td>
                   @foreach($order->products as $product)
                     {{ $product->price }}
                   @endforeach
                </td>



              </tr>
            </tbody>
          </table>
        </div>


@stop
