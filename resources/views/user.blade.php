@extends('layouts.app')
@section('content')
    <div class="container">
        @include('includes.urls')
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <h4>Users Registered</h4>
                    </div>
                    <div class="col-md-6 float-right">
                        <a href="{{url('register_user')}}" class="btn btn-sm btn-primary float-right">Add Police Staff <i class="fa fa-plus"></i></a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="alert alert-success" style="display: none;"></div>
                <div class="table-responsive table-bordered">
                    <table class="table" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Badge Number</th>
                                <th>Rank</th>
                                <th>Is_Police_staff</th>
                                <th>Registered At</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Badge Number</th>
                                <th>Rank</th>
                                <th>Is_Police_staff</th>
                                <th>Registered At</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @if (!empty($users))
                            @php
                                $index = 1;
                            @endphp
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $index++ }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->badge_number }}</td>
                                        <td>{{ $user->rank_name }}</td>
                                        <td>
                                            @if ($user->role_name != 'is_admin')
                                            <p class="text-center">
                                                <i class="fa fa-toggle-on text-primary text-center"></i>
                                            </p>
                                            @else
                                                <p class="text-center">
                                                    <i class="fa fa-toggle-off text-primary text-center"></i>
                                                </p>
                                            @endif
                                        </td>
                                        <td>{{ $user->created_at }}</td>
                                        <td>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <a href="javascript:void()">
                                                        <i class="fa fa-eye text-primary"></i>
                                                    </a>
                                                </div>
                                                <div class="col-md-4">
                                                    <a href="javascript:void()">
                                                        <i class="fa fa-edit text-success"></i>
                                                    </a>
                                                </div>
                                                <div class="col-md-4">
                                                    <a href="javascript:void()">
                                                        <i class="fa fa-trash text-danger"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </td>
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

