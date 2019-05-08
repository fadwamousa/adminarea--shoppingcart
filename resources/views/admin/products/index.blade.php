@extends('admin.layouts.master')
@section('title','Products')
@section('page')
   All Product
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
    </tr>
  </thead>
  @if(count($products) > 0)
  @foreach($products as $product)
  <tbody>
    <tr>
      <th scope="row">{{ $product->id }}</th>
      <td> <img width="50" src="images/{{ $product->file ? $product->file : '' }}"> </td>
      <td>{{ $product->name }}</td>
      <td>{{ $product->price }}</td>
      <td>{{ $product->detail }}</td>
    </tr>
  </tbody>
 @endforeach
 @endif
 {{ $products->render() }}
</table>
@stop
