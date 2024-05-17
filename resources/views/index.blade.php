<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Travel</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/images/favicon.ico') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/vendor/bootstrap.min.css') }}">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/vendor/font.awesome.min.css') }}">
    <!-- Linear Icons CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/vendor/linearicons.min.css') }}">
    <!-- Swiper CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/swiper-bundle.min.css') }}">
    <!-- Animation CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/animate.min.css') }}">
    <!-- Jquery ui CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/jquery-ui.min.css') }}">
    <!-- Nice Select CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/nice-select.min.css') }}">
    <!-- Magnific Popup -->
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/magnific-popup.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Main Style CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>
<style>
    #background-video {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 95%;
        object-fit: cover;
    }

    .mau {
        background-color: #093252;
        color: white;
        margin-left: 20px;
        border-radius: 20px;
    }
.title-2{
    color: white !important;
    text-align: center;
}
    h4 {
        font-weight: 400;
        font-size: large;
    }
</style>

<body>
    <header class="main-header-area">
        <div class="main-header header-transparent header-sticky">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-lg-2 col-xl-2 col-md-6 col-6 col-custom">
                        <div class="header-logo d-flex align-items-center">
                            <a href="index.html">
                                <img class="img-full" src="assets/images/cart/15.png" alt="Header Logo">
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
                            <li class="menu-item-has-children "><a href="{{ route('contact-us') }}">Contact</a> </li>
                            <?php
                               $id=Session::get('id');
                                if($id!= null){
                                    ?>
                                    <li class="menu-item-has-children "><a href="{{ route('logout-checkout') }}">Logout </a> </li>
                            <?php
                                }else{
                              ?>
                            <li class="menu-item-has-children "><a href="{{ route('login-checkout') }}"><i class="fa-solid fa-user"></i>Login</a></li>
                            <?php
                                }
                                ?>

                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </aside>
</header>
<div class="intro11-slider-wrap section-2"style="background-image:url('assets/images/about/Danang.webp');background-size:cover;">
    <div class="intro11-slider swiper-container">
        <div class="swiper-wrapper">
            <div class="intro11-section swiper-slide slide-6 slide-bg-1 bg-position">
                <div class="intro11-content-2 text-center">
                    <h1 class="different-title">Welcome</h1>
                    <a href="{{ route('book') }}"
                        class="btn flosun-button  secondary-btn theme-color rounded-0">Make reservation</a>
                </div>

            </div>
        </div>

    </div>
</div>
<div class="container custom-area mt-5">
    <div class="row row-cols-md-3" style="margin:auto;">
        <div class="col mb-4">
            <div class="card border-0">

                <div class="card-body text-center">
                    <i class="fa-solid fa-bell"style="font-size:4rem;"></i>
                    <h4 class="card-title">DỊCH VỤ CHU ĐÁO</h4>
                    <p class="card-text">Với sứ mệnh mang lại những sản phẩm tốt nhất, TicoTravel không ngừng nỗ lực để hoàn thiện. Sự hài lòng của khách hàng là động lực để chúng tôi phát triển.</p>
                </div>
            </div>
        </div>

        <div class="col mb-4">
            <div class="card border-0">

                <div class="card-body text-center">
                    <i class="fa-solid fa-comment-dollar"style="font-size:4rem;"></i>
                    <h4 class="card-title">GIÁ CẢ PHÙ HỢP</h4>
                    <p class="card-text">Travel cam kết cung cấp sản phẩm với giá cả phù hợp. Luôn suy nghĩ đến lợi ích khách hàng xuyên suốt các hoạt động của chúng tôi, đồng thời tạo nên sự khác biệt.</p>
                </div>
            </div>
        </div>

        <div class="col mb-4">
            <div class="card border-0">

                <div class="card-body text-center">
                    <i class="fa-solid fa-truck-plane"style="font-size:4rem;"></i>
                    <h4 class="card-title">SẢN PHẨM ĐA DẠNG</h4>
                    <p class="card-text">Với hệ thống phòng nghỉ rộng lớn từ Bắc vào Nam, Tico Travel là địa chỉ tin tưởng cho quý khách hàng chọn lựa villa, biệt thự cho chuyến du lịch bên gia đình.</p>
                </div>
            </div>
        </div>
    </div>
