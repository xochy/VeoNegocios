<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('titulo', 'Inicio')</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script> 

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/categories/categoriesStyle.css') }}" rel="stylesheet">
    <link href="{{ asset('css/categories/uploadImage.css') }}" rel="stylesheet">

    <style type="text/css">
        form input[type="submit"]{
        
            background: none;
            border: none;
            color: blue;
            text-decoration: underline;
            cursor: pointer;
        }  

        .custom-file-input:lang(es)::before {
            content: "Elegir";
        } 

        html {
            height: 100%;
            box-sizing: border-box;
        }

        *,
        *:before,
        *:after {
            box-sizing: inherit;
        }

        body {
            position: relative;
            margin: 0;
            padding-bottom: 6rem;
            min-height: 100%;
            font-family: "Helvetica Neue", Arial, sans-serif;
        }
        
        .footer {
            position: absolute;
            right: 0;
            bottom: 0;
            left: 0;
            padding: 1rem;
            background-color: #efefef;
            text-align: center;
        }

        #map-canvas {
            height: 400px;  /* The height is 400 pixels */
            width: 100%;  /* The width is the width of the web page */
       }

       .card-product .img-wrap {
            border-radius: 3px 3px 0 0;
            overflow: hidden;
            position: relative;
            height: 167px;
            text-align: center;
        }
        .card-product .img-wrap img {
            max-height: 100%;
            max-width: 100%;
            object-fit: cover;
        }
        .card-product .info-wrap {
            overflow: hidden;
            padding: 15px;
            border-top: 1px solid #eee;
        }
        .card-product .bottom-wrap {
            padding: 15px;
            border-top: 1px solid #eee;
        }

        .label-rating { margin-right:10px;
            color: #333;
            display: inline-block;
            vertical-align: middle;
        }

        .card-product .price-old {
            color: #999;
        }

        hr {
            margin-top: 1rem;
            margin-bottom: 1rem;
            border: 0;
            border-top: 1px solid rgba(0, 0, 0, 0.1);
        }

        .colorFormRequiredIcon{
            color: red;
        }

        .profileImage{
            width: 500px; 
            height: 300px; 
            object-fit:cover;
        }

        .coverImage{
            width: 800px; 
            height: 250px; 
            object-fit:cover;
        }

        .panel-transparent{
            background: rgba(54, 58, 64, 0.3)!important;
        }

        .map{
            height:100% !important;
            width:100% !important;
        }

        * {
            border-radius: 0 !important;
        }

        .card-img {
            position: relative;
            overflow: hidden;
            border-radius: 0;
            z-index: 1;
        }

        .card-img img {
            width: 100%;
            height: auto;
            display: block;
        }

        .card-img span {
            position: absolute;
            top: 15%;
            left: 15%;
            background: #ff0000;
            padding: 6px;
            color: #fff;
            font-size: 16px;
            transform: translate(-50%,-50%);
        }
        
        .card-img span h4{
                font-size: 16px;
                margin:0;
                padding:10px 5px;
                line-height: 0;
        }
    </style>
     
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm fixed-top">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    VeoNegocios
                </a>

                {{-- Define la parte del boton cuando es pantalla movil --}}
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">

                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                        <li class="nav-item active">
                            <a class="nav-link" href="{{ route('home') }}">Inicio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('categories.index') }}">Categorías</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('stores.index') }}">Negocios</a>
                        </li>
                        {{-- <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                Dropdown
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="#">Categorías</a>
                                <a class="dropdown-item" href="#">Negocios</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Something else here</a>
                            </div>
                        </li> --}}
                    </ul>                  

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">

                        {{-- Formulario del buscador --}}
                        {{-- <li>
                            <form class="form-inline my-2 my-lg-0">
                                <input class="form-control mr-sm-2" type="search" placeholder="Buscar" aria-label="Search">
                                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
                            </form>
                        </li> --}}

                        <!-- Authentication Links -->
                        @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Ingreso</a>
                        </li>
                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">Registro</a>
                        </li>
                        @endif

                        @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            <div style="margin-top: 70px;" class="container">
                @yield('content')
            </div>
        </main>
    </div>

    <div class="footer">Forma parte de <strong>VeoNegocios</strong>.</div>
    <script src="https://kit.fontawesome.com/afe49aea92.js" crossorigin="anonymous"></script>    
</body>

</html>