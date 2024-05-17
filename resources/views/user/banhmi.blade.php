<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Travel</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/images/favicon.ico')}}">
    <link rel="stylesheet" href="{{asset('assets/css/vendor/bootstrap.min.css')}}">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/vendor/font.awesome.min.css')}}">
    <!-- Linear Icons CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/vendor/linearicons.min.css')}}">
    <!-- Swiper CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/plugins/swiper-bundle.min.css')}}">
    <!-- Animation CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/plugins/animate.min.css')}}">
    <!-- Jquery ui CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/plugins/jquery-ui.min.css')}}">
    <!-- Nice Select CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/plugins/nice-select.min.css')}}">
    <!-- Magnific Popup -->
    <link rel="stylesheet" href="{{asset('assets/css/plugins/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <style>
        p{
            color: black;
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
                                <li>
                                    <a href="{{ route('login') }}"><i class="fa-solid fa-user"></i></a></li>
                                <li>
                                    @if(Auth::check())
                                    <a href=""><span class="menu-text">{{Auth::user()->name}}</span></a>
                                    <ul class="dropdown-submenu dropdown-hover">
                                        <li><a href="{{ route('logout') }}">Logout</a></li>
                                    </ul>
                                </li>
                                    @endauth
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
                                            <a class="btn product-cart button-icon flosun-button dark-btn" href="{{ route('cart')}}">View cart</a>
                                            <a class="btn flosun-button secondary-btn rounded-0" href="{{ route('checkout')}}">Checkout</a>
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
                                <li class="menu-item-has-children "><a href="{{ route('contact-us') }}">Contact</a></li>
                                <li class="menu-item-has-children "><a href="{{ route('login') }}"><i class="fa-solid fa-user"></i></a></li>
                                <li class="menu-item-has-children "><a href="{{ route('logout') }}">Logout</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </aside>
    </header>
    <div class="blog-area-wrapper">
        <div class="blog-main-area">
            <div class="col-12 col-custom">
                <div class="section-title text-center mb-40">
                    <span class="section-title-1"style="color:black;">Bánh mì Việt Nam</span>
                </div>
            </div>
            <div class="container container-default custom-area">
                <div class="row">
                    <div class="col-12 col-custom widget-mt">
                        <div class="blog-post-details">
                            <figure class="blog-post-thumb ">
                                <img src="assets/images/blog/bm1.png" alt="Blog Image">
                            </figure>
                            <section class="blog-post-wrapper product-summery">
                                <div class="section-content section-title">
                                    <p class="mb-4">Có thể bạn không ngờ rằng, bánh mì của chúng ta lại có xuất xứ từ phương Tây. Vào thế kỷ 19, người Pháp đã mang bánh mì baguette kẹp bơ, mứt, thịt nguội đến Việt Nam. Theo thời gian, món ăn này đã trở nên phổ biến, năm 1958, tiệm bánh mì Hoà Mã bắt đầu mở bán món bánh mì kiểu Pháp mang đi "kẹp đủ thứ". Cho đến năm 1970, chúng ta đã chính thức tạo ra bánh mì quốc dân với lớp vỏ ngoài giòn rụm, thơm phức, có nhiều nứt vết chân chim, bên trong ruột rỗng và xốp hơn bánh baguette. Đây chính là đặc điểm giúp làm nên thương hiệu của bánh mì Việt.
                                    </p>
                                    <figure class="blog-post-thumb mb-5">
                                        <img src="assets/images/blog/bm3.png" alt="Blog Image">

                                    </figure>
                                    <blockquote class="blockquote mb-4">
                                        <p>Bánh mì Việt Nam ngày càng thăng hạng trên bản đồ ẩm thực thế giới
                                            Không giống với bánh mì hamburger hay sandwich, bánh mì Việt Nam khác biệt với lớp vỏ ngoài giòn rụm, bên trong xốp mềm. Đặc biệt là phần ruột rỗng để cho thêm các loại nhân như thịt, pate, trứng, rau thơm,... Đây cũng là lý do khiến bánh mì trở nên nổi danh trên khắp thế giới.

                                            </p>
                                    </blockquote>
                                    <p class="mb-5">Những phiên bản độc lạ giúp bánh mì Việt đạt đến đẳng cấp hoàn toàn khác
                                        Mặc dù bánh mì truyền thống có mặt ở khắp nơi nhưng mỗi miền, mỗi thành phố lại có cách biến tấu riêng để "làm mới" khẩu vị cho thực khách. Chẳng hạn như Hà Nội thì có bánh mì dân tổ, Hải Phòng thì có bánh mì que hay Huế thì nổi rần rần với bánh mì bột lọc. Không những vậy, những loại nhân của bánh mì cũng ngày càng đa dạng, bên cạnh các loại thịt nguội thường thấy thì còn có khô bò đen, gà xé, xíu mại khô,… Ngoài việc kẹp các loại nhân bên trong, bánh mì vẫn còn vô số những phiên bản thú vị khác như bánh mì xíu mại, bánh mì cắt, bánh mì cacao,… Thế mới nói, bánh mì không chỉ đơn thuần là 1 món ăn, mà nó còn gói ghém vào đó những tinh hoa ẩm thực riêng biệt, góp phần tô đậm nét đặc sắc của bánh mì trên bản đồ ẩm thực.</p>
                                </div>
                                <div class="share-article">
                                    <span class="left-side">
                                <a href="#"> <i class="fa fa-long-arrow-left"></i> Older Post</a>
                            </span>
                                    <h6 class="text-uppercase">Share this article</h6>
                                    <span class="right-side">
                            <a href="#">Newer Post <i class="fa fa-long-arrow-right"></i></a>
                            </span>
                                </div>
                                <div class="social-share">
                                    <a href="#"><i class="fa fa-facebook-square facebook-color"></i></a>
                                    <a href="#"><i class="fa fa-twitter-square twitter-color"></i></a>
                                    <a href="#"><i class="fa fa-linkedin-square linkedin-color"></i></a>
                                    <a href="#"><i class="fa fa-pinterest-square pinterest-color"></i></a>
                                </div>
                            </section>
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
                                    <img src="assets/images/cart/15.png"width="70px" alt="Logo Image">
                                </a>
                            </div>
                            <p class="desc-content">Lorem Khaled Ipsum is a major key to success. To be successful you’ve got to work hard you’ve got to make it.</p>
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
                                <address>123, ABC, Road ##, Main City, Your address goes here.<br>Phone: 01234 567 890<br>Email: https://example.com</address>
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
    <script src="{{asset('assets/js/vendor/jquery-3.6.0.min.js')}}"></script>
    <script src="{{asset('assets/js/vendor/jquery-migrate-3.3.2.min.js')}}"></script>
    <script src="{{asset('assets/js/vendor/modernizr-3.7.1.min.js')}}"></script>
    <script src="{{asset('assets/js/vendor/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('assets/js/plugins/swiper-bundle.min.js')}}"></script>
    <script src="{{asset('assets/js/plugins/nice-select.min.js')}}"></script>
    <script src="{{asset('assets/js/plugins/jquery.ajaxchimp.min.js')}}"></script>
    <script src="{{asset('assets/js/plugins/jquery-ui.min.js')}}"></script>
    <script src="{{asset('assets/js/plugins/jquery.countdown.min.js')}}"></script>
    <script src="{{asset('assets/js/plugins/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{asset('assets/js/main.js')}}"></script>
</body>
</html>
