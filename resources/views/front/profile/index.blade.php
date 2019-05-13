@extends('front.layouts.master')
@section('content')

<h2>Profile</h2>
<hr>
<th>User Details</th> <a href="#"><i class="fa fa-cogs"> Edit User </i> </a>
<table class="table table-bordered">
  <tr>
     <th scope="col">ID</th>
     <td>{{ $user->id }}</td>
  </tr>

  <tr>
     <th scope="col">Name</th>
     <td>{{ $user->name }}</td>
  </tr>

  <tr>
     <th scope="col">Email</th>
     <td>{{ $user->email }}</td>
  </tr>

  <tr>
     <th scope="col">Registered</th>
     <td>{{ $user->created_at->diffForHumans() }}</td>
  </tr>

</table>

<h4>Orders</h4>
<table class="table table-striped">
  <tr>
     <th scope="col">ID</th>
     <th scope="col">User</th>
     <th scope="col">product</th>
     <th scope="col">Qty</th>
     <th scope="col">status</th>
     <th scope="col">Action</th>
  </tr>

  <tr>

      @foreach($user->orders as $order)
      <td>{{ $order->id }}</td>
      <td>{{ $order->user->name }}</td>
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
      @endforeach
      <td>
        @foreach($user->orders as $order)
        @if($order->status == 1)
        <span class="label label-success">confirmed</span>
        @else
        <span class="label label-warning">pending</span>
        @endif
        @endforeach
      </td>

      <td>
        <a href="{{ url('/user/order/'.$order->id) }}" class="btn btn-default">Details</a>
      </td>

  </tr>


</table>
@endsection
