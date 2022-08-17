@extends('site.layouts.master')
@section('page_name')
    مكاسـب | تسويق مجاني عبر وسائل التواصل الاجتماعي
@endsection
@section('site_css')
    @if(\Illuminate\Support\Facades\App::getLocale() == 'en')
        <link rel="stylesheet" href="{{asset('assets/site/css')}}/style.css" />
    @else
        <link rel="stylesheet" href="{{asset('assets/site/css')}}/style_ar.css" />
    @endif
@endsection
@section('content')
    <header>
    <nav class="navbar navbar-expand-lg navbar-light navTop">
        <div class="container">
            <a class="navbar-brand logo" href="#"><img class="LogoBrand" src="{{asset('assets/site/img')}}/logo.png" alt="" /></a>
            <button class="navbar-toggler" id="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-3 mb-lg-0 navTopLink">
                    <li class="nav-item">
                        <a class="nav-link active me-3" data-scroll="Home" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link me-3" data-scroll="Services" href="#">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link me-3" data-scroll="About" href="#">About Us</a>
                    </li>
                    <li class="nav-item me-3">
                        <a class="nav-link" data-scroll="Features" href="#">Features</a>
                    </li>
                    <li class="nav-item me-5">
                        <a class="nav-link" data-scroll="coins" href="#">coins</a>
                    </li>
                    <div class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
                           aria-expanded="false">
                            Select Language
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                <li>
                                    <a class="dropdown-item" rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                        {{ $properties['name'] }}
                                    </a>
                                </li>
                        @endforeach
                        </ul>
                    </div>
                </ul>
            </div>
        </div>
    </nav>
    <nav class="navbar nav2 forAll">
        <div class="container">
            <img class="LogoNav2" src="{{asset('assets/site/img')}}/logo.png" alt="" />
            <form action="{{route('postLogin')}}" method="post" class="Login">
                @csrf
                <div class="filedLogin">
                    <input type="email" required placeholder="Email" name="email" id="email" />
                    <input type="password" required name="password" placeholder="Password" />
                    <button type="submit" class="siadeButton"><a>Login </a></button>
                </div>
                <div class="remember d-flex justify-content-between">
                    <div>
                        <input type="checkbox" name="rememberMe" id="remember" />
                        <label class="text-black-50" for="remember">Remember</label>
                    </div>
                    <a class="text-black-50" href="testpassword.html">Forget password?</a>
                </div>
            </form>
            <div>
                <button class="mainButton X"><a href="{{route('register')}}">Registration </a></button>
            </div>
        </div>
    </nav>
    <!-- for Mobile W-769 -->
    <div class="LoginRight">
        <div class="close">
            <i class="fa-solid fa-xmark"></i>
        </div>
        <form action="" class="Login formRight">
            <div class="filedLogin">
                <input type="email" placeholder="Email" id="email" class="mb-2" />
                <input type="password" placeholder="Password" class="mb-1" />
                <div class="mb-3 ms-3">
                    <a class="text-black-50 fs-6" href="#">Forget password?</a>
                </div>
                <button class="siadeButton"><a href="">Login </a></button>
            </div>

        </form>
    </div>
    <nav class="navbar nav2 MobileNav">
        <div class="container">
            <div>
                <img class="LogoNav2" src="{{asset('assets/site/img')}}/logo.png" alt="" />
            </div>

            <div>
                <button class="mainButton"><a href="" class="showLoginRight">Login </a></button>
                <span class="or fs-4 ms-2">or</span>
                <button class="mainButton  ms-2"><a href="Registration.html">Registration </a></button>
            </div>
        </div>
    </nav>
    <!--  -->
