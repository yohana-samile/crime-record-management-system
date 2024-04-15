<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Crime Record Management System') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ ('Crime Record Management System') }}
            </a>
            <a href="{{ url('login')}}" class="btn btn-primary btn-sm">{{__("Login To View Your Report Info")}}</a>
        </div>
    </nav>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card">
                    <div class="card-header text-center">{{ __('Report Crime And Get Free Registration ') }}</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="mb-3">
                                <label for="region" class="col-form-label text-md-end">{{ __('Enter discription (this field is option)') }}</label>
                                <textarea name="case_discription" id="case_discription" class="form-control" cols="5" rows="5"></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="crime_type" class="col-form-label text-md-end">{{ __('Choose crime_type') }}</label>
                                <select name="crime_type" id="crime_type" class="form-control">
                                    <option hidden selected disabled>Choose Crime Type</option>
                                    <option value=""></option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="region" class="col-form-label text-md-end">{{ __('Region You Report') }}</label>
                                <input id="region" type="text" class="form-control" name="region" required>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="district" class="col-form-label text-md-end">{{ __('District') }}</label>
                                    <input id="district" type="text" class="form-control" name="district" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="ward" class="col-form-label text-md-end">{{ __('Ward') }}</label>
                                    <input id="ward" type="text" class="form-control" name="ward" required>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="name" class="col-form-label text-md-end">{{ __('Enter Full Name') }}</label>
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="password" class="col-form-label text-md-end">{{ __('Password') }}</label>
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="password-confirm" class="col-form-label text-md-end">{{ __('Confirm') }}</label>
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row mb-0">
                                <input type="submit" value="Report Crime & Register Me" class="form-control bg-primary text-white">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </body>
</html>
