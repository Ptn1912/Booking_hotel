<!doctype html>
<html class="no-js" lang="en">
<meta charset="utf-8">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<title>Travel</title>
<meta name="robots" content="noindex, follow" />
<meta name="description" content="">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/images/favicon.ico') }}">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="{{ asset('assets/css/vendor/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/vendor/font.awesome.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/vendor/linearicons.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/plugins/swiper-bundle.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/plugins/animate.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/plugins/jquery-ui.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/plugins/nice-select.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/plugins/magnific-popup.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
    integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<style>
    .mt-no-text {
        margin-top: 70px !important;
    }
</style>

<body>
    <header class="main-header-area">
        <div class="main-header header-sticky">
            <div class="container custom-area">
                <div class="row align-items-center">
                    <div class="col-lg-2 col-xl-2 col-md-6 col-6 col-custom">
                        <div class="header-logo d-flex align-items-center">
                            <a href="index.html">
                                <img class="img-full" src="{{asset('assets/images/cart/15.png')}}" alt="Header Logo">
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
                            <li class="menu-item-has-children "><a href=""><i
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
<div class="breadcrumbs-area position-relative">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <div class="breadcrumb-content position-relative section-content">
                    <h3 class="title-3">Shopping Cart</h3>
                    <ul>
                        <li><a href="index.html">Home</a></li>
                        <li>Shopping Cart</li>
                    </ul>
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
<div class="cart-main-wrapper mt-no-text">
    <div class="container custom-area">

        <div class="row">
            <div class="col-lg-12 col-custom">
                <div class="cart-table table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="image">Image</th>
                                <th class="description">Product</th>
                                <th class="price">Price</th>
                                <th class="quantity">Day</th>
                                <th class="subtotal">SubTotal</th>
                                <th class="pro-remove">Remove</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $total = 0 @endphp
                            @if (session('cart'))
                                @foreach (session('cart') as $room_id => $details)
                                    @php $total += $details['room_price'] * $details['quantity'] @endphp
                                    <tr data-id="{{ $room_id }}">
                                        <td class="pro-thumbnail"><img class="img-fluid"
                                                    src="{{ asset('room') }}/{{ $details['room_Image'] }}"
                                                    alt="Product" ></td>
                                        <td class="pro-title">{{ $details['room_type'] }}
                                        </td>
                                        <td class="pro-price"><span>{{ number_format($details['room_price']) }} VND</span></td>
                                                <td data-th="Quantity">
                                                <input type="number" value="{{ $details['quantity'] }}" class="form-control quantity cart_update" min="1"  >
                                        </td>
                                        <td class="pro-subtotal"><a
                                                href="#">{{ number_format($details['room_price'] * $details['quantity'])}}</a>
                                        </td>
                                        <td class="pro-remove"data-th=""> <button class="btn cart_remove"><i
                                                    class="fa fa-trash-o"></i> Delete</button>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-5 ml-auto col-custom">
                <div class="cart-calculator-wrapper">
                    <div class="cart-calculate-items">
                        <h3>Cart Totals</h3>
                        <div class="table-responsive">
                            <table class="table">
                                <tr class="total">
                                    <td>Total</td>
                                    <td class="total-amount"> {{ number_format($total) }}VND</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <a href="{{ url('/') }}" class="btn flosun-button primary-btn rounded-0 black-btn w-100">Continue shopping</a>
                        <?php
                        $id=Session::get('id');
                        if($id != null){
                            ?>
                           <a href="{{ route('checkout') }}" class="btn flosun-button primary-btn rounded-0 black-btn w-100">Check out </a>
                    <?php
                        }else{
                      ?>
                  <a href="{{ route('login-checkout') }}"class="btn flosun-button primary-btn rounded-0 black-btn w-100">Check out</a>
                    <?php
                        }
                        ?>

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
<script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
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
<script type="text/javascript">
    $(".cart_update").change(function(e) {
        e.preventDefault();

        var ele = $(this);

        $.ajax({
            url: '{{ route('update_cart') }}',
            method: "patch",
            data: {
                _token: '{{ csrf_token() }}',
                id: ele.parents("tr").attr("data-id"),
                quantity: ele.parents("tr").find(".quantity").val()
            },
            success: function(response) {
                window.location.reload();
            }
        });
    });
    $(".cart_remove").click(function(e) {
        e.preventDefault();
        var ele = $(this);
        if (confirm("Do you really want to remove?")) {
            $.ajax({
                url: '{{ route('remove_from_cart') }}',
                method: "DELETE",
                data: {
                    _token: '{{ csrf_token() }}',
                    id: ele.parents("tr").attr("data-id")
                },
                success: function(response) {
                    window.location.reload();
                }
            });
        }
    });
</script>
</body>

</html>
