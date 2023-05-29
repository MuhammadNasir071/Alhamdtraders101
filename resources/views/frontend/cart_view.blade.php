@extends('frontend.layouts.master')
@section('frontend_body')
    <style>
        .form-group span {
            color: red;
        }
    </style>

    <main>
        <div class="hero-area section-bg2">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="slider-area">
                            <div class="slider-height2 slider-bg4 d-flex align-items-center justify-content-center">
                                <div class="hero-caption hero-caption2">
                                    <h2>Cart</h2>
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb justify-content-center">
                                            <li class="breadcrumb-item"><a href="{{ route('frontend.index') }}">Home</a></li>
                                            <li class="breadcrumb-item"><a href="#">Cart</a></li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <section class="cart_area">
            <div class="container">
                <div class="cart_inner">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Image</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Price Rs.</th>
                                    <th scope="col">Total Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="media">
                                            <div class="d-flex">
                                                <img src="{{ !is_null($product[0]['media'][0]['name']) ? url('Uploads/products/' . $product[0]['media'][0]['name']) : asset('Uploads/categories/mango_image.svg') }}"
                                                    alt="" />
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <h5>{{ $product[0]['name'] }}</h5>
                                    </td>
                                    <td>
                                        <h5>{{ $quantity }}</h5>
                                    </td>
                                    <td>
                                        <h5>{{ $quantity }} X {{ $product[0]['min_price'] }}</h5>
                                    </td>
                                    <td>
                                        <h5>{{ $quantity * $product[0]['min_price'] }}</h5>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="checkout_btn_inner" style="float:right">
                            <div class="container" style="width: 300px">
                                <div class="row mb-30">
                                    <div class="col col-2">
                                        <div style="padding:10px 0px"> Product Price: </div>
                                        <div style="padding:10px 0px"> Shipping Price: </div><hr>
                                        <div style="padding:10px 0px; font-weight:bold"> Total: </div>
                                    </div>
                                    <?php
                                        $total = ($quantity * $product[0]['min_price']) +  $product[0]['shippingType']['shipping_cost'];
                                    ?>
                                    <div class="col col-2">
                                        <div style="padding:10px 0px"> {{ $quantity * $product[0]['min_price'] }} </div>
                                        <div style="padding:10px 0px"> {{ $product[0]['shippingType']['shipping_cost'] }} </div><hr>
                                        <div style="padding:10px 0px; font-weight:bold"> {{ $total }} </div>
                                    </div>
                                </div>
                                <a class="btn checkout_btn" href="{{ route('frontend.checkout') }}">Proceed to checkout</a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>


    </main>
@endsection
