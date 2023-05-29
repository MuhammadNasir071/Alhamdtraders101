@extends('frontend.layouts.master')
@section('frontend_body')

<style>
    .form-group span{
        color:red;
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
                                <h2>Checkout</h2>
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb justify-content-center">
                                        <li class="breadcrumb-item"><a href="{{route('frontend.index')}}">Home</a></li>
                                        <li class="breadcrumb-item"><a href="{{route('frontend.checkout')}}">Checkout</a></li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if (session('message'))
        <div class="alert alert-danger" style="background-color:rgb(250, 23, 6);">
            <center><strong style="color:white">{{ session('message') }}</strong></center>
        </div>
    @endif
    <section class="pt-30">
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
                </div>
            </div>
        </div>
    </section>

    <section class="contact-section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h5 style="color: red; font-weight: 900; font-size: 17px;">Address Info</h5>
                </div>
                <div class="col-lg-8">
                    <form class="" id="checkout_form_front" action="{{route('frontend.place.order')}}" method="POST">
                       @csrf
                       <div class="row">
                            <input type="hidden" name="product_id" value="{{ $product[0]['id'] }}">
                            <input type="hidden" name="total_price" value="{{ $quantity * $product[0]['min_price'] }}">
                            <h6 style="margin:20px 0px 10px 0px">Contact Info</h6>
                            <div class="col-12">
                                <div class="form-group">
                                    <input class="form-control" name="email" id="email" type="email" placeholder="Email address" style="border:1px solid red">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <span>{{ $message }}</span>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <h6 style="margin:20px 0px 10px 0px">Shipping address</h6>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input class="form-control" name="name" id="name" type="text" placeholder='Full Name' style="border:1px solid red">
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <span>{{ $message }}</span>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input class="form-control" name="contact" id="contact" type="number" placeholder="Phone" style="border:1px solid red">
                                    @error('contact')
                                        <span class="invalid-feedback" role="alert">
                                            <span>{{ $message }}</span>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input class="form-control" name="country" id="country" type="text" placeholder="Country" style="border:1px solid red">
                                    @error('country')
                                        <span class="invalid-feedback" role="alert">
                                            <span>{{ $message }}</span>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input class="form-control" name="state" id="state" type="text" placeholder="State" style="border:1px solid red">
                                    @error('state')
                                        <span class="invalid-feedback" role="alert">
                                            <span>{{ $message }}</span>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input class="form-control" name="city" id="city" type="text" placeholder="City" style="border:1px solid red">
                                    @error('city')
                                        <span class="invalid-feedback" role="alert">
                                            <span>{{ $message }}</span>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input class="form-control" name="appartment" id="appartment" type="text" placeholder="Appartment, suite, etc. (optional)" style="border:1px solid red">
                                    @error('appartment')
                                        <span class="invalid-feedback" role="alert">
                                            <span>{{ $message }}</span>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input class="form-control" name="postal_code" id="postal_code" type="text" placeholder="Postal Code" style="border:1px solid red">
                                    @error('postal_code')
                                        <span class="invalid-feedback" role="alert">
                                            <span>{{ $message }}</span>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <textarea class="form-control w-100" name="address" id="address" cols="30" rows="4" placeholder='Please enter complete/correct address ' style="border:1px solid red"></textarea>
                                    @error('address')
                                        <span class="invalid-feedback" role="alert">
                                            <span>{{ $message }}</span>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group mt-3">
                            <button type="submit" id="checkout_btn" class="btn btn-outline-info">Place Order</button>
                        </div>
                    </form>
                </div>
                <div class="col-lg-3 offset-lg-1">
                    <div class="media contact-info">
                        <span class="contact-info__icon"><i class="ti-home"></i></span>
                        <div class="media-body">
                            <h3>Muzaffargarh, Pakistan.</h3>
                            <p>Postal code: 34200</p>
                        </div>
                    </div>
                    <div class="media contact-info">
                        <span class="contact-info__icon"><i class="ti-email"></i></span>
                        <div class="media-body">
                            <h3><a href="mailto:alhamdtraders101@gmail.com" target="_blank">alhamdtraders101@gmail.com</a></h3>
                            <p>Send us your query anytime!</p>
                        </div>
                    </div><hr>
                    <div class="" style="margin:20px 0px 10px 0px">
                        <h6 style="color:red">Cash on delivery</h6>
                        <p>For more Details, please contact the number below.</p>
                    </div>
                    <div class="media contact-info" style="margin:20px 0px 10px 0px">
                        <span class="contact-info__icon"><i class="ti-tablet"></i></span>
                        <div class="media-body">
                            <h3> <a href="tel:+923146318768">+92 314 6318768</a></h3>
                            <h3> <a href="tel:+923044386362">+92 304 4386362</a></h3>
                            <p>24/7 Available</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

@endsection
