<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ url('css/style.css')}}">
    <link rel="stylesheet" href="{{ url('datatables/dataTables.bootstrap4.min.css')}}">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div class="wrapper d-flex align-items-stretch">
        <nav id="sidebar">
            <div class="custom-menu">
                <button type="button" id="sidebarCollapse" class="btn btn-primary">
                    <i class="fa fa-bars"></i>
                    <span class="sr-only">Toggle Menu</span>
                </button>
            </div>
            <div class="p-4">
                <h1><a href="{{url('home')}}" class="logo">CRMS </a></h1>
                <ul class="list-unstyled components mb-5">
                    <li class="active">
                        <a href="{{url('home')}}" class="text-decoration-none"><span class="fa fa-home mr-3"></span> Home</a>
                    </li>
                    <li>
                        <a href="{{url('user')}}" class="text-decoration-none"><span class="fa fa-user mr-3"></span> Users</a>
                    </li>
                    <li>
                        <a href="{{url('reporter')}}" class="text-decoration-none"><span class="fa fa-user mr-3"></span> Reportes</a>
                    </li>
                    <li>
                        <a href="{{ url('report_new_crime')}}" class="text-decoration-none"><span class="fa fa-briefcase mr-3"></span> Report Crime</a>
                    </li>
                    <li>
                        <a href="{{url ('case_reported')}}" class="text-decoration-none"><span class="fa fa-sticky-note mr-3"></span> Crime Reported</a>
                    </li>
                    <li>
                        <a href="{{url('index')}}" class="text-decoration-none"><span class="fa fa-suitcase mr-3"></span> Roles</a>
                    </li>
                    <li>
                        <a href="{{url('crimeTypes/index')}}" class="text-decoration-none"><span class="fa fa-cogs mr-3"></span> Case Type</a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();"> <span class="fa fa-lock mr-3"></span>{{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                </ul>
            </div>
        </nav>

        <!-- Page Content  -->
        <div id="content" class="p-4 p-md-5 pt-5">
            <main class="py-4">
                @yield('content')
            </main>
        </div>

    </div>
    {{-- <div id="app"> --}}
        {{-- <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav> --}}

    {{-- </div> --}}

    <script src="{{ url('js/jquery.min.js')}}"></script>
    <script src="{{ url('js/bootstrap.min.js')}}"></script>
    <script src="{{ url('js/main.js')}}"></script>
    <script src="{{ url('js/custom.js')}}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    {{-- <script src="{{ url('datatables/dataTables.bootstrap4.min.js')}}"></script> --}}
    <script src="{{ url('datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{ url('js/demo/datatables-demo.js')}}"></script>

</body>
</html>
