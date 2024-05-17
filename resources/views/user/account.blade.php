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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Main Style CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
</head>
<style>
    .required{
        color: white !important;
    }
</style>
<body >
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
                                <li class="menu-item-has-children "><a href="{{ route('login-checkout') }}"><i class="fa-solid fa-user"></i></a></li>
                                <li class="menu-item-has-children "><a href="{{ route('login-checkout') }}">login-checkout</a>
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
                        <h3 class="title-3">My Account</h3>
                        <ul>
                            <li><a href="index.html">Home</a></li>
                            <li>My Account</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if(session('alert'))
    <script>alert("{{ session('alert') }}");</script>
@endif

    <div class="my-account-wrapper mt-no-text">
        <div class="container container-default-2 custom-area">
            <div class="row">
                <div class="col-lg-12 col-custom">
                    <div class="myaccount-page-wrapper">
                        <div class="row">
                            <div class="col-lg-3 col-md-4 col-custom">
                                <div class="myaccount-tab-menu nav" role="tablist">
                                    <a href="#orders" class="active" data-bs-toggle="tab"><i class="fa fa-cart-arrow-down"></i> Orders</a>
                                    <a href="#payment-method" data-bs-toggle="tab"><i class="fa fa-credit-card"></i> Payment Method</a>
                                    <a href="#account-info" data-bs-toggle="tab"><i class="fa fa-user"></i> Account Details</a>
                                    <a href="{{ route('logout-checkout') }}"><i class="fa fa-sign-out"></i> Log Out</a>
                                </div>
                            </div>
                            <div class="col-lg-9 col-md-8 col-custom">
                                <div class="tab-content" id="myaccountContent">
                                    <div class="tab-pane fade show active" id="orders" role="tabpanel">
                                        <div class="myaccount-content">
                                            <h3>Orders</h3>
                                            <div class="myaccount-table table-responsive text-center">
                                                <table class="table table-bordered">
                                                    <thead class="thead-light">
                                                        <tr>
                                                            <th>Order</th>
                                                            <th>Date</th>
                                                            <th>Day</th>
                                                            <th>Total</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    @if(Session::get('id'))

                                                        @if(isset($bookingDetails))
                                                        @foreach ($bookingDetails as $ct)
                                                            <tr>
                                                                <td>{{$ct->room_type}}</td>
                                                                <td>{{$ct->created_at}}</td>
                                                                <td>{{$ct->quantity}}</td>
                                                                <td>{{number_format($ct->room_price)}} VND</td>
                                                                <td><a href="{{ route('cart')}}" class="btn flosun-button secondary-btn theme-color rounded-0">View</a></td>
                                                            </tr>
                                                        @endforeach
                                                    @endif

                                                    </tbody>
                                                    @endif
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="payment-method" role="tabpanel">
                                        <div class="myaccount-content">
                                            <h3>Payment Method</h3>
                                            <p class="saved-message">You Can't Saved Your Payment Method yet.</p>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="account-info" role="tabpanel">
                                        <div class="myaccount-content">
                                            <h3>Account Details</h3>
                                            <div class="account-details-form">
                                                @if(Session::has('success'))

                                                  {{Session::get('success')}}


                                                @endif

                                                <form action="{{route('update_account')}}"method="post">
                                                    @csrf
                                                       @if(Session::get('id'))
                                                    <input type="hidden" name="id" value="{{Session::get('id')}}">
                                                    @endif

                                                    <div class="row">
                                                        <div class="col-lg-6 col-custom">
                                                            <div class="single-input-item mb-3">
                                                                @if(isset($user))
                                                                <label for="name" class="required mb-1">Name </label>
                                                                <input type="name"value="{{ $user->name}}"  id="name" name="name"placeholder="Name"required />
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 col-custom">
                                                            <div class="single-input-item mb-3">
                                                                @if(isset($user))
                                                                <label for="phone" class="required mb-1">Phone Number </label>
                                                                <input type="number" value="{{ $user->phone}}" id="phone"name="phone" placeholder="Phone Number"required />
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                        <div class="single-input-item mb-3">
                                                            @if(isset($user))
                                                            <label for="address" class="required mb-1">Address</label>
                                                            <input type="address" value="{{ $user->address}}"  name="address"id="current-add" placeholder="Address" required>
                                                            @endif
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-6 col-custom">
                                                                <div class="single-input-item mb-3">
                                                                    @if(isset($user))
                                                                    <label for="new-pwd" class="required mb-1">Gender</label>
                                                                    <select class="form-select"
                                                            aria-label="Default select example"name="gender"value="{{ $user->gender}}" >
                                                            <option value="Nam">Nam</option>
                                                            <option value="Nữ">Nữ</option>
                                                        </select>
                                                        @endif
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 col-custom">
                                                                <div class="form-group">
                                                                    @if(isset($user))
                                                                    <label for="birthday" class="required mb-1">Your Birthday</label>
                                                                    <input type="date"value="{{ $user->birthday}}"  class="form-control" id="birthday" name="birthday"required>
                                                                    @endif
                                                                </div>

                                                            </div>
                                                        </div>
                                                    <div class="single-input-item single-item-button">
                                                        <button class="btn flosun-button secondary-btn theme-color  rounded-0"type="submit"name="submit">Save Changes</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div> <!-- Single Tab Content End -->
                                </div>
                            </div> <!-- My Account Tab Content End -->
                        </div>
                    </div> <!-- My Account Page End -->
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
                                    <img src="assets/images/logo/logo-footer.png" alt="Logo Image">
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
