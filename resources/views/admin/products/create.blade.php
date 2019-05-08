@extends('admin.layouts.master')
@section('title','Form')
@section('page')
   Add Product
@stop
@section('content')
@include('admin.layouts.message')
{!!Form::open(['method'=>'POST','action'=>'ProductController@store','files'=>true])!!}

      <div class="form-label-group">
        <label for="inputEmail">Name Product</label>
        <input type="text" name="name" id="inputEmail" class="form-control" placeholder="Name Product"  autofocus>

      </div>

      <div class="form-label-group">
        <label for="inputPassword">Price</label>
        <input type="text" name="price" id="inputPassword" class="form-control" placeholder="$ 2500" >

      </div>

      <div class="form-label-group">
        <label for="inputPassword">Detail Of Price</label>
        <textarea name="detail" rows="8" cols="80" class="form-control"></textarea>

      </div>

      <div class="custom-control custom-checkbox mb-3">
        <input type="file" name="file" class="form-control">
      </div>
      <button class="btn  btn-primary btn-block text-uppercase" type="submit">Create product</button>

{!!Form::close()!!}
@endsection
