@extends('landing.layout.app')
@section('content')
    <!---information-section-->
    <section>
        <div class="informationmain-con dots-left-img w-100 ">
            <div class="container overlay-content">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12 informationmain-left-con">
                        <div class="informationmainleft-sec-img wow slideInLeft">
                            <figure class="mb-0">
                                <img src="/landing/image/informationmain-left-sec-img.png"
                                    alt="informationmain-left-sec-img">
                            </figure>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 informationmain-right-con wow slideInRight">
                        <div class="informationmain-right-heading">
                            <h5>Who we are</h5>
                            <h2>About {{ env('APP_NAME') }}
                            </h2>
                        </div>
                        <div class="informationmain-right-content">
                            <p>We believe the future of finance is open, inclusive and empowering. The values that we carry
                                also makes us successful as a team. Coming together from across the world, we push the
                                limits to build a world where everyone has equal access to exciting financial services. We
                                are looking for you to make this dream become reality. Thousands of people from around the
                                world, believe in this change to save them time, and it’s hassle free every time they trade.
                            </p>
                            <ul class="mb-0 list">
                                <li><i class="fas fa-check-circle"></i>Register</li>
                                <li><i class="fas fa-check-circle"></i>Instant Deposit/ Withdraw</li>
                                <li><i class="fas fa-check-circle"></i>Safe and Secure</li>
                                <li><i class="fas fa-check-circle"></i>Mobile Apps</li>
                                <li><i class="fas fa-check-circle"></i>Support System</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!---information-section-->
    <!--- Effective-section-->
    <section>
        <div class="Effective-con bg-overly-img w-100">
            <div class="container overlay-content">
                <div class="Effective-sec-heading text-center">
                    <h5>What we do</h5>
                    <h2>Complete And Effective Protection For
                        Your Financial Needs
                    </h2>
                </div>
                <div class="row wow fadeInUp">
                    <div class="col-lg-3 col-md-6 col-12">
                        <div class="Effective-sec-item mb-lg-0 mb-4">
                            <figure>
                                <img src="/landing/image/Effective-sec-item-img1.png" alt="Effective-sec-item-img"
                                    class="img-fluid">
                            </figure>
                            <div class="Effective-sec-item-title">
                                <h4 class="mb-0">Instant Deposit/ Withdraw
                                </h4>
                                <p class="mb-0">We Provide Instant Deposit / Withdraw
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-12">
                        <div class="Effective-sec-item mb-lg-0 mb-4">
                            <figure>
                                <img src="/landing/image/Effective-sec-item-img2.png" alt="Effective-sec-item-img"
                                    class="img-fluid">
                            </figure>
                            <div class="Effective-sec-item-title">
                                <h4 class="mb-0">Safe and Secure
                                </h4>
                                <p class="mb-0">Our System is Safe & Secure with the Advance Algorithm.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-12">
                        <div class="Effective-sec-item Effective-sec-item3">
                            <figure>
                                <img src="/landing/image/Effective-sec-item-img3.png" alt="Effective-sec-item-img"
                                    class="img-fluid">
                            </figure>
                            <div class="Effective-sec-item-title">
                                <h4 class="mb-0">Mobile Apps
                                </h4>
                                <p class="mb-0">Download our MObile App to manage your account
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-12">
                        <div class="Effective-sec-item">
                            <figure>
                                <img src="/landing/image/Effective-sec-item-img4.png" alt="Effective-sec-item-img"
                                    class="img-fluid">
                            </figure>
                            <div class="Effective-sec-item-title">
                                <h4 class="mb-0">Support System
                                </h4>
                                <p class="mb-0">If you have any Problem, or Issue, you can Contact Support
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="Effective-link ml-auto mr-auto">
                        <a href="{{ route('register') }}" class="contact-btn">Get started</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--- Effective-section-->
    <!---Cyber-Security-section-->
    <section>
        <div class="Cyber-Security-con bg-overly-img w-100">
            <div class="container overlay-content">
                <div class="row">
                    <div class="col-lg-6 col-md-12 Cyber-Security-left-con wow slideInLeft">
                        <div class="row Cyber-Security-left-main-con">
                            <div class="col-lg-6 col-md-6 col-sm-6 text-center">
                                <div class="Cyber-Security-left-card-con">
                                    <div class="Cyber-Security-left-card-img">
                                        <figure>
                                            <img src="/landing/image/Cyber-Security-left-card-img1.png"
                                                alt="Cyber-Security-left-card-img" class="img-fluid">
                                        </figure>
                                    </div>
                                    <div class="Cyber-Security-left-card-title">
                                        <h3 class="count">3329</h3>
                                        <p class="mb-0">Global Projects</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 text-center">
                                <div class="Cyber-Security-left-card-con">
                                    <div class="Cyber-Security-left-card-img">
                                        <figure>
                                            <img src="/landing/image/Cyber-Security-left-card-img2.png"
                                                alt="Cyber-Security-left-card-img" class="img-fluid">
                                        </figure>
                                    </div>
                                    <div class="Cyber-Security-left-card-title">
                                        <h3 class="count">4587</h3>
                                        <p class="mb-0">Clients Protect</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 text-center">
                                <div class="Cyber-Security-left-card-con">
                                    <div class="Cyber-Security-left-card-img">
                                        <figure>
                                            <img src="/landing/image/Cyber-Security-left-card-img3.png"
                                                alt="Cyber-Security-left-card-img" class="img-fluid">
                                        </figure>
                                    </div>
                                    <div class="Cyber-Security-left-card-title">
                                        <h3 class="count d-inline-block">100</h3>
                                        <span class="text-white static-txt2">%</span>
                                        <p class="mb-0">Service Guarantee</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 text-center">
                                <div class="Cyber-Security-left-card-con mb-0">
                                    <div class="Cyber-Security-left-card-img">
                                        <figure>
                                            <img src="/landing/image/Cyber-Security-left-card-img4.png"
                                                alt="Cyber-Security-left-card-img" class="img-fluid">
                                        </figure>
                                    </div>
                                    <div class="Cyber-Security-left-card-title position-relative d-inline-block">
                                        <h3 class="count">7845</h3>
                                        <span class="text-white position-absolute static-txt">+</span>
                                        <p class="mb-0">Expert Networkers</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 Cyber-Security-right-con wow slideInRight">
                        <div class="Cyber-Security-right-heading-con">
                            <h5>Statistics</h5>
                            <h2>Back Business of CryptSence
                            </h2>
                            <p>We standby our motto "To inspire & nurture leaders of tomorrow" where we diligently focus on
                                educating our members on the specifics knowledge of blockchain as well as cryptocurrency.
                                Let us have the oppurtunity to aspire you through this journey where we will breakdown the
                                theories of digital technologies.
                            </p>
                            <a href="{{ route('register') }}" class="contact-btn">Get started</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!---Cyber-Security-section-->
    <!-- Pricing-section -->
    <section>
        <div class="Pricing-con dots-left-img">
            <div class="container overlay-content">
                <div class="Pricing-title text-center">
                    <h5>What we offer</h5>
                    <h2>Our Flexible Pricing Plans</h2>
                </div>
                <div class="row wow fadeInUp">
                    @foreach ($plans as $plan)
                        <div class="col-lg-4 col-md-4 col-12 mb-lg-0 mb-md-0 mb-4 Pricing-box-main-con mt-3">
                            <div class="Pricing-box-con">
                                <div class="Pricing-box-img text-center">
                                    <figure>
                                        <img src="/landing/image/pricing-box-img1.png" alt="pricing-box-img"
                                            class="img-fluid">
                                    </figure>
                                </div>
                                <div class="Pricing-box-heading text-center">
                                    <h4>{{ $plan->name }}</h4>
                                    <h2>${{ number_format( $plan->price,2 ) }}</h2>
                                </div>
                                <div class="Pricing-box-list text-xl-left text-lg-left text-md-left text-center">
                                    <ul class="list-unstyled list">
                                        <li><i class="fas fa-check-circle"></i>Instant Deposit / Withdraw.</li>
                                        <li><i class="fas fa-check-circle"></i>Profit: ${{ $plan->profit }}%.</li>
                                        <li><i class="fas fa-check-circle"></i>$20 Min Withdraw</li>
                                    </ul>
                                </div>
                                <div class="Pricing-box-link text-center">
                                    <a href="{{ route('register') }}" class="contact-btn">Get started</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- Pricing-section -->
    <!-- get-start-section-->
    <section>
        <div class="get-start-con bg-overly-img ">
            <div class="container overlay-content">
                <div class="get-start-title text-center">
                    <h1>Ready To Get Started?
                        We're Here To Help.
                    </h1>
                    <div class="get-start-link text-center">
                        <a href="{{ route('user.support.create') }}" class="contact-btn">Contact us</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- get-start-section-->
@endsection
