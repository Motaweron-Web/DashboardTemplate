<header>
    <nav class="navbar navbar-expand-xxl navbar-light navTop homenav">
        <div class="container ">
            <a class="navbar-brand logo ms-3" href="#"
            ><img class="LogoBrand" src="{{asset('assets/site/img')}}/logo.png" alt=""
                /></a>
            <button
                class="navbar-toggler togglers"
                id="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent"
                aria-expanded="false"
                aria-label="Toggle navigation"
            >
                <i class="fa-solid fa-bars-staggered"></i>

            </button>
            <div class="collapse navbar-collapse " id="navbarSupportedContent">
                <ul class="navbar-nav mx-auto mb-3 mb-lg-0 navTopLink  ">
                    <li class="nav-item ">
                        <a
                            class="nav-link me-3"
                            data-scroll="Home"
                            aria-current="page"
                            href="{{route('MySites')}}"
                        >My Sites</a
                        >
                    </li>
                    <li class="nav-item me-3 ">
                        <a class="nav-link" data-scroll="Features" href="{{route('subscription')}}">Subscription</a>
                    </li>
                    <li class="nav-item me-3 ">
                        <a class="nav-link" data-scroll="coins" href="{{route('buyPoints')}}">Buy Points</a>
                    </li>
                    <li class="nav-item dropdown ">
                        <a
                            class="nav-link dropdown-toggle Facebook"
                            href="#"
                            id="navbarDropdown"
                            role="button"
                            data-bs-toggle="dropdown"
                            aria-expanded="false"
                        >
                            <i class="fa-brands fa-facebook-square me-1"></i>Facebook
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="{{route('facebookShare')}}">Facebook Share</a></li>
                            <li>
                                <a class="dropdown-item" href="{{route('facebookFollowers')}}">Facebook Followers</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{route('facebookPostLike')}}">Facebook Post Like</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{route('facebookPostShare')}}">Facebook Post Share</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown ">
                        <a
                            class="nav-link dropdown-toggle Instagram"
                            href="#"
                            id="navbarDropdown"
                            role="button"
                            data-bs-toggle="dropdown"
                            aria-expanded="false"
                        >
                            <i class="fa-brands fa-instagram me-1"></i>Instagram
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li>
                                <a class="dropdown-item" href="{{route('instagram.followers')}}">Instagram Followers</a>
                            </li>
                            <li><a class="dropdown-item" href="{{route('instagram.likes')}}">Instagram Like</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown ">
                        <a
                            class="nav-link dropdown-toggle Twitter"
                            href="#"
                            id="navbarDropdown"
                            role="button"
                            data-bs-toggle="dropdown"
                            aria-expanded="false"
                        >
                            <i class="fa-brands fa-twitter me-1"></i>Twitter
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="{{route('twitter.tweets')}}">Twitter Tweets</a></li>
                            <li>
                                <a class="dropdown-item" href="{{route('twitter.followers')}}">Twitter Followers</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{route('twitter.retweets')}}">Twitter Retweets</a>
                            </li>
                            <li><a class="dropdown-item" href="{{route('twitter.likes')}}">Twitter Likes</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown ">
                        <a
                            class="nav-link dropdown-toggle YouTube"
                            href="#"
                            id="navbarDropdown"
                            role="button"
                            data-bs-toggle="dropdown"
                            aria-expanded="false"
                        >
                            <i class="fa-brands fa-youtube me-1"></i>YouTube
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li>
                                <a class="dropdown-item" href="{{route('youtube.index','subscribe')}}">YouTube Subscribe</a>
                            </li>
                            <li><a class="dropdown-item" href="{{route('youtube.index','likes')}}">YouTube Likes</a></li>
                            <li><a class="dropdown-item" href="{{route('youtube.index','views')}}">YouTube Views</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown ">
                        <a
                            class="nav-link dropdown-toggle TikTok"
                            href="#"
                            id="navbarDropdown"
                            role="button"
                            data-bs-toggle="dropdown"
                            aria-expanded="false"
                        >
                            <i class="fa-brands fa-tiktok me-1"></i>TikTok
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li>
                                <a class="dropdown-item" href="{{route('tiktok.index','followers')}}">TikTok Followers</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{route('tiktok.index','likes')}}">TikTok Video Likes</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown ">
                        <a
                            class="nav-link dropdown-toggle SoundCloud"
                            href="#"
                            id="navbarDropdown"
                            role="button"
                            data-bs-toggle="dropdown"
                            aria-expanded="false"
                        >
                            <i class="fa-brands fa-soundcloud me-1"></i>SoundCloud
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li>
                                <a class="dropdown-item" href="{{route('soundcloud.index','likes')}}">SoundCloud Likes</a>
                            </li>
                            <li>
                                <a class="dropdown-item " href="{{route('soundcloud.index','follows')}}">SoundCloud Follow</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{route('soundcloud.index','plays')}}">SoundCloud Plays</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown ">
                        <a
                            class="nav-link dropdown-toggle"
                            href="#"
                            id="navbarDropdown"
                            role="button"
                            data-bs-toggle="dropdown"
                            aria-expanded="false"
                        >
                            Other
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item " href="{{route('otherSites.index','redditUpvotes')}}">Reddit Upvotes</a></li>
                            <li><a class="dropdown-item" href="{{route('otherSites.index','redditMembers')}}">Reddit Members</a></li>
                            <li>
                                <a class="dropdown-item" href="{{route('otherSites.index','telegram')}}">Telegram Channels</a>
                            </li>
                            <li><a class="dropdown-item" href="{{route('otherSites.index','pinterestSave')}}">Pinterest Save</a></li>
                            <li>
                                <a class="dropdown-item" href="{{route('otherSites.index','pinterestFollowers')}}">Pinterest Followers</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{route('otherSites.index','vkontakteGroups')}}">Vkontakte Groups</a>
                            </li>
                            <li><a class="dropdown-item" href="{{route('otherSites.index','vkontaktePages')}}">Vkontakte Pages</a></li>
                            <li>
                                <a class="dropdown-item" href="{{route('otherSites.index','okGroup')}}">OK.ru Group Join</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{route('otherSites.index','Reverbnation')}}">Reverbnation Fans</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>


        </div>
    </nav>
</header>
