
    <!-- Offcanvas Menu Begin -->
    <div class="offcanvas-menu-overlay"></div>
    <div class="offcanvas-menu-wrapper">
        <div class="offcanvas__logo">
            <a href="./index.html"><img src="img/logo.png" alt=""></a>
        </div>
        <div id="mobile-menu-wrap"></div>
        <div class="offcanvas__btn">
            <a href="#" class="primary-btn">Appointment</a>
        </div>
        <ul class="offcanvas__widget">
            <li><i class="fa fa-phone"></i> 1-677-124-44227</li>
            <li><i class="fa fa-map-marker"></i> Los Angeles Gournadi, 1230 Bariasl</li>
            <li><i class="fa fa-clock-o"></i> Mon to Sat 9:00am to 18:00pm</li>
        </ul>
        <div class="offcanvas__social">
            <a href="#"><i class="fa fa-facebook"></i></a>
            <a href="#"><i class="fa fa-twitter"></i></a>
            <a href="#"><i class="fa fa-instagram"></i></a>
            <a href="#"><i class="fa fa-dribbble"></i></a>
        </div>
    </div>
    <!-- Offcanvas Menu End -->

    <!-- Header Section Begin -->
    <header class="header">
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <ul class="header__top__left">
                            {{-- <li><i class="fa fa-user"></i>@if (Auth::guard('khachhang')->check())
                                {{Auth::guard('khachhang')->user()->hsb_hoten}}
                                @else
                                Guest
                            @endif</li> --}}
                            <li><i class="fa fa-map-marker"></i>Khu II, đường 3/2, P. Xuân Khánh, Q. Ninh Kiều, TP. Cần Thơ.</li>
                            <li><i class="fa fa-clock-o"></i> <span  id="digital-clock"></span> </li>
                        </ul>
                    </div>
                    <div class="col-lg-4">
                        <div class="header__top__right">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                            <a href="#"><i class="fa fa-dribbble"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-2">
                    <div class="header__logo">
                        <a href="./index.html"><img src="img/logo.png" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-10">
                    <div class="header__menu__option">
                        <nav class="header__menu">
                            <ul>
                                <li class="active"><a href="{{ route('customer.home') }}">Trang chủ</a></li>
                                {{-- <li><a href="./about.html"></a></li> --}}
                                {{-- <li><a href="./services.html">Dịch vụ</a></li> --}}
                                {{-- <li><a href="#">Pages</a>
                                    <ul class="dropdown">
                                        <li><a href="./pricing.html">Pricing</a></li>
                                        <li><a href="./doctor.html">Doctor</a></li>
                                        <li><a href="./blog-details.html">Blog Details</a></li>
                                    </ul>
                                </li> --}}
                                {{-- <li><a href="./blog.html">News</a></li> --}}
                                <li><a href="{{ route('customer.xemlichhen') }}">Lịch hẹn</a></li>
                            </ul>
                        </nav>
                        <div class="header__btn">
                             {{-- @if (Auth::guard('khachhang')->check()) --}}
                               {{-- <a href="{{ route('customer.logout') }}" class="primary-btn">Đăng xuất</a> --}}
                             {{-- @else --}}
                                {{-- <a href="{{ route('customer.login') }}" class="primary-btn">Đăng nhập/ Đăng kí</a> --}}
                             {{-- @endif --}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="canvas__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>
    <!-- Header Section End -->