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
      <th scope="col">Image</th>
      <th scope="col">Name</th>
      <th scope="col">Price</th>
      <th scope="col">Detail</th>
      <th scope="col">Action</th>
    </tr>
  </thead>

  <tbody>
    <tr>
      <th scope="row"><a href="{{ url('products/'.$product->id) }}">{{ $product->id }}</a></th>
      <td> <img width="50" src="{{ asset('/images/'.$product->file ) }}"> </td>
      <td><a href="{{ url('products/'.$product->id.'/edit') }}">{{ $product->name }}</a></td>
      <td>{{ $product->price }}</td>
      <td>{{ $product->detail }}</td>
      <td>
        {!!Form::open(['method'=>'DELETE','action'=>['ProductController@destroy',$product->id]])!!}
           {{ Form::submit('delete',['class'=>'btn btn-danger']) }}
        {!!Form::close()!!}
      </td>
    </tr>
  </tbody>

</table>
@stop
