@extends('admin.layouts.master')
@section('title','Orders')
@section('page')
   All Orders
@stop
@section('content')


<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">userName</th>
      <th scope="col">Address</th>
      <th scope="col">Product</th>
      <th scope="col">Quantity</th>
      <th scope="col">Price</th>
      <th scope="col">status</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
@if(count($orders) > 0)
@foreach($orders as $order)
  <tbody>
    <tr>
      <th scope="row"><a href="{{ url('orders/'.$order->id) }}">{{ $order->id }}</a></th>
      <td>{{ $order->user->name }}</td>
      <td>{{ $order->address }}</td>
      <td>
        @foreach($order->products as $product)
        {{ $product->name }} &
        @endforeach
      </td>
      <td>
        @foreach($order->products as $product)
        {{ $product->pivot->qty }} &
        @endforeach
      </td>
      <td>
        @foreach($order->products as $product)
        {{ $product->pivot->price }} &
        @endforeach
      </td>
      <td>
        {!!Form::open(['method'=>'PATCH','action'=>['OrderController@update',$order->id]])!!}
        @if($order->status == 0)

          <div class="form-group">

            <input type="hidden" name="status" value="1">
            <input type="submit" value="confirm" class="btn btn-success">

          </div>
        @else

        <div class="form-group">

          <input type="hidden" name="status" value="0">
          <input type="submit" value="pending" class="btn btn-default">

        </div>

        @endif

        {!!Form::close()!!}
         <!--{{$order->status == 0 ? 'Pending' : 'Complete' }}-->
      </td>
      <td>
        {!!Form::open(['method'=>'DELETE','action'=>['OrderController@destroy',$order->id]])!!}
        {{ Form::submit('delete',['class'=>'btn btn-danger']) }}
        {!!Form::close()!!}
      </td>
    </tr>
  </tbody>
@endforeach
@endif
</table>
@stop
