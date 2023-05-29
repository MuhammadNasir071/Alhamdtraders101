@extends('frontend.layouts.master')
@section('frontend_body')

<main>

    <section class="slider-area ">
        <div class="slider-active">

            <div class="single-slider slider-bg1 slider-height d-flex align-items-center">
            </div>

            <div class="single-slider slider-bg2 slider-height d-flex align-items-center">
            </div>
        </div>
    </section>


    <div class="latest-items section-padding fix">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-xl-12">
                    <div class="nav-button">
                        <nav>
                            <div class="nav-tittle">
                                <h4>Categories</h4>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-one" role="tabpanel" aria-labelledby="nav-one-tab">

                    <div class="latest-items-active">
                        @if (isset($categories) && count($categories) > 0 )
                            @foreach ($categories as $category)
                                <div class="properties pb-30">
                                    <div class="properties-card">
                                        <div class="properties-img">
                                            <a href="{{route('frontend.getProducts', $category->id)}}"><img src="{{!is_null($category->image) ? url('Uploads/categories/'. $category->image) : ''}}" alt=""></a>
                                            <div class="socal_icon">
                                                <a href="{{route('frontend.getProducts', $category->id)}}">Explore More</a>
                                            </div>
                                        </div>
                                        <div class="properties-caption properties-caption2">
                                            <h3><a href="{{route('frontend.getProducts', $category->id)}}">{{$category->name}}</a></h3>
                                            <div class="properties-footer">
                                                {{-- <div class="price">
                                                    <span>$98.00 <span>$120.00</span></span>
                                                </div> --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>


    <section class="latest-items section-padding fix">
        <div class="row">
            <div class="col-xl-12">
                <div class="section-tittle text-center mb-40">
                    <h4>Popular Products</h4>
                </div>
            </div>
        </div>
        <div class="listing-area pt-30">
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
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    {{-- <section class="home-blog">
        <div class="container">
            <div class="row justify-content-center">
                <div class="cl-xl-7 col-lg-8 col-md-10">

                    <div class="section-tittle text-center mb-40">
                        <h4>Latest News</h4>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="single-blogs mb-30">
                        <div class="blog-img">
                            <a href="pro-details.html"><img data-cfsrc="assets/img/gallery/blog1.jpg" alt="" style="display:none;visibility:hidden;"><noscript><img src="assets/img/gallery/blog1.jpg" alt=""></noscript></a>
                        </div>
                        <div class="blogs-cap">
                            <span>Fashion Tips</span>
                            <h5><a href="pro-details.html">What Curling Irons Are The Best Ones</a></h5>
                            <p>Consectetur adipisicing elit. Laborum fuga incidunt laboriosam voluptas iure, delectus..</p>
                            <a href="pro-details.html" class="red-btn">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="single-blogs mb-30">
                        <div class="blog-img">
                            <a href="pro-details.html"><img data-cfsrc="assets/img/gallery/blog2.jpg" alt="" style="display:none;visibility:hidden;"><noscript><img src="assets/img/gallery/blog2.jpg" alt=""></noscript></a>
                        </div>
                        <div class="blogs-cap">
                            <span>Fashion Tips</span>
                            <h5><a href="pro-details.html">Vogue's Ultimate Guide To Autumn/Winter 2019 Shoes</a></h5>
                            <p>Consectetur adipisicing elit. Laborum fuga incidunt laboriosam voluptas iure, delectus..</p>
                            <a href="pro-details.html" class="red-btn">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="single-blogs mb-30">
                        <div class="blog-img">
                            <a href="pro-details.html"><img data-cfsrc="assets/img/gallery/blog3.jpg" alt="" style="display:none;visibility:hidden;"><noscript><img src="assets/img/gallery/blog3.jpg" alt=""></noscript></a>
                        </div>
                        <div class="blogs-cap">
                            <span>Fashion Tips</span>
                            <h5><a href="pro-details.html">What Curling Irons Are The Best Ones</a></h5>
                            <p>Consectetur adipisicing elit. Laborum fuga incidunt laboriosam voluptas iure, delectus..</p>
                            <a href="pro-details.html" class="red-btn">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}


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
