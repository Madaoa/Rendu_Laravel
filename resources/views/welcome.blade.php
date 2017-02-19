<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link href="/css/scratch.css" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
    <div id="app">
        <div id="navigation_bar">
            <div class="container top">
                <div id="navigation">

                    <!-- Right Side Of Navbar -->
                    <ul id="menu-main" class="menu">
                        @if (Route::has('login'))

                            @if (Auth::check())
                                <li><a href="{{ url('/home') }}"class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-99">Home</a></li>
                                <li><a href="{{ url('/article') }}" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-99">Blog</a></li>
                                <li><a href="{{ url('/article/create') }}" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-99">Publier</a></li>
                                <li><a href="{{ url('/user') }}" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-99">Profil</a></li>
                                <li><a href="{{ url('/contact') }}" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-99">Contact</a></li>
                            @else
                                <li><a href="{{ url('/login') }}">Connexion</a></li>
                                <li><a href="{{ url('/register') }}">Inscription</a></li>
                    @endif
                </div>
            </div>
        </div>

        @endif

        <div class="content">
            <div class="title m-b-md">
                <h1>Rendu Larevel</h1>
            </div>
        </div>
    </div>
    <div class="name">
        <p>Adam <strong>ALET</strong></p>
        <p>Jérémy <strong>BOUREL</strong></p>
    </div>
    </body>
</html>
