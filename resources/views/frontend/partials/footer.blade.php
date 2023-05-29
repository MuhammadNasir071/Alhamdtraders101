<footer>
    <div class="footer-wrapper gray-bg">
        <div class="footer-area footer-padding">

            <section class="subscribe-area">
                <div class="container">
                    <div class="row justify-content-between subscribe-padding">
                        <div class="col-xxl-3 col-xl-3 col-lg-4">
                            <div class="subscribe-caption">
                                <h3>Subscribe Newsletter</h3>
                                <p>Subscribe newsletter to get 5% on all products.</p>
                            </div>
                        </div>
                        <div class="col-xxl-5 col-xl-6 col-lg-7 col-md-9">
                            <div class="subscribe-caption">
                                <form action="{{route('frontend.subscribers')}}" method="Post" id="subscribe_email">
                                    @csrf
                                    <input type="email" name="email" placeholder="Enter your email" autocomplete="off">
                                    <button type="submit" required class="subscribe-btn">Subscribe</button>
                                </form>
                            </div>
                        </div>
                        <div class="col-xxl-2 col-xl-2 col-lg-4">

                            <div class="footer-social">
                                <a href="https://www.facebook.com/profile.php?id=100069321672378&mibextid=ZbWKwL" target="_blank"><i class="fab fa-facebook"></i></a>
                                <a href="https://www.instagram.com/alhamd825" target="_blank"><i class="fab fa-instagram"></i></a>
                                <!--<a href="#"><i class="fab fa-youtube"></i></a>-->
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <div class="container">
                <div class="row justify-content-between">
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-8">
                        <div class="single-footer-caption mb-50">
                            <div class="single-footer-caption mb-20">

                                <div class="footer-logo mb-35">
                                    <a href="{{route('frontend.index')}}">
                                        <img src="{{asset('frontend/assets/img/alhamd_logo.svg')}}" alt="logo">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                        <div class="single-footer-caption mb-50">
                            <div class="footer-tittle">
                                <h4>Fruits</h4>
                                <ul>
                                    <li><a href="{{route('frontend.getProducts', 6)}}">Mangoes</a></li>
                                    <li><a href="{{route('frontend.getProducts', 7)}}">Citrus</a></li>
                                    <li><a href="{{route('frontend.getProducts', 8)}}">Guava</a></li>
                                    <li><a href="{{route('frontend.getProducts', 9)}}">Apple</a></li>
                                    <li><a href="{{route('frontend.getProducts', 10)}}">Banana</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                        <div class="single-footer-caption mb-50">
                            <div class="footer-tittle">
                                <h4>Vagitables</h4>
                                <ul>
                                    <li><a href="{{route('frontend.getProducts', 11)}}">Onion</a></li>
                                    <li><a href="{{route('frontend.getProducts', 12)}}">Potato</a></li>
                                    <li><a href="{{route('frontend.getProducts', 13)}}">Chillies</a></li>
                                    <li><a href="{{route('frontend.getProducts', 14)}}">Tomato</a></li>
                                    <li><a href="{{route('frontend.getProducts', 15)}}">Carrots</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                        <div class="single-footer-caption mb-50">
                            <div class="footer-tittle">
                                <h4>Quick Links</h4>
                                <ul>
                                    {{-- <li><a href="#">FAQ</a></li> --}}
                                    <li><a href="{{route('frontend.aboutus')}}">About</a></li>
                                    <li><a href="{{route('frontend.contactUs')}}">Contact</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="footer-bottom-area">
            <div class="container">
                <div class="footer-border">
                    <div class="row">
                        <div class="col-xl-12 ">
                            <div class="footer-copy-right text-center">
                                <p>Copyright &copy;
                                    <script>
                                        document.write(new Date().getFullYear());
                                    </script> All rights reserved |<a href="{{route('frontend.index')}}" > Alhamdtraders101</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
