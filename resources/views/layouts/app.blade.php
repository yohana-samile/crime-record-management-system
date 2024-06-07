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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    @php
        use Illuminate\Support\Facades\DB;
        $userId = Auth::user()->id;
        $userRole = DB::select("SELECT roles.name as role_name, users.id from roles, users where users.role_id = roles.id and users.id = '$userId' ");
        $userRole = $userRole[0];
    @endphp
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
                    @if ($userRole->role_name !== 'is_crime_reporter')
                        <li>
                            <a href="{{url('user')}}" class="text-decoration-none"><span class="fa fa-user mr-3"></span> Police Staff</a>
                        </li>
                        <li>
                            <a href="{{url('reporter')}}" class="text-decoration-none"><span class="fa fa-user mr-3"></span> Reportes</a>
                        </li>
                    @endif
                    @if ($userRole->role_name === 'is_crime_reporter')
                        <li>
                            <a href="{{ url('report_new_crime')}}" class="text-decoration-none"><span class="fa fa-briefcase mr-3"></span> Report Crime</a>
                        </li>
                    @endif
                    <li>
                        <a href="{{url ('case_reported')}}" class="text-decoration-none"><span class="fa fa-sticky-note mr-3"></span> Crime Reported</a>
                    </li>

                    @if ($userRole->role_name !== 'is_crime_reporter')
                        <li>
                            <a href="{{url('index')}}" class="text-decoration-none"><span class="fa fa-suitcase mr-3"></span> Roles</a>
                        </li>
                        <li>
                            <a href="{{url('crimeTypes/index')}}" class="text-decoration-none"><span class="fa fa-cogs mr-3"></span> Case Type</a>
                        </li>
                    @endif
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
