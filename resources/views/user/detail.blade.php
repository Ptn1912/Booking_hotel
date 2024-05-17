<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Travel</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/images/favicon.ico') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/vendor/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/vendor/font.awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/vendor/linearicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/swiper-bundle.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/jquery-ui.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/nice-select.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/sweetalert.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
button a{
    border: none !important;
}
        body {
            font-size: 1rem;
            color: black;
            line-height: 2.5rem;
        }
        #row {
            border-bottom: 1px solid grey;
        }

        i {
            color: #00A751;
        }
        .flosun-button {
            border:none;
            display: inline-block;
            font-size: 16px;
            font-weight: 500;
            font-family: "Poppins", sans-serif;
            height: 40px;
            letter-spacing: 0.025em;
            line-height: 40px;
            padding: 0 15px;
            text-align: center;
            vertical-align: middle;
            width: auto;
            -webkit-transition: all 0.3s ease 0s;
            -o-transition: all 0.3s ease 0s;
            transition: all 0.3s ease 0s;
        }
        .mt-no-text {
            margin-top: 50px !important;
        }
        .img-small {
    max-width: 350px; /* Kích thước tối đa cho ảnh */
    height: auto; /* Duy trì tỷ lệ khung hình */
}

    </style>
</head>
<body>
    <header class="main-header-area">
        <div class="main-header header-sticky">
            <div class="container custom-area">
                <div class="row align-items-center">
                    <div class="col-lg-2 col-xl-2 col-md-6 col-6 col-custom">
                        <div class="header-logo d-flex align-items-center">
                            <a href="index.html">
                                <img class="img-full" src="{{ asset('assets/images/cart/15.png') }}" alt="Header Logo">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-8 d-none d-lg-flex justify-content-center col-custom">
                        <nav class="main-nav d-none d-lg-flex">
                            <ul class="nav">
                                <li>
                                    <a href="{{ route('index') }}">
                                        <span class="menu-text"> Home</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="active" href="{{ route('book') }}">
                                        <span class="menu-text">Booking</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('blog-review') }}">
                                        <span class="menu-text"> Blog</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('about-us') }}">
                                        <span class="menu-text"> About</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('contact-us') }}">
                                        <span class="menu-text">Contact Us</span>
                                    </a>
                                </li>
                                <?php
                                $id = Session::get('id');
                                $name = Session::get('name');
                                ?>
                                @if($id != null)
                                    <li>
                                        <a href="#"><span class="menu-text">{{ $name }}</span></a>
                                        <ul class="dropdown-submenu dropdown-hover">
                                            <li><a href="{{ route('logout-checkout') }}">Logout</a></li>
                                            <li><a href="{{ route('account') }}">My account</a></li>
                                        </ul>
                                    </li>
                                @else
                                    <li>
                                        <a href="{{ route('login-checkout') }}"><i class="fa-solid fa-user"></i></a>
                                    </li>
                                @endif
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-2 col-md-6 col-6 col-custom">
                    <div class="header-right-area main-nav">
                        <ul class="nav">
                            <li class="minicart-wrap">
                                <a href="#" class="minicart-btn toolbar-btn">
                                    <i class="fa fa-shopping-cart"></i>
                                    <span class="cart-item_count">{{ count((array) session('cart')) }}</span>
                                </a>
                                <div class="cart-item-wrapper dropdown-sidemenu dropdown-hover-2">
                                    <div class="cart-links d-flex justify-content-between">
                                        <a class="btn product-cart button-icon flosun-button dark-btn"
                                            href="{{ route('cart') }}">View cart</a>
                                            <?php
                                            $id=Session::get('id');
                                             if($id != null){
                                                 ?>
                                              <a class="btn flosun-button secondary-btn rounded-0"
                                              href="{{ route('checkout') }}">Checkout</a>
                                         <?php
                                             }else{
                                           ?>
                                        <a class="btn flosun-button secondary-btn rounded-0"
                                        href="{{ route('login-checkout') }}">Checkout</a>
                                         <?php
                                             }
                                             ?>
                                    </div>
                                </div>
                            </li>

                            <li class="account-menu-wrap d-none d-lg-flex">
                                <a href="#" class="off-canvas-menu-btn">
                                    <i class="fa fa-bars"></i>
                                </a>
                            </li>
                            <li class="mobile-menu-btn d-lg-none">
                                <a class="off-canvas-btn" href="#">
                                    <i class="fa fa-bars"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <aside class="off-canvas-wrapper" id="mobileMenu">
        <div class="off-canvas-overlay"></div>
        <div class="off-canvas-inner-content">
            <div class="btn-close-off-canvas">
                <i class="fa fa-times"></i>
            </div>
            <div class="off-canvas-inner">

                <div class="mobile-navigation">
                    <nav>
                        <ul class="mobile-menu">
                            <li class="menu-item-has-children"><a href="{{ route('index') }}">Home</a>
                            </li>
                            <li class="menu-item-has-children"><a href="{{ route('book') }}">Booking</a>
                            </li>
                            </li>
                            <li class="menu-item-has-children "><a href="{{ route('blog-review') }}">Blog</a>
                            </li>
                            <li class="menu-item-has-children "><a href="{{ route('about-us') }}">About</a></li>
                            <li class="menu-item-has-children "><a href="{{ route('contact-us') }}">Contact</a>
                            </li>
                            <li class="menu-item-has-children ">{{ route('login-checkout') }}"><i
                                    class="fa-solid fa-user"></i></a></li>
                            <li class="menu-item-has-children "><a href="{{ route('logout-checkout') }}">Logout</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </aside>

