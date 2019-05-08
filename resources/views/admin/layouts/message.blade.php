
@if(count($errors) > 0)
@foreach($errors->all() as $error)
<div class="alert alert-danger">

  {{ $error }}

</div>
@endforeach
@endif


@if (Session::has('msg'))
    <div class="alert alert-success">
        {{ Session::get('msg') }}
        {{ Session::forget('msg') }}
    </div>
@endif
