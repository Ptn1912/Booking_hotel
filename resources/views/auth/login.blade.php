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
    <link rel="stylesheet" href="{{asset('assets/css/vendor/font.awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/vendor/linearicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/plugins/swiper-bundle.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/plugins/animate.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/plugins/jquery-ui.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/plugins/nice-select.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/plugins/magnific-popup.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <style>
    @media (min-width: 992px){
    .col-lg-6 {
        flex: 0 0 auto;
        width: 50% !important;
    }
}
     </style>
</head>
<body style="background-color:linear-gradient(to top left,#18a5a7,#b6c0c5)!important;">

    <header class="main-header-area">
        <!-- Main Header Area Start -->
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
                                    <a href="{{ route('login-checkout') }}"><i class="fa-solid fa-user"></i></a></li>
                                <li>
                                    @if(Auth::check())
                                    <a href=""><span class="menu-text">{{Auth::user()->name}}</span></a>
                                    <ul class="dropdown-submenu dropdown-hover">
                                        <li><a href="{{ route('logout-checkout') }}">Log Out</a></li>
                                        <li><a href="{{ route('account') }}">My account</a></li>
                                    </ul>
                                </li>
                                    @endauth
                            </ul>
                        </nav>
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
                                <li class="menu-item-has-children "><a href="{{ route('contact-us') }}">Contact</a></li>
                                <li class="menu-item-has-children "><a href="{{ route('login-checkout') }}"><i class="fa-solid fa-user"></i></a></li>
                                <li class="menu-item-has-children "><a href="{{ route('logout-checkout') }}">Logout</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </aside>
    </header>
    <div class="breadcrumbs-area position-relative">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <div class="breadcrumb-content position-relative section-content">
                        <h3 class="title-3">Login-Register</h3>
                        <ul>
                            <li><a href="index.html">Home</a></li>
                            <li>Login-Register</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

<div class="login-register-area mt-no-text">
    <div class="container custom-area">
        <div class="row">
            <div class="col-lg-6 col-md-8 col-custom mx-auto">
                <div class="login-register-wrapper">
                    <div class="section-content text-center mb-5">
                        <h2 class="title-4 mb-2"style="color:black;">Login</h2>
                    </div>
                <div class="card-body">
                    @if($message=Session::get('error'))
                    <div class="alert alert-danger alert-block">
                        <button type="button" class="close" data-dismiss="alert">X</button>
                          <strong>{{$message}}</strong>

                    </div>
                    @endif
                    @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
@endif


                    <form method="POST" action="{{url('/login-customer')}}">
                        @csrf

                        <div class="row ">
                            <label for="email" class="col-md-4  ">Email</label>

                            <div class="single-input-item mb-3">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"  required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row ">
                            <label for="password" class="col-md-4  ">Password</label>

                            <div class="single-input-item mb-3">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="single-input-item mb-3">
                            <div class="login-reg-form-meta d-flex align-items-center justify-content-between">
                                <div class="remember-meta mb-3">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="rememberMe">
                                        <label class="custom-control-label" for="rememberMe">Remember Me</label>
                                    </div>
                                </div>
                                <a href="{{route('forgot')}}" class="forget-pwd mb-3">Forget Password?</a>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 mx-auto">
                                <button class=" flosun-button secondary-btn theme-color rounded-0" type="submit" class="btn btn-primary">
                                  Log In
                                </button>
                              <a href="{{route('viewregister' )}}" class="btn flosun-button secondary-btn theme-color rounded-0">
                                   Register

                              </a>
                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ url('/forgot-password')}}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
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


<script src="{{asset('assets/js/vendor/jquery-3.6.0.min.js')}}  js')}} js')}} "></script>
<script src="{{asset('assets/js/vendor/jquery-migrate-3.3.2.min.js')}} js')}} js')}} "></script>
<script src="{{asset('assets/js/vendor/modernizr-3.7.1.min.js')}} js')}} js')}} "></script>
<script src="{{asset('assets/js/vendor/bootstrap.bundle.min.js')}} js')}} js')}} "></script>
<script src="{{asset('assets/js/plugins/swiper-bundle.min.js')}} js')}} js')}} "></script>
<script src="{{asset('assets/js/plugins/nice-select.min.js')}} js')}} "></script>
<script src="{{asset('assets/js/plugins/jquery.ajaxchimp.min.js')}} js')}} "></script>
<script src="{{asset('assets/js/plugins/jquery-ui.min.js')}} js')}} "></script>
<script src="{{asset('assets/js/plugins/jquery.countdown.min.js')}} js')}} "></script>
<script src="{{asset('assets/js/plugins/jquery.magnific-popup.min.js')}} js')}} "></script>
<script src="{{asset('assets/js/main.js')}} js')}} "></script>
</body>
</html>

