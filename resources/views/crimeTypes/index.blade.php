@extends('layouts.app')
@section('content')
    <div class="container">
        @include('includes.urls')
        <div class="card">
            <div class="card-header">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-6">
                            <h4 class="">Types Of Crimes</h4>
                        </div>
                        <div class="col-md-6 float-right">
                            <a href="{{ url('crimeTypes/add_crime_type')}}" class="btn btn-primary text-white btn-sm float-right">Add Type <i class="fa fa-plus"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="alert alert-success" style="display: none;"></div>
                <div class="table-responsive table-bordered">
                    <table class="table" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>S/N</th>
                                <th>Crime Type Name</th>
                                <th>Time Created</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>S/N</th>
                                <th>Crime Type Name</th>
                                <th>Time Created</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @if (!empty($crimes))
                                @php
                                    $index = 1;
                                @endphp
                                @foreach ($crimes as $crime)
                                    <tr>
                                        <td>{{ $index++ }}</td>
                                        <td>{{ $crime->name }}</td>
                                        <td>{{ $crime->created_at }}</td>
                                        <td>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <i class="fa fa-eye text-primary"></i>
                                                </div>
                                                <div class="col-md-4">
                                                    <i class="fa fa-edit text-success"></i>
                                                </div>
                                                <div class="col-md-4">
                                                    <i class="fa fa-trash text-danger"></i>
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

