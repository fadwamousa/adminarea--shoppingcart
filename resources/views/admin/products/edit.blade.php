@extends('admin.layouts.master')
@section('title','Products')
@section('page')
   Product -- {{ $product->name }}
@stop
@section('content')
<div class="col-sm-3">

  <img class="img-rounded" width="250" src="{{ asset('images/'.$product->file) }}">

</div>

<div class="col-sm-9">

  {!!Form::open(['method'=>'PATCH','action'=>['ProductController@update',$product->id],'files'=>true])!!}

        <div class="form-label-group">
          <label for="inputEmail">Name Product</label>
          {{ Form::text('name',$product->name,['class'=>'form-control','placeholder'=>'Name Product']) }}
          <span class="text-danger">{{ $errors->has('name') ? $errors->first('name') : ''  }}</span>
        </div>

        <div class="form-label-group">
          <label for="inputPassword">Price</label>
          {{ Form::text('price',$product->price,['class'=>'form-control','placeholder'=>'$ 2500','id'=>'inputPassword']) }}
          <span class="text-danger">{{ $errors->has('price') ? $errors->first('price') : ''  }}</span>
        </div>

        <div class="form-label-group">
          <label for="inputPassword">Detail Of Price</label>
          {{ Form::textarea('detail',$product->detail,['class'=>'form-control','cols'=>8,'rows'=>8]) }}
          <span class="text-danger">{{ $errors->has('detail') ? $errors->first('detail') : ''  }}</span>
        </div>

        <div class="custom-control custom-checkbox mb-3">
          <input type="file" name="file" class="form-control" id="image">
          <div id="thumb-output"></div>
        </div>
        <button class="btn  btn-success btn-block text-uppercase" type="submit">Update product</button>

  {!!Form::close()!!}







</div>
@stop
