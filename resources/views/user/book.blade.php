<!doctype html>
<html class="no-js" lang="zxx">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Travel</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style2.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/sweetalert.css') }}">
    <style>
        .product-content {
            background-color: #181A1B !important;
            padding: 10px 10px;
        }

        h4 span .regular-price{
            color: #4F7F99 !important;
        }

        .title-2,
        title,
        td {
            color: #4F7F99 !important;
        }

        i,a {
            text-decoration: 1px solid yellow ;
            color:aqua;
        }

        h1 {
            color: white !important;
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
                                ?>
                                @if($id != null)
                                    <li>
                                        @if(Session::get('name'))
                                        <a href="#"><span class="menu-text"> {{Session::get('name')}} </span></a>
                                        @endif
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
                <div class="search-box-offcanvas">
                    <form>
                        <input type="text" placeholder="Search product...">
                        <button class="search-btn"><i class="fa fa-search"></i></button>
                    </form>
                </div>
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
                            <li class="menu-item-has-children "><a href="{{ route('login-checkout') }}"><i
                                        class="fa-solid fa-user"></i></a></li>
                            <li class="menu-item-has-children "><a href="{{ route('login-checkout') }}">Logout</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </aside>
    <header class="section__container header__container">
        <div
            class="header__image__container"style="background-image:url('assets/images/blog/1659955607_ZYozx2_Da_Nang.jpg')">
            <div class="header__content">
                <h1>Enjoy Your Dream Vacation</h1>
            </div>
            <div class="booking__container"style="background-color:white;">
                <form action="{{ route('search') }}" method="POST" autocomplete="off">
                    @csrf
                    <div style="display:flex;">
                    <input name="query" id="searchInput" placeholder="Search your hotel" type="text">
                    <button type="submit"class="searchButton"><i class="fa fa-search"></i></button></div>
                    <div style="display:block;" id="search_ajax"></div>
                </form>
            </div>
        </div>
    </header>
</header>
<div class="shop-main-area">
    <div class="container container-default custom-area">
        <div class="col-lg-12 col-12 col-custom widget-mt">
            <div class="row shop_wrapper grid_3">
               @if($searchResultsFound)
            @foreach($filteredProducts as $value)
            <div class="col-md-6 col-sm-6 col-lg-4 col-custom product-area">
                <div class="product-item">
                    <div class="single-product position-relative mr-0 ml-0">
                        <div class="product-image">
                            <a class="d-block" href="{{ url('detail') }}/{{ $value->HotelID }}">
                                <img src="{{url('assets/images/cart') }}/{{ $value->ImageHotel }}" alt=""
                                    class="product-image-1 w-100"height="250px">
                                <img src="assets/images/cart/18.jpg" alt=""
                                    class="product-image-2 position-absolute w-100">
                            </a>

                        </div>
                        <div class="product-content">
                            <div class="product-title">
                                <h4 class="title-2">
                                    <a href="">{{ $value->name }}</a>
                                </h4>
                            </div>
                            <div class="product-rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                            </div>
                            <div class="price-box">
                                <i class="fa-solid fa-map-location-dot fa-lg"></i> <span
                                  style="color:4F7F99;">{{ $value->address }}</span>
                            </div>
                            <div class="price-box">
                                <a href="{{ url('detail') }}/{{ $value->HotelID }}">Xem chi tiết</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        @else
            @foreach($all_products as $value)
            <div class="col-md-6 col-sm-6 col-lg-4 col-custom product-area">
                <div class="product-item">
                    <div class="single-product position-relative mr-0 ml-0">
                        <div class="product-image">
                            <a class="d-block" href="{{ url('detail') }}/{{ $value->HotelID }}">
                                <img src="{{url('assets/images/cart') }}/{{ $value->ImageHotel }}" alt=""
                                    class="product-image-1 w-100">
                                <img src="assets/images/cart/18.jpg" alt=""
                                    class="product-image-2 position-absolute w-100"height="250px">
                            </a>

                        </div>
                        <div class="product-content">
                            <div class="product-title">
                                <h4 class="title-2">
                                    <a href="">{{ $value->name }}</a>
                                </h4>
                            </div>
                            <div class="product-rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                            </div>
                            <div class="price-box">
                                <i class="fa-solid fa-map-location-dot fa-lg"></i> <span
                                  style="color:white;">{{ $value->address }}</span>
                            </div>
                            <div class="price-box">
                                <a href="{{ url('detail') }}/{{ $value->HotelID }}">Xem chi tiết</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        @endif
            </div>
            <div class="row">
                <div class="col-sm-12 col-custom">
                    <div class="toolbar-bottom">
                        <div class="pagination">
                            <ul>
                                <li class="current">1</li>
                                <li><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li class="next"><a href="#">next</a></li>
                                <li><a href="#">&gt;&gt;</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<footer class="footer-area mt-no-text">
    <div class="footer-widget-area">
        <div class="container container-default custom-area">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-3 col-custom">
                    <div class="single-footer-widget m-0">
                        <div class="footer-logo">
                            <a href="index.html">
                                <img src="assets/images/cart/15.png"style="width:70px !important;"
                                    alt="Logo Image">
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
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{asset('assets/js/sweetalert.js')}}"></script>
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
<script>
    $(document).ready(function () {
        $('#searchInput').keyup(function () {
            var query = $(this).val();

            if (query !== "") {
                $.ajax({
                    url: "/searchajax",
                    method: "POST",
                    data: { query: query, _token: $('meta[name="csrf-token"]').attr('content') },
                    success: function (data) {
                        $('#search_ajax').fadeIn();
                        $('#search_ajax').html(data.html);
                    },
                    error: function (xhr, status, error) {
                        console.error(xhr.responseText);
                        // Xử lý lỗi ở đây
                    }
                });
            } else {
                // Nếu trường tìm kiếm trống, ẩn kết quả
                $('#search_ajax').fadeOut();
            }
        });

        // Không cần thay đổi phần này nếu đã hoạt động đúng
        $(document).on('click', '.li_search_ajax', function () {
            $('#searchInput').val($(this).text());
            $('#search_ajax').fadeOut();
        });
    });
</script>
</body>

</html>
