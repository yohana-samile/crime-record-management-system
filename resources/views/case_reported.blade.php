@extends('layouts.app')
@section('content')
    @php
        $userId = Auth::user()->id;
        $userRole = DB::select("SELECT roles.name as role_name, users.id from roles, users where users.role_id = roles.id and users.id = '$userId' ");
        $userRole = $userRole[0];
    @endphp
    <div class="container">
        @include('includes.urls')
        <div class="card">
            <div class="card-header">
                <h4 class="">Roles</h4>
            </div>
            <div class="card-body">
                <div class="alert alert-success" style="display: none;"></div>
                <div class="table-responsive table-bordered">
                    <table class="table" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>RB number</th>
                                <th>Reported At</th>
                                <th>Police Station Near</th>
                                <th>Reported By</th>
                                <th>Crimed_for</th>
                                <th>Time Repoted</th>
                                <th>Case Status</th>
                                @if ($userRole->role_name !== 'is_crime_reporter')
                                    <th>Action</th>
                                @endif
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>RB number</th>
                                <th>Reported At</th>
                                <th>Police Station Near</th>
                                <th>Reported By</th>
                                <th>Crimed_for</th>
                                <th>Time Repoted</th>
                                <th>Case Status</th>
                                @if ($userRole->role_name !== 'is_crime_reporter')
                                    <th>Action</th>
                                @endif
                            </tr>
                        </tfoot>
                        <tbody>
                            @if (!empty($case_reported))
                                @foreach ($case_reported as $case)
                                    <tr>
                                        <td>{{ $case->rb_number }}</td>
                                        <td class="text-capitalize">{{ $case->district }} {{ $case->district }}</td>
                                        <td class="text-capitalize">{{ $case->region }} Police Office</td>
                                        <td>{{ $case->user_name }}</td>
                                        <td>{{ $case->crime_type_name }}</td>
                                        <td>{{ $case->created_at }}</td>
                                        <td class="text-center">
                                            @if ($case->case_status == 'pending')
                                                <div class="badge badge-primary">{{ $case->case_status}}</div>
                                            @elseif ($case->case_status == 'on investigation')
                                                <div class="badge badge-warning">{{ $case->case_status}}</div>
                                            @else
                                                <div class="badge badge-danger">{{ $case->case_status}}</div>
                                            @endif
                                        </td>
                                        @if ($userRole->role_name !== 'is_crime_reporter')
                                            <td>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <a href="{{ url('update_case_status', ['id' => $case->id])}}">
                                                            <i class="fa fa-edit text-success"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </td>
                                        @endif
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

