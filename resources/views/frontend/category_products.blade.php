@extends('frontend.layouts.master')
@section('frontend_body')

<main>

    <div class="hero-area section-bg2">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="slider-area">
                        <div class="slider-height2 slider-bg4 d-flex align-items-center justify-content-center">
                            <div class="hero-caption hero-caption2">
                                <h2>Products</h2>
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb justify-content-center">
                                        <li class="breadcrumb-item"><a href="{{route('frontend.index')}}">Home</a></li>
                                        <li class="breadcrumb-item"><a href="#">Products</a></li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <section class="latest-items section-padding fix">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-xl-12">
                    <div class="nav-button">
                        <nav>
                            <div class="nav-tittle">
                                <h4>{{isset($category['name']) ? $category['name'] : 'Products'}}</h4>
                            </div>
                        </nav>

                    </div>
                </div>
            </div>
        </div>

        <div class="listing-area pt-30 pb-30">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12">
                        <div class="latest-items latest-items2">
                            <div class="row">
                                @if ($products && count($products) > 0)
                                    @foreach ($products as $product)
                                        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6">
                                            <div class="properties pb-30">
                                                <div class="properties-card">
                                                    <div class="properties-img">
                                                        <a href="{{route('frontend.single.product', $product->id)}}"><img src="{{!is_null($product['media'][0]['name']) ? url('Uploads/products/'.$product['media'][0]['name']) : asset('Uploads/categories/mango_image.svg')}} " style="min-height:270px" alt="" /></a>
                                                        <div class="socal_icon">
                                                            <a href="{{route('frontend.single.product', $product->id)}}">Shop Now</a>
                                                        </div>
                                                    </div>
                                                    <div class="properties-caption properties-caption2">
                                                        <h3><a href="{{route('frontend.single.product', $product->id)}}">{{$product->name}}</a></h3>
                                                        <div class="properties-footer">
                                                            <div class="price">
                                                                <span>Price: Rs. {{$product->min_price}}</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    <div class="col-xl-12">
                                        <div>
                                            <div class="properties-img">
                                                <img src="{{asset('frontend/assets/img/no_product.png')}}">
                                            </div>
                                            <div class="mt-30">
                                                <strong>"Oops! We couldn't find any products matching your selected criteria.</strong>
                                            </div>
                                        </div>
                                    </div>
                                @endif


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>

    <div class="categories-area">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="section-tittle text-center mb-40">
                        <h4>Payment Services</h4>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="single-cat mb-50 wow fadeInUp text-center" data-wow-duration="1s" data-wow-delay=".2s">
                        <div class="cat-icon">
                            <img src="{{asset('frontend/assets/img/icon/services1.svg')}}" alt="">
                        </div>
                        <div class="cat-cap">
                            <h5>Fast & Free Delivery</h5>
                            <p>Free delivery on all orders</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="single-cat mb-50 wow fadeInUp text-center" data-wow-duration="1s" data-wow-delay=".2s">
                        <div class="cat-icon">
                            <img src="{{asset('frontend/assets/img/icon/services2.svg')}}" alt="">
                        </div>
                        <div class="cat-cap">
                            <h5>Secure Payment</h5>
                            <p>Free delivery on all orders</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="single-cat mb-50 wow fadeInUp text-center" data-wow-duration="1s" data-wow-delay=".4s">
                        <div class="cat-icon">
                            <img src="{{asset('frontend/assets/img/icon/services3.svg')}}" alt="">
                        </div>
                        <div class="cat-cap">
                            <h5>Money Back Guarantee</h5>
                            <p>Free delivery on all orders</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="single-cat mb-50 wow fadeInUp text-center" data-wow-duration="1s" data-wow-delay=".5s">
                        <div class="cat-icon">
                            <img src="{{asset('frontend/assets/img/icon/services4.svg')}}" alt="">
                        </div>
                        <div class="cat-cap">
                            <h5>Online Support</h5>
                            <p>Free delivery on all orders</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</main>

@endsection