</header>
<div class=" position-relative">
    <div class="single-product-main-area">
        <div class="container container-default custom-area">
            <div class="row">
                <div class="col-lg-5 offset-lg-0 col-md-8 offset-md-2 col-custom">
                    <div class="product-details-img">
                        <div class="single-product-img swiper-container gallery-top popup-gallery">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <a class="w-100"
                                        href="{{ asset('assets/images/cart/voco-ma-belle-danang-11.jpg') }}">
                                        <img class="w-100"
                                            src="{{ asset('assets/images/cart/voco-ma-belle-danang-11.jpg') }}"
                                            alt="Product">
                                    </a>
                                </div>
                                <div class="swiper-slide">
                                    <a class="w-100"
                                        href="{{ asset('assets/images/cart/voco-ma-belle-danang-14.jpg') }}">
                                        <img class="w-100"
                                            src="{{ asset('assets/images/cart/voco-ma-belle-danang-14.jpg') }}"
                                            alt="Product">
                                    </a>
                                </div>
                                <div class="swiper-slide">
                                    <a class="w-100"
                                        href="{{ asset('assets/images/cart/voco-ma-belle-danang-17.jpg') }}">
                                        <img class="w-100"
                                            src="{{ asset('assets/images/cart/voco-ma-belle-danang-17.jpg') }}"
                                            alt="Product">
                                    </a>
                                </div>
                                <div class="swiper-slide">
                                    <a class="w-100"
                                        href="{{ asset('assets/images/cart/voco-Ma-Belle-Danang-4.jpg') }}">
                                        <img class="w-100"
                                            src="{{ asset('assets/images/cart/voco-Ma-Belle-Danang-4.jpg') }}"
                                            alt="Product">
                                    </a>
                                </div>
                                <div class="swiper-slide">
                                    <a class="w-100"
                                        href="{{ asset('assets/images/cart/voco-ma-belle-danang-5-1.jpg') }}">
                                        <img class="w-100"
                                            src="{{ asset('assets/images/cart/voco-ma-belle-danang-5-1.jpg') }}"
                                            alt="Product">
                                    </a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-lg-7 col-custom">
                    <div class="product-summery position-relative">
                        <div class="product-head mb-3">
                            <h3 class="product-title">{{ $product->name }}</h3>
                        </div>
                        <div class="price-box mb-2">
                            {{ $product->address }}
                        </div>
                        <div class="price-box mb-2">
                            {{ $product->description }}
                        </div>
                        <div class="single-product-thumb swiper-container gallery-thumbs">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <img src="{{ asset('assets/images/cart/voco-ma-belle-danang-11.jpg') }}"
                                        alt="Product">
                                </div>
                                <div class="swiper-slide">
                                    <img src="{{ asset('assets/images/cart/voco-ma-belle-danang-14.jpg') }}"
                                        alt="Product">
                                </div>
                                <div class="swiper-slide">
                                    <img src="{{ asset('assets/images/cart/voco-ma-belle-danang-17.jpg') }}"
                                        alt="Product">
                                </div>
                                <div class="swiper-slide">
                                    <img src="{{ asset('assets/images/cart/voco-Ma-Belle-Danang-4.jpg') }}"
                                        alt="Product">
                                </div>
                                <div class="swiper-slide">
                                    <img src="{{ asset('assets/images/cart/voco-ma-belle-danang-5-1.jpg') }}"
                                        alt="Product">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
