<header>
    <div class="header-area">
        <div class="header-top d-none d-sm-block">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="d-flex justify-content-between flex-wrap align-items-center">
                            <div class="header-info-left">
                                <ul>
                                    <li><a href="{{route('frontend.aboutus')}}">About</a></li>
                                    <li><a href="{{route('frontend.contactUs')}}">Contact</a></li>
                                    {{-- <li><a href="#">FAQ</a></li> --}}
                                </ul>
                            </div>
                            <div class="header-info-right d-flex">
                                <ul class="header-social">
                                    <li><a href="https://www.facebook.com/profile.php?id=100069321672378&mibextid=ZbWKwL" target="_blank"><i class="fab fa-facebook"></i></a></li>
                                    <li> <a href="https://www.instagram.com/alhamd825" target="_blank"><i class="fab fa-instagram"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-mid header-sticky">
            <div class="container">
                <div class="menu-wrapper">

                    <div class="logo">
                        <a href="{{route('frontend.index')}}">
                            <img src="{{asset('frontend/assets/img/alhamd_logo.svg')}}" alt="logo">
                        </a>
                    </div>

                    <div class="main-menu d-none d-lg-block">
                        <nav>
                            <ul id="navigation">
                                <li><a href="javascript:void(0)">Fruits <i class="fas fa-angle-down"></i></a>
                                    <ul class="submenu">
                                        <li><a href="{{route('frontend.getProducts', 6)}}">Mangoes</a></li>
                                        <li><a href="{{route('frontend.getProducts', 7)}}">Citrus</a></li>
                                        <li><a href="{{route('frontend.getProducts', 8)}}">Guava</a></li>
                                        <li><a href="{{route('frontend.getProducts', 9)}}">Apple</a></li>
                                        <li><a href="{{route('frontend.getProducts', 10)}}">Banana</a></li>
                                    </ul>
                                </li>
                                <li><a href="javascript:void(0)">Vagitables <i class="fas fa-angle-down"></i></a>
                                    <ul class="submenu">
                                        <li><a href="{{route('frontend.getProducts', 11)}}">Onion</a></li>
                                        <li><a href="{{route('frontend.getProducts', 12)}}">Potato</a></li>
                                        <li><a href="{{route('frontend.getProducts', 13)}}">Chillies</a></li>
                                        <li><a href="{{route('frontend.getProducts', 14)}}">Tomato</a></li>
                                        <li><a href="{{route('frontend.getProducts', 15)}}">Carrots</a></li>
                                    </ul>
                                </li>
                                <li><a href="{{route('frontend.getProducts', 15)}}">Pulses</a></li>
                                <li><a href="{{route('frontend.getProducts', 17)}}">Rice</a></li>
                                <li><a href="{{route('frontend.getProducts', 18)}}">Wheat</a></li>
                                <li><a href="{{route('frontend.getProducts', 19)}}">Maize</a></li>
                            </ul>
                        </nav>
                    </div>

                    <div class="header-right">
                        <ul>
                            <li>
                                <div class="nav-search search-switch hearer_icon">
                                    <a id="search_1" href="javascript:void(0)">
                                        <span class="flaticon-search"></span>
                                    </a>
                                </div>
                            </li>
                            {{-- <li> <a href="login.html"><span class="flaticon-user"></span></a></li>
                            <li class="cart">
                                <a href="#">
                                    <span class="flaticon-shopping-cart">
                                        <span id="header_cart">0</span>
                                    </span>
                                </a>
                            </li> --}}
                        </ul>
                    </div>
                </div>

                <div class="search_input" id="search_input_box">
                    <form class="search-inner d-flex justify-content-between ">
                        <input type="text" class="form-control" id="search_input" placeholder="Search Here">
                        <button type="submit" class="btn"></button>
                        <span class="ti-close" id="close_search" title="Close Search"></span>
                    </form>
                </div>

                <div class="col-12">
                    <div class="mobile_menu d-block d-lg-none"></div>
                </div>
            </div>
        </div>
        <div class="header-bottom text-center">
            <p>Sale Up To 50% Biggest Discounts. Hurry! Limited Perriod Offer <a href="#" class="browse-btn">Shop Now</a></p>
        </div>
    </div>
</header>

@if (session('subscribe'))
<div class="alert alert-success" style="background-color:rgb(13, 212, 13);">
    <center><strong style="color:white">{{ session('subscribe') }}</strong></center>
</div>
@endif
