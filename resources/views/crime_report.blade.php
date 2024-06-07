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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
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
                        <form id="crime_report_action">
                            @csrf
                            <div class="mb-3">
                                <label for="region" class="col-form-label text-md-end">{{ __('Enter discription (this field is option)') }}</label>
                                <textarea name="case_discription" id="case_discription" class="form-control" cols="5" rows="5"></textarea>
                            </div>

                            <div class="mb-3">
                                <select name="crime_type_id" id="crime_type" class="form-control" required>
                                    <option selected disabled hidden>Choose Type Of Crime</option>
                                    @foreach ($crimes as $crime)
                                        <option value="{{ $crime->id }}">{{ $crime->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <select name="region" id="region" class="form-control" required>
                                    <option selected disabled hidden>Choose region</option>
                                    @foreach ($regions as $region)
                                        <option value="{{ $region->name }}">{{ $region->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <select name="district" id="district" class="form-control" required disabled>
                                    <option selected disabled hidden>Choose district</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <select name="ward" id="ward" class="form-control" required disabled>
                                    <option selected disabled hidden>Choose ward</option>
                                </select>
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

                            <div class="mb-3">
                                <label for="phone_number" class="col-form-label text-md-end">{{ __('phone number') }}</label>
                                <input id="phone_number" type="tel" class="form-control" name="phone_number" required>
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
    <script src="{{ url('js/jquery.min.js')}}"></script>
    <script src="{{ url('js/bootstrap.min.js')}}"></script>
    <script src="{{ url('js/main.js')}}"></script>
    <script src="{{ url('js/custom.js')}}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    </body>
</html>