</header>
<section class="section" id="Home">
    <div id="carouselExampleDark" class="carousel carousel-dark slide container" data-bs-ride="carousel">
        <div class="carousel-indicators">
            @foreach($data['sliders'] as $slider)
            <button type="button" {{($loop->first == 'true') ? 'class=active' : ''}} data-bs-target="#carouselExampleDark" data-bs-slide-to="{{$loop->iteration-1}}" aria-label="Slide {{$loop->iteration}}"></button>
            @endforeach
        </div>
        <div class="carousel-inner">
            @foreach($data['sliders'] as $slider)
            <div class="row carousel-item {{($loop->first == 'true') ? 'active' : ''}} align-items-center justify-content-center" data-bs-interval="20000">
                <div class="col-lg-6 col-md-6 col-sm-12 mb-5">
                    <img src="{{asset($slider->image)}}" alt="" />
                </div>
                <div class="col-md-6 col-sm-12 homeInfo">
{{--                    <h1 class="fs-4 fw-bold">--}}
{{--                        <span class="Makasb fs-2">Makasb</span> is a network that will--}}
{{--                        help you grow your social presence.--}}
{{--                    </h1>--}}
                    <p class="fs-6 mt-lg-3 lh-base">
                        {!! $slider['desc_'.\Illuminate\Support\Facades\App::getLocale()] !!}
                    </p>
                    <button class="mainButton mb-5 mt-lg-3">
                        <a href="{{$slider->btn_link}}">{{$slider['btn_title_'.\Illuminate\Support\Facades\App::getLocale()]}}</a>
                    </button>
                </div>
            </div>
            <!--  -->
            @endforeach
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark"
                data-bs-slide="prev"></button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark"
                data-bs-slide="next"></button>
    </div>