</div>
<div class="container mt-no-text">
    <div class="container-default-2 custom-area">
        <div class="row shop_wrapper grid_list">
            @foreach ($room as $vl)
            <div class="col-lg-12 col-md-6 col-sm-5 col-custom product-area bg-white">
                <div class="product-item">
                    <div class="single-product position-relative mr-0 ml-0">
                        <div class="product-images">
                            <div class="blog-image">
                                <img src="{{ url('room') }}/{{ $vl->room_Image }}" alt="Blog Image" class="w-90"height="300px">
                        </div>
                        </div>
                        <div class="product-content-listview">
                            <div class="row">
                                <div class="col-sm-8">
                                    <b style="font-size: 1.25rem;">{{ $vl->room_type }}</b>
                                </div>
                                
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <i class="fa-solid fa-utensils fa-lg"></i> No breakfast
                                </div>
                                <div class="col-8">
                                    <i class="fa-solid fa-check-to-slot fa-lg"></i> Free cancellation within 24 hours
                                </div>

                            </div>
                            <div class="row">
                                <div class="col">
                                    <i class="fa-solid fa-wifi fa-lg"></i> Free wifi
                                </div>
                                <div class="col">
                                    <i class="fa-solid fa-ban-smoking fa-lg"></i> No smoking
                                </div>
                                <div class="col">
                                    <p style="font-size: larger; color: chocolate; font-weight: 500;">
                                        {{ number_format($vl->room_price) }} VND
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-8">
                                    <i class="fa-solid fa-credit-card fa-lg"></i> Pay upon check-in
                                </div>
                                <div class="col-sm-4">
                                    <a href="{{ route('add_to_cart', $vl->room_id) }}" class="btn flosun-button secondary-btn rounded">Book Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            @endforeach
        </div>
        
    </div>
</div>

