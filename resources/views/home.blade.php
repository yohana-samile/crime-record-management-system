@extends('layouts.app')

@section('content')
@php
    use Illuminate\Support\Facades\Auth;
    use Illuminate\Support\Facades\DB;
    use App\Model\User;
    $userId = Auth::user()->id;
    $userRole = DB::select("SELECT roles.name as role_name, users.id from roles, users where users.role_id = roles.id and users.id = '$userId' ");
    $case_reported = DB::select("SELECT COUNT(id) as count FROM case_reporteds WHERE case_status = 'pending' ");
    $police_staff = DB::select("SELECT COUNT(id) as count FROM police_staffs ");
    $reporters = DB::select("SELECT COUNT(id) as count FROM reporters ");
    $case_reported = $case_reported[0]->count ?? 0;
    $police_staff = $police_staff[0]->count ?? 0;
    $reporters = $reporters[0]->count ?? 0;
    $userRole = $userRole[0];
@endphp
    <div class="container">
        @include('includes.urls')
        <div class="row">
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
        @if ($userRole->role_name !== 'is_crime_reporter')
            <div class="row my-4">
                <div class="col-md-4">
                    <div class="card" style="border-left: 5px solid #007bff;">
                        <div class="card-body text-center">
                            <h4 class="text-center">Case Reported</h4>
                            <div class="row my-3">
                                <div class="col-md-6">
                                    <h4>{{ $case_reported }}</h4>
                                </div>
                                <div class="col-md-6">
                                    <i class="fa fa-database fa-2x text-primary text-dark"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card" style="border-left: 5px solid #007bff;">
                        <div class="card-body text-center">
                            <h4 class="text-center">Reporters</h4>
                            <div class="row my-3">
                                <div class="col-md-6">
                                    <h4>{{ $case_reported }}</h4>
                                </div>
                                <div class="col-md-6">
                                    <i class="fa fa-users fa-2x text-primary text-dark"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card" style="border-left: 5px solid #007bff;">
                        <div class="card-body text-center">
                            <h4 class="text-center">Staffs</h4>
                            <div class="row my-3">
                                <div class="col-md-6">
                                    <h4>{{ $case_reported }}</h4>
                                </div>
                                <div class="col-md-6">
                                    <i class="fa fa-users fa-2x text-primary text-dark"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection
