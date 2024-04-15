@extends('layouts.app')

@section('content')
@php
    use Illuminate\Support\Facades\Auth;
    use App\Model\User;
@endphp
    <div class="container">
        @include('includes.urls')
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><b>{{ __('Crime Record Management System') }}</b></div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        {{ __('Welcome Dear ') }}<b>{{ Auth::user()->name }}</b>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