</div>

</div>

<div class="product-area mt-text-3">
    <div class="container custom-area-2 overflow-hidden">
        <div class="row">
            <div class="col-12 col-custom">
                <div class="section-title text-center mb-30">
                    <span class="section-title-1">Địa điểm du lịch nổi tiếng</span>
                </div>
            </div>
        </div>
        <div class="row product-row">
            <div class="col-12 col-custom">
                <div class="product-slider swiper-container anime-element-multi">
                    <div class="swiper-wrapper">
                        <div class="single-item swiper-slide">
                            <div class="single-product position-relative mb-30">
                                <div class="product-image">
                                    <img src="assets/images/collection/1.jpg" alt=""
                                        class="product-image-1 w-100"style="max-height:200px;">
                                </div>
                                <div class="product-content">
                                    <div class="product-title">
                                        <h4 class="title-2"> <a>Cầu vàng</a></h4>
                                    </div>
                                </div>
                            </div>
                            <div class="single-product position-relative mb-30">
                                <div class="product-image">
                                    <img src="assets/images/collection/2.jpg" alt=""
                                        class="product-image-1 w-100"style="max-height:200px;">
                                </div>
                                <div class="product-content">
                                    <div class="product-title">
                                        <h4 class="title-2"> Bà Nà Hill</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="single-item swiper-slide">
                            <div class="single-product position-relative mb-30">
                                <div class="product-image">
                                    <img src="assets/images/collection/3.jpg" alt=""
                                        class="product-image-1 w-100"style="max-height:200px;">
                                </div>
                                <div class="product-content">
                                    <div class="product-title">
                                        <h4 class="title-2"> <a>Cầu Rồng</a></h4>
                                    </div>
                                </div>
                            </div>
                            <div class="single-product position-relative mb-30">
                                <div class="product-image">
                                    <img src="assets/images/collection/4.png" alt=""
                                        class="product-image-1 w-100"style="max-height:200px;">
                                </div>
                                <div class="product-content">
                                    <div class="product-title">
                                        <h4 class="title-2"> <a>Phố cổ Hội An</a></h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="single-item swiper-slide">
                            <div class="single-product position-relative mb-30">
                                <div class="product-image">
                                    <img src="assets/images/collection/5.jpg" alt=""
                                        class="product-image-1 w-100"style="max-height:200px;">
                                </div>
                                <div class="product-content">
                                    <div class="product-title">
                                        <h4 class="title-2"> <a>Công viên Châu Á</a></h4>
                                    </div>
                                </div>
                            </div>
                            <div class="single-product position-relative mb-30">
                                <div class="product-image">
                                    <img src="assets/images/collection/6.jpg" alt=""
                                        class="product-image-1 w-100"style="max-height:200px;">
                                </div>
                                <div class="product-content">
                                    <div class="product-title">
                                        <h4 class="title-2"> <a>Bãi biển Mỹ Khê</a></h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="single-item swiper-slide">
                            <div class="single-product position-relative mb-30">
                                <div class="product-image">
                                    <img src="assets/images/collection/7.jpg" alt=""
                                        class="product-image-1 w-100"style="max-height:200px;">
                                </div>
                                <div class="product-content">
                                    <div class="product-title">
                                        <h4 class="title-2"> <a href="product-details.html">Bảo tàng Đà Nẵng</a>
                                        </h4>
                                    </div>
                                </div>
                            </div>
                            <div class="single-product position-relative mb-30">
                                <div class="product-image">
                                    <img src="assets/images/collection/8.jpg" alt=""
                                        class="product-image-1 w-100"style="max-height:200px;">
                                </div>
                                <div class="product-content">
                                    <div class="product-title">
                                        <h4 class="title-2"> <a>Chùa Linh Ứng</a></h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="single-item swiper-slide">
                            <div class="single-product position-relative mb-30">
                                <div class="product-image">
                                    <img src="assets/images/collection/9.jpg" alt=""
                                        class="product-image-1 w-100"style="max-height:200px;">
                                </div>
                                <div class="product-content">
                                    <div class="product-title">
                                        <h4 class="title-2"> <a>Cầu khóa tình yêu</a></h4>
                                    </div>
                                </div>
                                <div class="single-product position-relative mb-30">
                                    <div class="product-image">
                                        <img src="assets/images/collection/10.jpg" alt=""
                                            class="product-image-1 w-100"style="max-height:200px;">
                                    </div>
                                    <div class="product-content">
                                        <div class="product-title">
                                            <h4 class="title-2"> <a>Cù Lao Chàm</a></h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-pagination default-pagination"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="blog-post-area mt-text-3">
        <div class="container custom-area">
            <div class="row">
                <div class="col-12">
                    <div class="section-title text-center mb-30">
                        <span class="section-title-1">From The Blogs</span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-6 col-md-4 col-lg-4 col-custom mb-30">
                    <div class="blog-lst">
                        <div class="single-blog">
                            <div class="blog-image">
                                <a class="d-block" href="{{ route('banhmi') }}">
                                    <img src="assets/images/blog/banhmi.jpg" alt="Blog Image" class="w-60">
                                </a>
                            </div>
                            <div class="blog-content">
                                <div class="blog-text">
                                    <h4><a href="{{ route('banhmi') }}">Bánh mì Đà Nẵng-Top 12 quán bánh mì que Đà
                                            Nẵng ngon...</a></h4>
                                    <div class="blog-post-info">
                                        <span><i class="fa-regular fa-clock"style="color:#22b3c1;"></i></span>
                                        <span>26/04/2022</span>
                                    </div>
                                    <p>Nhắc đến Đà Nẵng nói chung và ẩm thực Đà Nẵng nói riêng chắc chắn không thể
                                        không nhắc đến ....</p>
                                    <a href="{{ route('banhmi') }}" class="readmore">Read More <i
                                            class="fa fa-long-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-md-4 col-lg-4 col-custom mb-30">
                    <div class="blog-lst">
                        <div class="single-blog">
                            <div class="blog-image">
                                <a class="d-block" href="blog-details-fullwidth.html">
                                    <img src="assets/images/blog/bana.png" alt="Blog Image" class="w-60">
                                </a>
                            </div>
                            <div class="blog-content">
                                <div class="blog-text">
                                    <h4><a href="blog-details-fullwidth.html">Khám phá 6 lễ hội độc đáo chỉ có tại
                                            Bà Nà Hills</a></h4>
                                    <div class="blog-post-info">
                                        <span><i class="fa-regular fa-clock"style="color:#22b3c1;"></i></span>
                                        <span>26/04/2022</span>
                                    </div>
                                    <p>Bà Nà Hills được du khách biết đến với địa điểm đến hàng đầu của sự kiện và
                                        lễ hội khu vực. Mỗi năm, Bà Nà ...</p>
                                    <a href="blog-details-fullwidth.html" class="readmore">Read More <i
                                            class="fa fa-long-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-md-4 col-lg-4 col-custom mb-30">
                    <div class="blog-lst">
                        <div class="single-blog">
                            <div class="blog-image">
                                <a class="d-block" href="blog-details-fullwidth.html">
                                    <img src="assets/images/blog/duthuyen.jpg" alt="Blog Image" class="w-60">
                                </a>
                            </div>
                            <div class="blog-content">
                                <div class="blog-text">
                                    <h4><a href="blog-details-fullwidth.html">Du thuyền sông Hàn-Trải nghiệm mới mẻ
                                            không thể bỏ...</a></h4>
                                    <div class="blog-post-info">
                                        <span><i class="fa-regular fa-clock"style="color:#22b3c1;"></i></span>
                                        <span>26/04/2022</span>
                                    </div>
                                    <p>Một trong những trải nghiệm đầy hấp dẫn mà nhất định du khách không nên bỏ
                                        qua chính là khám...</p>
                                    <a href="blog-details-fullwidth.html" class="readmore">Read More <i
                                            class="fa fa-long-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer class="footer-area">
        <div class="footer-widget-area">
            <div class="container container-default custom-area">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-3 col-custom">
                        <div class="single-footer-widget m-0">
                            <div class="footer-logo">
                                <a href="index.html">
                                    <img src="assets/images/cart/15.png"width="70px" alt="Logo Image">
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
    <a class="scroll-to-top" href="#">
        <i class="lnr lnr-arrow-up"></i>
    </a>

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
