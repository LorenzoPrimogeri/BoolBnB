<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.0.0-alpha.1/axios.min.js"
        integrity="sha512-xIPqqrfvUAc/Cspuj7Bq0UtHNo/5qkdyngx6Vwt+tmbvTLDszzXM0G6c91LXmGrRx8KEPulT+AfOOez+TeVylg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Boolbnb</title>

    <link rel='stylesheet' type='text/css'
        href='https://api.tomtom.com/maps-sdk-for-web/cdn/plugins/SearchBox/3.1.3-public-preview.0/SearchBox.css' />
    <script src="https://api.tomtom.com/maps-sdk-for-web/cdn/6.x/6.1.2-public-preview.15/services/services-web.min.js">
    </script>
    <script src="https://api.tomtom.com/maps-sdk-for-web/cdn/plugins/SearchBox/3.1.3-public-preview.0/SearchBox-web.js">
    </script>

    <script>
        (function() {
            window.SS = window.SS || {};
            SS.Require = function(callback) {
                if (typeof callback === 'function') {
                    if (window.SS && SS.EventTrack) {
                        callback();
                    } else {
                        var siteSpect = document.getElementById('siteSpectLibraries');
                        var head = document.getElementsByTagName('head')[0];
                        if (siteSpect === null && typeof head !== 'undefined') {
                            siteSpect = document.createElement('script');
                            siteSpect.type = 'text/javascript';
                            siteSpect.src = '/__ssobj/core.js+ssdomvar.js+generic-adapter.js';
                            siteSpect.async = true;
                            siteSpect.id = 'siteSpectLibraries';
                            head.appendChild(siteSpect);
                        }
                        if (window.addEventListener) {
                            siteSpect.addEventListener('load', callback, false);
                        } else {
                            siteSpect.attachEvent('onload', callback, false);
                        }
                    }
                }
            };
        })();
    </script>
    <!-- Scripts -->
    {{-- <script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script> --}}
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script> --}}
    {{-- <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script> --}}
    <script src="{{ asset('js/client-validate-reg.js') }}"></script>
    <script src="{{ asset('js/dropDwn-menu.js') }}"></script>
    <script src="{{ asset('js/check-password-equal.js') }}"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/search.js') }}" defer></script>
    <script src="{{ asset('js/validation-check.js') }}" defer></script>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!-- Styles -->
    <link href="{{ asset('css/dropDwn-menu.css') }}" rel="stylesheet">
    <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">
    <link href="{{ asset('css/btn-burger.css') }}" rel="stylesheet">
    <link href="{{ asset('css/menuSlide.css') }}" rel="stylesheet">
    <link href="{{ asset('css/searchstyle.css') }}" rel="stylesheet">

</head>

<body>
    <div id="app">
        <div class="subMenu closeMenu" id="subMenuSlide" style="filter: progid:DXImageTransform.Microsoft.Shadow(color='#dedede', Direction=135, Strength=10);
-webkit-overflow-scrolling:touch;">
            <div class="contSubMenuSlide">
                <div class="cnt-ul">
                    <ul>
                        <li>
                            <div class="ico aprt"></div><a href="{{ route('admin.apartments.index') }}">Dashboard</a>
                        </li>
                        <li>
                            <div class="ico msg"></div><a href="#">Messaggi</a>
                        </li>
                        <li>
                            <div class="ico ads"></div><a href="#">Sponsorizzate</a>
                        </li>
                        <li>
                            <div class="ico stcs"></div><a href="#">Statistiche</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <header>
            <div class="container wmax-100 h-100 pd-20-lr">
                <div class="cnt-hdr-items">
                    <div class="col-2 col-xs-12">
                        <div class="cnt-logo">
                            <a href="#">
                                <img src="{{ url('/img/boolbnb-logo.svg') }}" alt="logo">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="main-usr-set">
                    <ul class="ul-log-reg">
                        <!-- Authentication Links -->
                        @guest
                        <a href="{{ route('login') }}">
                            <li>
                                <div class="ico-log ico-login"></div>
                                <span>Login</span>
                            </li>
                        </a>
                        @if(Route::has('register'))
                        <a href="{{ route('register') }}">
                            <li>
                                <div class="ico-log ico-reg"></div>
                                <span>Register</span>
                            </li>
                        </a>
                        @endif
                        @else
                        <div class="cnt-usr-set">
                            <div class="cnt-span">
                                @if( Auth::user()->name)
                                <span>{{ Auth::user()->name }}</span>
                                @else
                                <span>{{ Auth::user()->email }}</span>
                                @endif
                                <a id="arrowUsr" href="#">
                                    <div class="cnt-arrow">
                                        <span class="arrow"></span>
                                    </div>
                                </a>
                            </div>
                            <div id="subMenuUsr" class="contUlAccount">
                                <ul class="ulSet-usr">
                                    <li>
                                        <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            class="d-none">
                                            @csrf
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        @endguest
                    </ul>
                </div>
                <div id="btn-hamburger" class="d-none">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
        </header>
        <main>
            <div class="sidebar">
                <div class="cnt-ul">
                    <ul>
                        <li>
                            <div class="ico aprt"></div><a href="{{ route('admin.apartments.index') }}">Dashboard</a>
                        </li>
                        <li>
                            <div class="ico msg"></div><a href="#">Messaggi</a>
                        </li>
                        <li>
                            <div class="ico ads"></div><a href="#">Sponsorizzate</a>
                        </li>
                        <li>
                            <div class="ico stcs"></div><a href="#">Statistiche</a>
                        </li>
                    </ul>
                </div>
            </div>
            @yield('content')
        </main>
        @stack('input-validation')
    </div>

</body>

</html>
