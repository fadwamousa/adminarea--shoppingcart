


@if (Session::has('msg'))
    <div class="alert alert-success">
        {{ Session::get('msg') }}
        {{ Session::forget('msg') }}
    </div>
@endif