<div class="product-area mt-text-3">
    <div class="container custom-area-2 overflow-hidden">
        <div class="row">
            <div class="col-12 col-custom">
                <div class="section-title text-center mb-30">
                    <span class="section-title-1">The Most Trendy</span>
                </div>
            </div>
        </div>
        <div class="row product-row">
            <div class="col-12 col-custom">
                <div class="product-slider swiper-container anime-element-multi">
                    <div class="swiper-wrapper">
                        @foreach ($sp as $values)
                            <div class="single-item swiper-slide">
                                <div class="single-product position-relative mb-30">
                                    <div class="product-image">
                                        <a class="d-block" href="{{ url('detail') }}/{{ $values->id }}">
                                            <img src="{{ url('assets/images/cart') }}/{{ $values->ImageHotel }}"
                                                alt="" class="product-image-1 w-100">
                                            <img src="assets/images/cart/18.jpg" alt=""
                                                class="product-image-2 position-absolute w-100">
                                        </a>
                                        <div class="add-action d-flex flex-column position-absolute">
                                            <a href="#exampleModalCenter" title="Quick View"
                                                data-bs-toggle="modal" data-bs-target="#exampleModalCenter">
                                                <i class="lnr lnr-eye" data-toggle="tooltip"
                                                    data-placement="left" title="Quick View"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <div class="product-title">
                                            <h4 class="title-2">
                                                <a href="">{{ $values->name }}</a>
                                            </h4>
                                        </div>
                                        <div class="product-rating">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="swiper-pagination default-pagination"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<footer class="footer-area mt-text-3">
    <div class="footer-widget-area">
        <div class="container container-default custom-area">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-3 col-custom">
                    <div class="single-footer-widget m-0">
                        <div class="footer-logo">
                            <a href="index.html">
                                <img src="{{ asset('assets/images/cart/15.png') }}"width="70px" alt="Logo Image">
                            </a>
                        </div>
                        <p class="desc-content">Lorem Khaled Ipsum is a major key to success. To be successful
                            you’ve got to work hard you’ve got to make it.</p>
                        <div class="social-links">
                            <ul class="d-flex">
                                <li>
                                    <a class="rounded-circle" href="#" title="Facebook">
                                        <i class="fa fa-facebook-f"></i>
                                    </a>
                                </li>
                                <li>
                                    <a class="rounded-circle" href="#" title="Twitter">
                                        <i class="fa fa-twitter"></i>
                                    </a>
                                </li>
                                <li>
                                    <a class="rounded-circle" href="#" title="Linkedin">
                                        <i class="fa fa-linkedin"></i>
                                    </a>
                                </li>
                                <li>
                                    <a class="rounded-circle" href="#" title="Youtube">
                                        <i class="fa fa-youtube"></i>
                                    </a>
                                </li>
                                <li>
                                    <a class="rounded-circle" href="#" title="Vimeo">
                                        <i class="fa fa-vimeo"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-6 col-lg-2 col-custom">
                    <div class="single-footer-widget">
                        <h2 class="widget-title">Information</h2>
                        <ul class="widget-list">
                            <li><a href="about-us.html">Our Company</a></li>
                            <li><a href="contact-us.html">Contact Us</a></li>
                            <li><a href="about-us.html">Our Services</a></li>
                            <li><a href="about-us.html">Why We?</a></li>
                            <li><a href="about-us.html">Careers</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-6 col-lg-2 col-custom">
                    <div class="single-footer-widget">
                        <h2 class="widget-title">Quicklink</h2>
                        <ul class="widget-list">
                            <li><a href="about-us.html">About</a></li>
                            <li><a href="blog.html">Blog</a></li>
                            <li><a href="shop.html">Shop</a></li>
                            <li><a href="cart.html">Cart</a></li>
                            <li><a href="contact-us.html">Contact</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-6 col-lg-2 col-custom">
                    <div class="single-footer-widget">
                        <h2 class="widget-title">Support</h2>
                        <ul class="widget-list">
                            <li><a href="contact-us.html">Online Support</a></li>
                            <li><a href="contact-us.html">Shipping Policy</a></li>
                            <li><a href="contact-us.html">Return Policy</a></li>
                            <li><a href="contact-us.html">Privacy Policy</a></li>
                            <li><a href="contact-us.html">Terms of Service</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-6 col-lg-3 col-custom">
                    <div class="single-footer-widget">
                        <h2 class="widget-title">See Information</h2>
                        <div class="widget-body">
                            <address>123, ABC, Road ##, Main City, Your address goes here.<br>Phone: 01234 567
                                890<br>Email: https://example.com</address>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</footer>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="{{ asset('assets/js/vendor/jquery-3.6.0.min.js') }}"></script>
<script src="{{ asset('assets/js/vendor/jquery-migrate-3.3.2.min.js') }}"></script>
<script src="{{ asset('assets/js/vendor/modernizr-3.7.1.min.js') }}"></script>
<script src="{{ asset('assets/js/vendor/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/swiper-bundle.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/nice-select.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/jquery.ajaxchimp.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/jquery-ui.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/jquery.countdown.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('assets/js/main.js') }}"></script>



</body>

</html>
