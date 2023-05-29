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
                                <h2>Contact</h2>
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb justify-content-center">
                                        <li class="breadcrumb-item"><a href="{{route('frontend.index')}}">Home</a></li>
                                        <li class="breadcrumb-item"><a href="{{route('frontend.contactUs')}}">Contact Us</a></li>
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
        <div class="alert alert-success" style="background-color:rgb(13, 212, 13);">
            <center><strong style="color:white">{{ session('message') }}</strong></center>
        </div>
    @endif

    <section class="contact-section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h5 style="color: red; font-weight: 900; font-size: 17px;"> LET'S TALK</h5>
                    <h2 class="contact-title">We Would Like To Hear From You Anytime</h2>
                </div>
                <div class="col-lg-8">
                    <form class="" id="contactus_form_front" action="{{route('frontend.contact_process')}}" method="POST">
                       @csrf
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <textarea class="form-control w-100" name="message" id="message" cols="30" rows="6" placeholder='Enter Message' style="border:1px solid red"></textarea>
                                    @error('message')
                                        <span class="invalid-feedback" role="alert">
                                            <span>{{ $message }}</span>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input class="form-control" name="name" id="name" type="text" placeholder='Enter your name' style="border:1px solid red">
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <span>{{ $message }}</span>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input class="form-control" name="email" id="email" type="email" placeholder="Email" style="border:1px solid red">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <span>{{ $message }}</span>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input class="form-control" name="subject" id="subject" type="text" placeholder="Enter Subject" style="border:1px solid red">
                                    @error('subject')
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
                        </div>
                        <div class="form-group mt-3">
                            <button type="submit" id="contact_btn" class="btn btn-outline-info">Send</button>
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
                        <span class="contact-info__icon"><i class="ti-tablet"></i></span>
                        <div class="media-body">
                            <h3> <a href="tel:+923146318768">+92 314 6318768</a></h3>
                            <h3> <a href="tel:+923044386362">+92 304 4386362</a></h3>
                            <p>24/7 Available</p>
                        </div>
                    </div>
                    <div class="media contact-info">
                        <span class="contact-info__icon"><i class="ti-email"></i></span>
                        <div class="media-body">
                            <h3><a href="mailto:alhamdtraders101@gmail.com" target="_blank">alhamdtraders101@gmail.com</a></h3>
                            <p>Send us your query anytime!</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

@endsection
