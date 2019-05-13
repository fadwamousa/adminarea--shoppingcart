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

                         

                            <tr>
                                <td><img src="" style="width: 5em"></td>
                                <td>
                                    <strong></strong><br>
                                </td>

                                <td>

                                    <form action="" method="post">

                                        <button type="submit" class="btn btn-link btn-link-dark">Remove</button>
                                    </form>

                                    <form action="" method="post">

                                        @csrf

                                        <button type="submit" class="btn btn-link btn-link-dark">Save for later</button>

                                    </form>

                                </td>



                                <td></td>
                            </tr>



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
                                <td></td>
                            </tr>
                            <tr>
                                <td>Tax</td>
                                <td></td>
                            </tr>
                            <tr>
                                <th>Total</th>
                                <th></th>
                            </tr>
                        </table>
                    </div>
                </div>
                <!-- Save for later  -->
                <div class="col-md-12">
                    <a href="/" class="btn btn-outline-dark">Continue Shopping</a>
                    <a href="/checkout" class="btn btn-outline-info">Proceed to checkout</a>
                    <hr>
                </div>
                @endif
                    <h3>There is not item in your Cart</h3>
                    <a href="/" class="btn btn-outline-dark">Continue Shopping</a>
                    <hr>





                    <div class="col-md-12">

                        <h4></h4>
                        <table class="table">

                            <tbody>



                                <tr>
                                    </td>
                                    <td>
                                        <strong></strong><br>
                                    </td>

                                    <td>

                                        <form action="" method="post">

                                            <button type="submit" class="btn btn-link btn-link-dark">Remove</button>
                                        </form>

                                        <form action="" method="post">



                                            <button type="submit" class="btn btn-link btn-link-dark">Move to cart
                                            </button>

                                        </form>

                                    </td>

                                    <td>
                                        <select name="" id="" class="form-control" style="width: 4.7em">
                                            <option value="">1</option>
                                            <option value="">2</option>
                                        </select>
                                    </td>

                                </tr>



                            </tbody>

                        </table>

                    </div>


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
