<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<style>
    body {
        color: black !important;
    }

    button a {
        border: none !important;
    }

    h3 {
        color: black !important;
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

                                @if ($id != null)
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
                                            <a class="btn flosun-button secondary-btn rounded-0"
                                                href="{{ route('checkout') }}">Checkout</a>
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
                                <li class="menu-item-has-children "><a href="{{ route('login-checkout') }}"><i
                                            class="fa-solid fa-user"></i></a></li>
                                <li class="menu-item-has-children "><a
                                        href="{{ route('login-checkout') }}">login-checkout</a>
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
                        <h3 class="title-3">Checkout</h3>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="checkout-area mt-2">
        <div class="container custom-container">
            <div class="row">
                <div class="col-lg-6 col-12 col-custom">
                    <div class="your-order">
                        <h3>Your order</h3>
                        <div class="your-order-table table-responsive">
                            <table class="table">

                                <thead>
                                    <tr>
                                        <th class="cart-product-name">Room</th>
                                        <th class="cart-product-total">Total</th>
                                    </tr>
                                </thead>
                                @php $total = 0 @endphp
                                @if (session('cart'))
                                    @foreach (session('cart') as $room_id => $details)
                                        @php $total += $details['room_price'] * $details['quantity'] @endphp
                                        <tbody>
                                            <tr class="cart_item">
                                                <td class="cart-product-name"> {{ $details['room_type'] }}<strong
                                                        class="product-quantity">
                                                        × {{ $details['quantity'] }}</strong></td>
                                                <td class="cart-product-total text-center">
                                                    {{ number_format($details['room_price'] * $details['quantity']) }}</span>
                                                </td>
                                            </tr>
                                        </tbody>
                                    @endforeach
                                @endif
                                <tfoot>
                                    <tr class="order-total">
                                        <th>Order Total</th>
                                        <td class="text-center"><strong><span
                                                    class="amount">{{ number_format($total) }}VND</strong>
                                        </td>
                                    </tr>
                                </tfoot>

                            </table>
                        </div>

                    </div>
                </div>
                <div class="col-lg-6 col-12 col-custom">
                    <form method="POST"action="{{ url('/momo_payment') }}">
                        @csrf
                        @if (Session::get('id'))
                            <input name="userID" class="userID" value="{{ Session::get('id') }}" type="hidden">
                        @endif
                        <div class="checkbox-form">
                            <h3>Billing Details</h3>
                            <div class="row">
                                <div class="col-md-12 col-custom">
                                    <div class="checkout-form-list">
                                        <label>Email Address<span class="required">*</span></label>
                                        @if (Session::get('email'))
                                            <input name="reservate_email"class="reservate_email"
                                                value="{{ Session::get('email') }}" type="text"required>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-12 col-custom">
                                    <div class="checkout-form-list">
                                        <label>Address <span class="required">*</span></label>
                                        @if (Session::get('id'))
                                            @if (isset($user))
                                                <input name="reservate_address" class="reservate_address"
                                                    value="{{ $user->address }}" type="text"required>
                                            @endif
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-12 col-custom">
                                    <div class="checkout-form-list">
                                        <label>Phone <span class="required">*</span></label>
                                        @if (Session::get('id'))
                                            @if (isset($user))
                                                <input name="reservate_phone"class="reservate_phone"
                                                    value="{{ $user->phone }}" type="text"required>
                                            @endif
                                        @endif
                                        @if (Session::get('name'))
                                            <input name="reservate_name"class="reservate_name"
                                                value="{{ Session::get('name') }}" type="hidden" required>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-12 col-custom">
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Chọn hình thức thanh toán</label>
                                        <select name="reservate_method"
                                            class="form-control input-sm m-bot15 reservate_method">
                                            <option value="0">Qua chuyển khoản</option>
                                            <option value="1">Tiền mặt</option>
                                        </select>
                                    </div>
                                </div>
                                <input type="hidden"value="{{ $total }}" name="total_momo"class="total_momo">
                                <div class="row">
                                    <div class="col-lg-6 col-custom">
                                <button type="submit"name="payUrl" class="btn flosun-button secondary-btn ">Thanh Toán
                                    MoMo</button></div>
                                    <div class="col-lg-6 col-custom">
                                <input type="button" value="Xác nhận đơn hàng" name="send_order"
                                    class="btn flosun-button secondary-btn send_order"></div>
                            </div>

                        </div>
                    </form>
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
                                <li><a href="contact-us.html">reservate Policy</a></li>
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
    <script src="{{ asset('assets/js/sweetalert.js') }}"></script>
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
        $(document).ready(function() {
            $('.send_order').click(function() {
                swal({
                        title: "Xác nhận đơn hàng",
                        text: "Đơn hàng sẽ không được hoàn trả khi đặt,bạn có muốn đặt không?",
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonClass: "btn-danger",
                        confirmButtonText: "Cảm ơn, Mua hàng",
                        cancelButtonText: "Đóng,chưa mua",
                        closeOnConfirm: false,
                        closeOnCancel: false
                    },
                    function(isConfirm) {
                        if (isConfirm) {
                            var userID = $('.userID').val();
                            var reservate_email = $('.reservate_email').val();
                            var reservate_name = $('.reservate_name').val();
                            var reservate_address = $('.reservate_address').val();
                            var reservate_phone = $('.reservate_phone').val();
                            var reservate_method = $('.reservate_method').val();
                            var total_momo = $('.total_momo').val();
                            var _token = $('input[name="_token"]').val();
                            $.ajax({
                                url: '{{ url('/momo_payment') }}',
                                method: 'POST',
                                data: {
                                    userid: userID,
                                    reservate_email: reservate_email,
                                    reservate_name: reservate_name,
                                    reservate_address: reservate_address,
                                    reservate_phone: reservate_phone,
                                    _token: _token,
                                    total_momo:total_momo,
                                    reservate_method: reservate_method
                                },
                                success: function() {
                    swal({
                        title: "Đơn hàng",
                        text: "Đơn hàng của bạn đã được đặt!",
                        type: "success"
                    }, function() {
                        // Reload trang khi người dùng bấm OK
                        location.reload();
                    });
                }
                            });
                            window.setTimeout(function() {
                                location.reload();
                            }, 2000);
                        } else {
                            swal("Đóng", "Đơn hàng chưa được gửi, làm ơn hoàn tất đơn hàng", "error");
                        }
                    });
            });
        });
    </script>
</body>

</html>