</section>
<section class="section" id="Services">
    <div class="container">
        <div class="mainHeading text-center">
            <h1>
                <span>S</span>
                <span>E</span>
                <span>R</span>
                <span>V</span>
                <span>I</span>
                <span>C</span>
                <span>E</span>
                <span>S</span>
            </h1>
        </div>
        <style>
            .servicesBox i{
                font-size:50px;
                color: white;
            }
        </style>

        <div class="row">
            @foreach($data['services'] as $service)
            <div class="col-lg-4 col-md-6 col-sm-12 mt-5">
                <div class="servicesBox">
                    <div class="circle">
                        <i class="fa-solid fa-circle right"></i>
                        <i class="fa-solid fa-circle left"></i>
                    </div>
                    <div>
                        <div>
                            <i class="{{$service->icon}}"></i>
                            <h3>{{$service['title_'.\Illuminate\Support\Facades\App::getLocale()]}}</h3>
                        </div>
                        <p>
                            {{$service['desc_'.\Illuminate\Support\Facades\App::getLocale()]}}
                        </p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<section class="section" id="About">
    <div class="container">
        <div class="mainHeading text-center">
            <h1>
                <span>A</span>
                <span>B</span>
                <span>O</span>
                <span>U</span>
                <span>T</span>
                <span class="space"></span>
                <span>U</span>
                <span>S</span>
            </h1>
        </div>
        <div class="row align-items-center justify-content-center">
            <div class="col-lg-6 col-md-12">
                <img src="{{asset($data['about']['image'])}}" alt="" />
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="aboutBox">
                    <h4 class="fs-1">
                        {{$data['about']['title_'.\Illuminate\Support\Facades\App::getLocale()]}}
                    </h4>
                    <p class="fs-6 lh-base text-black-50">
                        {!! $data['about']['desc_'.\Illuminate\Support\Facades\App::getLocale()] !!}
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="section" id="Features">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-sm-12">
                <img src="{{asset('assets/site/img')}}/Social networking-cuate.svg" alt="" />
            </div>
            <div class="col-lg-6 col-sm-12">
                <div class="FeaturesBox">
                    <div class="linkSocial">
                        <button class="mainButton3 active me-5 mb-3 " data-show="Facebook">Facebook</button>
                        <button class="mainButton3  me-5 mb-3 " data-show="Twitter">Twitter</button>
                        <button class="mainButton3  me-5 mb-3 " data-show="Instagram">Instagram</button>
                        <button class="mainButton3  me-5 mb-3 " data-show="YouTube">YouTube</button>
                    </div>
                    <div class="pt-3">
                        <div class="facebook active" id="Facebook">
                            <h2 class="fs-4">
                                Get <span class="social">FREE</span> Facebook Likes,
                                Followers, Share
                            </h2>
                            <p class="lh-base">
                                Facebook is the fastest growing and most renowned social
                                network of the world, With the help of Makasb, you can gain
                                thousands of likes, followers and shares ABSOLUTELY FOR
                                FREE.
                            </p>
                            <ul>
                                <li>
                                    <i class="fa-solid fa-square-check"></i> Facebook Likes
                                    Page <span class="text-black-50">or</span> Post
                                </li>
                                <li class="mt-2">
                                    <i class="fa-solid fa-square-check"></i> Facebook Share
                                    Page <span class="text-black-50">or</span> Post
                                </li>
                                <li class="mt-2">
                                    <i class="fa-solid fa-square-check"></i> Facebook
                                    Followers
                                </li>
                            </ul>
                        </div>
                        <div class="Instagram" id="Instagram">
                            <h2 class="fs-4">
                                Get <span class="social">FREE</span> FInstagram Followers
                                and Instagram Photo Likes
                            </h2>
                            <p class="lh-base">
                                Instagram is one of the shortest and funniest ways to share
                                your life events with friends through various pictures.
                                Makasb will help you to get more Instagram followers and
                                also likes for your Instagram photos
                            </p>
                            <ul>
                                <li>
                                    <i class="fa-solid fa-square-check"></i> Instagram
                                    Followers
                                </li>
                                <li class="mt-2">
                                    <i class="fa-solid fa-square-check"></i> Instagram Photo
                                    Likes
                                </li>
                            </ul>
                        </div>
                        <div class="Twitter" id="Twitter">
                            <h2 class="fs-4">
                                Get <span class="social">FREE</span> Twitter Followers,
                                Tweets, reTweets and Likes
                            </h2>
                            <p class="lh-base">
                                Twitter is one of the greatest ways to keep in touch with
                                people, to express your feelings, and to be informed of
                                everything. Consequently, it's crucial for You to be active
                                on Twitter as much as possible and to have many followers.
                            </p>
                            <ul>
                                <li>
                                    <i class="fa-solid fa-square-check"></i> Twitter Followers
                                </li>
                                <li class="mt-2">
                                    <i class="fa-solid fa-square-check"></i> Twitter Tweets
                                </li>
                                <li class="mt-2">
                                    <i class="fa-solid fa-square-check"></i> Twitter Likes
                                </li>
                                <li class="mt-2">
                                    <i class="fa-solid fa-square-check"></i> Twitter reTweets
                                </li>
                            </ul>
                        </div>
                        <div class="YouTube" id="YouTube">
                            <h2 class="fs-4">
                                Get <span class="social">FREE</span> YouTube Views,
                                Subscribers, Likes
                            </h2>
                            <p class="lh-base">
                                If you have a video on the world's biggest video platform:
                                YouTube, you have also a great chance to promote your video
                                receiving views, likes and favorites. Makasb gives you also
                                the opportunity to increase the amount of your YouTube
                                channel subscribers. And what's the important thing is that
                                You can get all this for free , with quality and in the
                                fastest way
                            </p>
                            <ul>
                                <li>
                                    <i class="fa-solid fa-square-check"></i> YouTube Views
                                </li>
                                <li class="mt-2">
                                    <i class="fa-solid fa-square-check"></i> YouTube Subscribe
                                </li>
                                <li class="mt-2">
                                    <i class="fa-solid fa-square-check"></i> YouTube Video
                                    Likes
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--  -->
<section class="section FeaturesTwo">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-lg-6 col-sm-12">
                <img src="{{asset('assets/site/img')}}/fomo-not-css.svg" alt="" />
            </div>
            <div class="col-lg-6 col-sm-12">
                <div class="FeaturesBox">
                    <div class="linkSocial">
                        <button class="mainButton3 active me-5 mb-3 " data-show="Pinterest">Pinterest</button>
                        <button class="mainButton3  me-5 mb-3 " data-show="SoundCloud">SoundCloud</button>
                        <button class="mainButton3  me-5 mb-3 " data-show="VK">VK</button>
                    </div>
                    <div class="pt-3">
                        <div class="facebook" id="Pinterest">
                            <h2 class="fs-4">
                                Get <span class="social">FREE</span> Pinterest Followers and Saves
                            </h2>
                            <p class="lh-base">
                                Pinterest is a tool for gathering and arranging things you are fond of. Thousands of people use
                                Pinterest in their daily life and work. Tastes differ, but no matter, you will find everything you are
                                interested in there. So hurry up to have lots of Followers and Saves via Makasb.
                            </p>
                            <ul>
                                <li>
                                    <i class="fa-solid fa-square-check"></i>Pinterest Followers
                                </li>
                                <li class="mt-2">
                                    <i class="fa-solid fa-square-check"></i>Pinterest Save
                                </li>
                            </ul>
                        </div>
                        <div class="Instagram" id="VK">
                            <h2 class="fs-4">
                                Get <span class="social">FREE</span> FInstagram Followers
                                and Instagram Photo Likes
                            </h2>
                            <p class="lh-base">
                                As we know, VK (Originally VKontakte, Russian: ВКонтакте) is the second biggest social network in
                                Europe after Facebook. As one of the famous social networks, it allows users to send public and
                                private messages to their contacts. Using VK you can create groups, events, and public pages, share
                                and tag images, audio, and video, and play browser-based games. On Makasb you can get free VK Page
                                Followers and VK Group Members
                            </p>
                            <ul>
                                <li>
                                    <i class="fa-solid fa-square-check"></i>VK Page Followers
                                </li>
                                <li class="mt-2">
                                    <i class="fa-solid fa-square-check"></i> VK Group Members
                                    Likes
                                </li>
                            </ul>
                        </div>
                        <div class="Twitter" id="SoundCloud">
                            <h2 class="fs-4">
                                Get <span class="social">FREE</span>SoundCloud Followers, Likes and Music Plays
                            </h2>
                            <p class="lh-base">
                                SoundCloud is the number one social sound platform where you have an opportunity to create your own
                                sounds and share them with everybody. By recording and uploading sounds to SoundCloud people can
                                easily share them with their friends and also share with the public: on different blogs, sites, and
                                social networks. Using Makasb, Here are some features that suggest Makasb for SoundCloud:
                            </p>
                            <ul>
                                <li>
                                    <i class="fa-solid fa-square-check"></i> SoundCloud Followers
                                </li>
                                <li class="mt-2">
                                    <i class="fa-solid fa-square-check"></i> SoundCloud Likes
                                </li>
                                <li class="mt-2">
                                    <i class="fa-solid fa-square-check"></i> SoundCloud Music Plays
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--  -->
<section id="coins" class="section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-sm-12">
                <img src="{{asset('assets/site/img')}}/Rocket-amico.svg" alt="" />
            </div>
            <div class="col-lg-6 col-sm-12">
                <div class="coinsBox">
                    <h3 class="fs-4 lh-base">
                        Easily Exchange Your Makasb Points for Valuable AMF Tokens - Do
                        This TODAY Before Value Skyrockets
                    </h3>
                    <p class="lh-base text-black-50">
                        The world is rapidly transitioning to borderless cryptocurrency.
                        Millions of people in countless countries now prefer to buy,
                        pay, and invest in smart crypto that keeps their identity
                        private and secure.
                    </p>
                </div>
                <div class="coinsBox pt-3">
                    <h3 class="fs-4 lh-base">
                        Makasb has made our new AMF Tokens extremely EASY to buy and
                        use.
                    </h3>
                    <p class="lh-base text-black-50">
                        Tokens will rapidly increase in value as they are hotly promoted
                        on social media, via email, and many other channels. This is
                        your chance to get in on the ground floor of what may become a
                        historic investment opportunity.
                    </p>
                </div>
                <button class="mainButton mb-5 mt-lg-3">
                    <a href="Registration.html">Registration</a>
                </button>
            </div>
        </div>
    </div>
</section>

@endsection
@section('site_js')
    <script src="{{asset('assets/site/JS')}}/main.js"></script>
@endsection

