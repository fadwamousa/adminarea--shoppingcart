@extends('admin.layouts.master')
@section('title','Products')
@section('page')
   Product -- {{ $product->name }}
@stop
@section('content')
<div class="col-sm-3">

  <img class="img-rounded" width="250" src="{{ asset($product->file) }}" alt="">

</div>

<div class="col-sm-9">

  

</div>
@stop
