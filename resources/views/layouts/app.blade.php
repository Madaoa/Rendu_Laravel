<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- BALISE META -->
    <meta property="og:url"           content="{{url()->current()}}" />
    <meta property="og:type"          content="Laravel" />
    <meta property="og:title"         content="Rendu laravel" />
    <meta property="og:description"   content="Ceci est un petit test du rendu laravel" />
    <meta property="og:image"         content="https://choualbox.com/Img/1487082415346.png" />
</head>

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
<link href="/css/scratch.css" rel="stylesheet">
<link rel="stylesheet" href="/css/font-awesome.css">


    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>
<body>
<div id="fb-root"></div>
<script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/fr_FR/sdk.js#xfbml=1&version=v2.8";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
<div id="app">
    <div id="navigation_bar">
        <div class="container top">
            <div id="navigation">

                <!-- Right Side Of Navbar -->
                <ul id="menu-main" class="menu">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ route('login') }}">Login</a></li>
                        <li><a href="{{ route('register') }}">Register</a></li>
                    @else
                        <li><a href="{{ url('/home') }}"class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-99">Home</a></li>
                        <li><a href="{{ url('/article') }}" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-99">Blog</a></li>
                        <li><a href="{{ url('/article/create') }}" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-99">Publier</a></li>
                        <li><a href="{{ url('/user') }}" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-99">Profil</a></li>
                        <li><a href="{{ url('/contact') }}" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-99">Contact</a></li>
                        @if (Auth::user()->isAdmin == 1)
                            <li><a href="{{ url('/admin') }}">Administration</a></li>
                        @endif
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                               aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                          style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
</div>
            @yield('content')

<!-- Scripts -->
<script src="/js/app.js"></script>
</body>
</html>
