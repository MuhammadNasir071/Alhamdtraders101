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
                                <h2>About</h2>
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb justify-content-center">
                                        <li class="breadcrumb-item"><a href="{{route('frontend.index')}}">Home</a></li>
                                        <li class="breadcrumb-item"><a href="{{route('frontend.aboutus')}}">About us</a></li>
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
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="contact-title">About us</h2>
                </div>
                <div class="col-lg-6">
                    <ul>
                        <li>
                            <p>Welcome to Alhamd Traders! We are a premier e-commerce platform committed to providing you with a delightful online shopping experience.</p>
                        </li>
                        <li>
                            <p>Our mission is to provides best quality products and handsome price. We strive to be your go-to destination for all your shopping needs,
                                 offering a diverse range of products across various categories. Our commitment to quality means you can trust that the produce you receive
                                 from us is always fresh and of the highest standard.
                            </p>
                        </li>
                        <li>
                            <p>
                                We believe in going the extra mile for our customers. Our dedicated customer support team is always ready to assist you with any inquiries, concerns, or assistance you may need. We value your feedback and continuously strive to improve our services to meet and exceed your expectations.
                            </p>
                        </li>
                        <li>
                            <p>
                                Join our ever-growing community of satisfied customers and experience the convenience and joy of online shopping with us. Start exploring our wide range of products today and let us make your shopping experience a memorable one.
                            </p>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-4 offset-lg-1">
                    <div class="about_side_image">
                        <img src="{{asset('frontend/assets/img/about_mango_image.png')}}" alt="about_image">
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

@endsection
