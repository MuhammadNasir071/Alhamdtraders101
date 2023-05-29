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
                                <h2>Thank You</h2>
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb justify-content-center">
                                        <li class="breadcrumb-item"><a href="{{route('frontend.index')}}">Go To Home</a></li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <section class="contact-section">
        <div class="listing-area pt-30 pb-50">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12">
                        <div class="latest-items latest-items2">
                            <div class="row">
                                    <div class="col-xl-12">
                                        <div>
                                            <div class="mt-30">
                                                <p><strong>Thank you for placing your order!</strong> We appreciate your business and are excited to fulfill your request.</p>
                                                <p> Team is now processing your order and will ensure that it is prepared and shipped to you as soon as possible.</p>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

@endsection
