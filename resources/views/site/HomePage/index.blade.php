@extends('site.layouts.master')
@section('page_name')
    مكاسـب | الصفحة الرئيسية
@endsection
@section('site_css')
    <link rel="stylesheet" href="{{asset('assets/site/css')}}/bootstrap.css"/>
    @if(\Illuminate\Support\Facades\App::getLocale() == 'en')
        <link rel="stylesheet" href="{{asset('assets/site/css')}}/homePage.css"/>
    @else
        <link rel="stylesheet" href="{{asset('assets/site/css')}}/homepage_ar.css"/>
    @endif
    @if(\Illuminate\Support\Facades\App::getLocale() == 'en')
        <link rel="stylesheet" href="{{asset('assets/site/css')}}/Conis.css"/>
    @else
        <link rel="stylesheet" href="{{asset('assets/site/css')}}/conis_ar.css"/>
    @endif
@endsection
@section('content')
    @include('site.layouts.social-navbar')
    <div class="MainPage d-flex">
        @include('site.HomePage.sidebar')
        <div class="Home">
            <div class="container">
                <div class="HomePageDetails">
                    <div class="welcomeMassage">
                        <div class="row align-items-center">
                            <div class="col-lg-6 col-md-12 col-sm-12">
                                <div class="typier">
                                    <h2>Welcome</h2>
                                    <span class="fs-5 text-black-50">To</span>
                                    <h3 class="typierEffect active" data-typier="Makasb"></h3>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12 col-sm-12">
                                <div>
                                    <img src="{{asset('assets/site/img')}}/Enthusiastic-amico.svg" alt=""/>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="pointsFree section">
                    <div class="mainHeading text-center">
                        <h1>
                            <span class="red">F</span>
                            <span class="red">R</span>
                            <span class="red">E</span>
                            <span class="red">E</span>
                            <span class="space"></span>
                            <span>P</span>
                            <span>O</span>
                            <span>I</span>
                            <span>N</span>
                            <span>T</span>
                            <span>S</span>
                        </h1>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-md-6 col-sm-12 mt-5">
                            <div class="servicesBox">
                                <div class="circle">
                                    <i class="fa-solid fa-circle right"></i>
                                    <i class="fa-solid fa-circle left"></i>
                                </div>
                                <div>
                                    <div>
                                        <i class="fa-solid fa-right-left"></i>
                                        <h3>FREE Exchange</h3>
                                    </div>
                                    <p>
                                        Get
                                        <span> Free </span>
                                        Points by liking - following others' pages - profiles and
                                        etc. You can get unlimited points and promote unlimited
                                        accounts and not spending even a single cent.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-12 mt-5">
                            <div class="servicesBox">
                                <div class="circle">
                                    <i class="fa-solid fa-circle right"></i>
                                    <i class="fa-solid fa-circle left"></i>
                                </div>
                                <div>
                                    <div>
                                        <i class="fa-solid fa-hand-point-down"></i>
                                        <h3>Daily Bonus Points</h3>
                                    </div>
                                    <p>
                                        We give Daily Active users Daily Bonus Points (400 and
                                        more daily bonus points for at least daily 100 clicks). So
                                        you can get Free Points and also Daily Bonus points.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-12 mt-5">
                            <div class="servicesBox">
                                <div class="circle">
                                    <i class="fa-solid fa-circle right"></i>
                                    <i class="fa-solid fa-circle left"></i>
                                </div>
                                <div>
                                    <div>
                                        <i class="fa-solid fa-user-plus"></i>
                                        <h3>Invite Your Friends</h3>
                                    </div>
                                    <p>
                                        Get
                                        <span> 300 </span>
                                        points by participating in our Affiliate Program. Share
                                        your short referral link anywhere (on your website, blog
                                        or on any social media platform) in order to be able to
                                        register new users on Makasb.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="pointsBuy section">
                    <div class="mainHeading text-center">
                        <h1>
                            <span class="red">B</span>
                            <span class="red">U</span>
                            <span class="red">Y</span>
                            <span class="space"></span>
                            <span>P</span>
                            <span>O</span>
                            <span>I</span>
                            <span>N</span>
                            <span>T</span>
                            <span>S</span>
                        </h1>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12 mt-5">
                            <div class="servicesBox">
                                <div class="circle">
                                    <i class="fa-solid fa-circle right"></i>
                                    <i class="fa-solid fa-circle left"></i>
                                </div>
                                <div>
                                    <div>
                                        <i class="fa-solid fa-money-bill-trend-up"></i>
                                        <h3 class="fs-">Special Offer</h3>
                                    </div>
                                    <p>
                                        You can spend less time on Makasb and can get a lot of
                                        likes - followers, if you buy points on Makasb. Currently
                                        we have Special Offer, so you can get 30% More Points .
                                        IMPORTANT: Do not buy accounts, or spend money for filling
                                        your account by others, because your account will be
                                        banned permanently and your links will not be transferred
                                        to any other account.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 mt-5">
                            <div class="servicesBox">
                                <div class="circle">
                                    <i class="fa-solid fa-circle right"></i>
                                    <i class="fa-solid fa-circle left"></i>
                                </div>
                                <div>
                                    <div>
                                        <i class="fa-solid fa-money-check-dollar"></i>
                                        <h3>Weekly Unlimited Points</h3>
                                    </div>
                                    <p>
                                        Weekly Unlimited Points - it's real! Buy weekly
                                        subscription to get unlimited points and promote your
                                        accounts for 50 CPC, that's the fastest way to get a lot
                                        of likes - followers at Makasb. Note: in subscription
                                        period, you can continue to get free points and
                                        participate in affiliate program without any problem.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
@section('site_js')
    <script src="{{asset('assets/site/JS')}}/homePage.js"></script>
    <script src="{{asset('assets/site/JS')}}/Conis.js"></script>
    <script>
        $("#navbar-toggler").on("click", function () {
            $(".navTop").toggleClass("active")
        })
    </script>
@endsection
