<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="description" content="Cryptsence best academy to learn & earn through cryptocurrency, Join Today">
    <meta name="keywords" content="{{ env('APP_KEYWORDS') }}">
    <link rel="stylesheet" href="/landing/css/animate.css?v=1">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
    <link rel="stylesheet" href="/landing/bootstarp/bootstrap.min.css?v=1">
    <link rel="stylesheet" href="/landing/css/super-classes.css?v=1">
    <link rel="stylesheet" href="/landing/css/style.css?v=1">
    <link rel="stylesheet" href="/landing/css/mobile.css?v=1">
    <link rel="stylesheet" href="{{ asset('landing/css/custom.css?v=1') }}">
    <title>{{ env('APP_NAME') }} best academy to learn & earn through cryptocurrency</title>
</head>

<body>
    <!---header-and-banner-section-->
    <div class="header-and-banner-con w-100">
        <div class="header-and-banner-inner-con overlay-content ">
            <header>
                <!--navbar-start-->
                <div class="container">
                    <div class="header-con">
                        <nav class="navbar navbar-expand-lg navbar-light p-0">
                            <a class="navbar-brand p-0" href="index.html">
                                <img src="{{ asset('assets/brand/logo-light.png') }}" alt="logo-img"
                                    class="img-fluid w-75">
                            </a>
                            <button class="navbar-toggler p-0 collapsed" type="button" data-toggle="collapse"
                                data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                                <span class="navbar-toggler-icon"></span>
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                                <ul class="navbar-nav">
                                    <li class="nav-item active">
                                        <a class="nav-link text-white p-0" href="{{ route('landing') }}">Home<span
                                                class="sr-only">(current)</span></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-white p-0" href="{{ route('login') }}">Sign in</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-white p-0"
                                            href="{{ route('user.dashboard') }}">Dashboard</a>
                                    </li>
                                </ul>
                                <a href="{{ route('register') }}" class=" my-2 my-sm-0 contact-btn">Create Account</a>
                            </div>
                        </nav>
                    </div>
                </div>
                <!--navbar-end-->
            </header>
            <section class="banner-main-con">
                <div class="container">
                    <!--banner-start-->
                    <div class="banner-con">
                        <div class="row">
                            <div
                                class="col-lg-7 col-md-7 col-sm-12 d-flex justify-content-center flex-column banner-main-left-con">
                                <div class="banner-left-con wow slideInLeft">
                                    <div class="banner-heading">
                                        <h1>Cryptsence best academy to learn & earn through cryptocurrency
                                        </h1>
                                    </div>
                                    <div class="banner-content">
                                        <p class="col-lg-11 pl-0 pr-0">We are the first ever crypto academy of being an
                                            educational organizational to incorporate cryptocurrency as well blockchain
                                            learning into an investment platform to educate and develop earnings through
                                            digitalization.
                                        </p>
                                    </div>
                                    <div class="banner-btn">
                                        <a href="{{ route('register') }}" class="contact-btn">Get started</a>
                                        <a href="{{ route('login') }}" class="contact-btn contact-banner-btn">Sign
                                            in</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-5 col-md-5 col-sm-12">
                                <div class="banner-right-con wow slideInRight">
                                    <figure class="mb-0">
                                        <img src="/landing/image/banner-right-img.png" alt="banner-right-img">
                                    </figure>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--banner-end-->
                </div>
            </section class="banner-main-con">
            <section>
                <script type="text/javascript" src="https://files.coinmarketcap.com/static/widget/coinMarquee.js"></script>
                <div id="coinmarketcap-widget-marquee" coins="1,1027,825,1839,3408,52,4172,74,5994,4687" currency="USD"
                    theme="dark" transparent="true" show-symbol-logo="true"></div>
                <!-- Hero Section End -->
            </section>
        </div>
    </div>
    <!---header-and-banner-section-->
    <!---slider-section-->
    @yield('content')
    <!--form-section-->
    <!-- weight-footer-section -->
    <section>
        <div class="weight-footer-main-con bg-overly-img">
            <div class="container overlay-content">
                <div class="weight-footer-item-con">
                    <div class="row wow fadeInUp">
                        <div class="col-12 text-center mx-auto">
                            <div class="weight-footer-item weight-footer-item1 mb-lg-0 mb-3">
                                <div class="weight-footer-item-img">
                                    <figure>
                                        <img src="{{ asset('assets/brand/logo-light.png') }}" alt="logo-img"
                                            class="img-fluid">
                                    </figure>
                                </div>
                                <div class="weight-footer-item-content weight-footer-item-link ">
                                    <ul class="list-unstyled mb-0 social-icon-list">
                                        <li class="d-inline-block mb-0"><a href="https://www.facebook.com/cryptsence"><i
                                                    class="fab fa-facebook-f"></i></a></li>
                                        <li class="d-inline-block mb-0"><a
                                                href="https://twitter.com/CRYPTSENCE?t=v__dlcpNRGlbTcMo7TUzGg&s=08"><i
                                                    class="fab fa-twitter"></i></a></li>
                                        <li class="d-inline-block mb-0"><a href="https://t.co/wjK4qKaDtX"><i
                                                    class="fab fa-instagram"></i></a></li>
                                    </ul>
                                </div>
                                <div class="weight-footer-item-content">
                                    <p class="mb-xl-0 mb-lg-0 mb-md-4 weight-footer-item1-content">We are looking for
                                        you to make this dream become reality. Thousands of people from around the
                                        world, believe in this change to save them time, and it’s hassle free every time
                                        they trade.</p>
                                </div>
                                <div class="weight-footer-item-content mt-4">
                                    <a href="{{ route('privacy') }}">Privay Policy</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-con">
                <div class="container overlay-content">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="footer-con text-center">
                                <p>Copyright {{ env('APP_NAME') }} © {{ date('Y') }}. All Rights Reserved.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- weight-footer-section -->
    <script src="/landing/js/wow.js"></script>
    <script>
        new WOW().init();
    </script>
    <script src="/landing/js/jquery-3.6.0.min.js?v=1"></script>
    <script src="/landing/js/popper.min.js?v=1"></script>
    <script src="/landing/js/bootstrap.min.js?v=1"></script>
    <script src="/landing/js/custom-script.js?v=1"></script>
</body>

</html>
