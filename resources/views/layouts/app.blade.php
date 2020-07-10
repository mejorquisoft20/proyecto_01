<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Facturacion</title>
    <link href="{{asset('/css/bootstrap.css')}}" rel="stylesheet">
    <link href={{asset("/css/styles.css")}} rel="stylesheet" />
    <link href={{asset("/css/login.css" )}} rel="stylesheet">
    <script src={{asset("/js/iconos.js")}} ></script>
</head>
<body style="background-color: #726f6f">
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">             
                @if(!\Request::is('/') && !\Request::is('register')  && !\Request::is('login') )  
                    <a class="navbar-brand" href="{{ url('/home') }}"><i class="fa fa-home"></i>&nbsp;INICIO</a>
                    {{-- <a class="navbar-brand" href="{{ url('/clients') }}">Clientes</a>
                    <a class="navbar-brand" href="{{ url('/clients') }}">Ventas</a> --}}
                    <a class="navbar-brand" href="{{ url('/clientes') }}"><i class="fa fa-user"></i>&nbsp;CLIENTES</a>
                @endif
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Iniciar Sesion') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Registrar') }}</a>
                                </li>
                            @endif
                            @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Cerrar sesion') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                           
                           
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
       
        <div id="layoutSidenav">
        
            <div id="layoutSidenav_content"><br>
            @yield('content')
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Facturacion 2020</div>
                            <div>
                                <a href="#">Politica privacidad</a>
                                &middot;
                                <a href="#">Terminos &amp; Condiciones</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
    </div>
    </div>
 
     <script src={{asset("/js/jquery.min.js")}}></script>
     <script src={{asset("/js/bootstrap.bundle.min.js")}}></script>
     <script src={{asset("/js/bootstrap.min.js")}}></script>
     
        <!--buscar cliente-->
        <script src={{asset("/js/jquery.dataTables.min.js")}} ></script>
        <script src={{asset("/js/style_search.js")}}></script>
        <script src={{asset("/js/cliente/datatables-demo.js")}}></script>

</body>
</html>
