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
                                <h2>Product Details</h2>
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb justify-content-center">
                                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                        <li class="breadcrumb-item"><a href="#">Product Details</a></li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
{{-- {{dd($productDetails[0])}} --}}
    <section class="our-client section-padding best-selling">
        <div class="listing-area pt-30 pb-30">
            <div class="container">
                <div class="row">
                    <div class="col-xl-7 col-lg-7 col-md-7 mr-5">
                        <div class="p-4">
                            <img class="img-fluid" src="{{!is_null($productDetails[0]['media'][0]['name']) ? url('Uploads/products/'. $productDetails[0]['media'][0]['name']) : asset('Uploads/categories/mango_image.svg')}}" alt="">
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-4 ml-5 pl-5">
                        <div>
                            <div>
                                <h5>{{isset($productDetails[0]['name']) ? $productDetails[0]['name'] : ''}}</h5>
                            </div>
                            <div>
                                <span style="font-weight:bold">Category: </span>
                                <span style="padding:1px 8px; background-color:rgb(66, 238, 13);color: white; border-radius: 5px;">{{$productDetails[0]['category']['name']}}</span>
                            </div>
                            <div>
                                <h6 style="padding-top:15px;margin-bottom:0px">Descriptions: </h6>
                                <div>
                                    <p>{!! $productDetails[0]['details'] !!}</p>
                                </div>
                            </div>
                            <div class="Prices" style="margin: 10px 0px;">
                                <span style="font-weight:bold;">Availablity:  </span>
                                @if ($productDetails[0]['availablity'] == 1)
                                    <span style="padding:1px 8px; background-color:rgb(245, 34, 69);color: white; border-radius: 5px;">In Stock</span>
                                @else
                                    <span style="padding:1px 8px; background-color:rgb(6, 123, 190);color: white; border-radius: 5px;">Out of Stock</span>
                                @endif

                            </div>
                            <div class="Prices" style="margin: 15px 0px;">
                                <span style="font-weight:bold;;">Price: Rs. </span>
                                <span>{{$productDetails[0]['min_price']}}</span> to
                                <span>{{$productDetails[0]['max_price']}}</span>

                                @if($productDetails[0]['weight_unit'] == 'kilogram')
                                    <span style="font-weight:bold;float:right">1 PACK 1KG</span>
                                @elseif($productDetails[0]['weight_unit'] == 'metric-ton')
                                    <span style="font-weight:bold;float:right">1 PACK Metric Ton</span>
                                @elseif($productDetails[0]['weight_unit'] == 'dozen')
                                    <span style="font-weight:bold;float:right">1 PACK 1 Dosen</span>
                                @elseif($productDetails[0]['weight_unit'] == 'pound')
                                    <span style="font-weight:bold;float:right">1 PACK 1 Pound</span>
                                @else
                                    <span style="font-weight:bold;float:right">1 PACK 5KG</span>
                                @endif

                            </div>
                            <div>
                                <input type="hidden" id="product_id" name="product_id" value="{{$productDetails[0]['id']}}">
                                <div class="bottom_cart_dev">
                                    <span>
                                        <button id="cart_minus_btn" class="btn btn-info" style="background-color: #000000!important; padding:17px 22px">+</button>
                                    </span>
                                    <span style="padding:10px">
                                        <input type="text" id="seleted_product_quantity" value="0" name="seleted_product_quantity" style="border:none; width:15px">
                                    </span>
                                    <span>
                                        <button id="cart_plus_btn" class="btn btn-info" style="background-color: #000000!important; padding:17px 22px">-</button>
                                    </span>
                                    <span >
                                        <button  id="add_to_cart" class="btn btn-danger {{$productDetails[0]['availablity'] != 1 ? 'disabled' : ''}}" style="padding:17px 22px; float:right"> Add to cart</button>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="listing-area pt-30 pb-50">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="section-tittle text-center mb-40">
                        <h4>Related Products</h4>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12">
                    <div class="latest-items latest-items2">
                        <div class="row">
                            @if ($relatedProducts && count($relatedProducts) > 0)
                                @foreach ($relatedProducts as $relatedProduct)
                                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                                        <div class="properties pb-30">
                                            <div class="properties-card">
                                                <div class="properties-img">
                                                    <a href="{{route('frontend.single.product', $relatedProduct->id)}}">
                                                        <img src="{{!is_null($relatedProduct['media'][0]['name']) ? url('Uploads/products/'.$relatedProduct['media'][0]['name']) : asset('Uploads/categories/mango_image.svg')}} " style="min-height:270px" alt="" />
                                                    </a>
                                                    <div class="socal_icon">
                                                        <a href="{{route('frontend.single.product', $relatedProduct->id)}}">Shop Now</a>
                                                    </div>
                                                </div>
                                                <div class="properties-caption properties-caption2">
                                                    <h3><a href="{{route('frontend.single.product', $relatedProduct->id)}}">{{$relatedProduct->name}}</a></h3>
                                                    <div class="properties-footer">
                                                        <div class="price">
                                                            <span>Price: Rs. {{$relatedProduct->min_price}}</span>
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
                                            <img src="{{asset('frontend/assets/img/no_product.png')}}"></img>
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

</main>

@endsection
