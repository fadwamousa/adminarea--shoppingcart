@extends('admin.layouts.master')
@section('title','Orders')
@section('page')
The Order is 
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
      <th scope="col">Created-at</th>
    </tr>
  </thead>

  <tbody>
    <tr>
      <th scope="row">{{ $product->id }}</th>
      <td> <img width="150" class="img-responsive" src="{{ asset('/images/'.$product->file ) }}"> </td>
      <td>{{ $product->name }}</td>
      <td>{{ $product->price }}</td>
      <td>{{ $product->detail }}</td>
      <td>{{ $product->created_at->diffForHumans() }}</td>
    </tr>
  </tbody>

</table>
@stop
