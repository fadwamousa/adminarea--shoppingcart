@extends('front.layouts.master')

@section('content')

    <h2 class="mt-5"><i class="fa fa-shopping-cart"></i> Shopping Cart</h2>
    <hr>

        @if(Cart::instance('default')->count() > 0)

        <h4 class="mt-5"></h4>

        <div class="cart-items">

            <div class="row">

                <div class="col-md-12">

                    @if ( session()->has('msg') )

                        <div class="alert alert-success">{{ session()->get('msg') }}</div>

                    @endif

                    @if ( session()->has('errors') )

                        <div class="alert alert-warning">{{ session()->get('errors') }}</div>

                    @endif



                    <table class="table">

                        <tbody>

                          @foreach( Cart::instance('default')->content() as $item)

                            <tr>
                                <td><img src="{{ asset('/images/'.$item->model->file) }}" style="width: 5em"></td>
                                <td>
                                    <strong>{{ $item->model->name }}</strong><br>{{ $item->model->detail }}
                                </td>

                                <td>

                                   {!!Form::open(['method'=>'DELETE','action'=>['Front\CartController@destroy',$item->rowId]])!!}

                                      <button type="submit" class="btn btn-link btn-link-dark">Remove</button>
                                  {!!Form::close()!!}

                                   {!!Form::open(['method'=>'POST','action'=>['Front\CartController@savelater',$item->rowId]])!!}

                                      @csrf

                                      <button type="submit" class="btn btn-link btn-link-dark">Save for later</button>

                                  {!!Form::close()!!}

                                </td>

                                <td>
                                    <select class="form-control quantity" style="width: 4.7em" data-id="{{ $item->rowId }}">
                                       @for ($i = 1; $i < 5 + 1; $i++)
                                        <option {{ $item->qty == $i ? 'selected' : '' }}>{{$i}}</option>
                                      @endfor

                                    </select>
                                </td>

                                <td>${{ $item->total()}}</td>
                            </tr>
                        @endforeach
                        </tbody>

                    </table>

                </div>
                <!-- Price Details -->
                <div class="col-md-6">
                    <div class="sub-total">
                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th colspan="2">Price Details</th>
                            </tr>
                            </thead>
                            <tr>
                                <td>Subtotal</td>
                                <td>${{ Cart::subTotal() }}</td>
                            </tr>
                            <tr>
                                <td>Tax</td>
                                <td>${{ Cart::tax() }}</td>
                            </tr>
                            <tr>
                                <th>Total</th>
                                <th>${{ Cart::total() }}</th>
                            </tr>
                        </table>
                    </div>
                </div>
                <!-- Save for later  -->
                <div class="col-md-12">
                    <a href="{{ url('/') }}" class="btn btn-outline-dark">Continue Shopping</a>
                    <a href="{{ url('/checkout') }}" class="btn btn-outline-info">Proceed to checkout</a>
                    <hr>
                </div>

                @else
                <h4>There is no items in cart</h4>
                <a href="/" class="btn btn-outline-dark">Continue Shopping</a>
                <hr>
                @endif

                @if(Cart::instance('saveForLater')->count() > 0)

                    <div class="col-md-12">

                        <h4>{{ Cart::instance('saveForLater')->count() }} Items in  Save For Later</h4>
                        <table class="table">
                          <tbody>
                          @foreach( Cart::instance('saveForLater')->content() as $item)

                            <tr>
                                <td><img src="{{ asset('/images/'.$item->model->file) }}" style="width: 5em"></td>
                                <td>
                                    <strong>{{ $item->model->name }}</strong><br>{{ $item->model->detail }}
                                </td>

                                <td>

                                   {!!Form::open(['method'=>'DELETE','action'=>['Front\CartController@destroy',$item->rowId]])!!}

                                      <button type="submit" class="btn btn-link btn-link-dark">Remove</button>
                                  {!!Form::close()!!}

                                   {!!Form::open(['method'=>'POST','action'=>['Front\CartController@savelater',$item->rowId]])!!}

                                      @csrf

                                      <button type="submit" class="btn btn-link btn-link-dark">Save for later</button>

                                  {!!Form::close()!!}

                                </td>

                                <td>
                                    <select class="form-control quantity" style="width: 4.7em" data-id="{{ $item->rowId }}">
                                       @for ($i = 1; $i < 5 + 1; $i++)
                                        <option {{ $item->qty == $i ? 'selected' : '' }}>{{$i}}</option>
                                      @endfor

                                    </select>
                                </td>

                                <td>${{ $item->total()}}</td>
                            </tr>
                        @endforeach
                        </tbody>

                        </table>

                        </div>
                        <!-- Price Details -->
                        <div class="col-md-6">
                        <div class="sub-total">
                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th colspan="2">Price Details</th>
                            </tr>
                            </thead>
                            <tr>
                                <td>Subtotal</td>
                                <td>${{ Cart::subTotal() }}</td>
                            </tr>
                            <tr>
                                <td>Tax</td>
                                <td>${{ Cart::tax() }}</td>
                            </tr>
                            <tr>
                                <th>Total</th>
                                <th>${{ Cart::total() }}</th>
                            </tr>
                        </table>
                        </div>
                        </div>

                    </div>

               @endif
            </div>

        </div>



    <script src="{{ asset('js/app.js') }}"></script>
    <script>

        const className = document.querySelectorAll('.quantity');

        Array.from(className).forEach(function (el) {
            el.addEventListener('change', function () {
                const id = el.getAttribute('data-id');
                axios.patch(`/cart/update/${id}`, {
                    quantity: this.value
                })
                    .then(function (response) {
//                        console.log(response);
                          location.reload();
                    })

                    .catch(function (error) {
                        console.log(error);
                        location.reload();
                    });
            });
        });


    </script>
@endsection
