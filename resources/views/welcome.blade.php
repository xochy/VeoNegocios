<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>VeoNegocios</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <link href="{{ asset('css/animation.css') }}" rel="stylesheet">

        <style>
            html, body {
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
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
                background: #fff;
                color: black;
                padding: 10px 25px;
                font-size: 13px;
                font-weight: 600;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }

            .home-main{
                background: #42a4f5;
                color:#fff;
                text-align: center;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height home-main">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Inicio</a>
                    @else
                        <a href="{{ route('login') }}">Ingreso</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Registro</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md animated pulse" style="font-size:10vw">
                    VeoNegocios<span class="blinker">.</span>com
                </div>

                <div class="links">
                    @guest
                        <a class="m-5" href="{{ url('/home') }}">Inicio</a>
                    @endguest
                    {{-- <a class="m-5" href="{{ route('categories.index') }}">Categorías</a>
                    <a class="m-5" href="{{ route('stores.index') }}">Negocios</a> --}}
                    <a class="m-5" href="{{ route('stores.loadFromCity', 'an') }}">Antúnez</a>
                    <a class="m-5" href="{{ route('stores.loadFromCity', 'ap') }}">Apatzingán</a>
                </div>
            </div>
        </div>
    </body>
</html>
