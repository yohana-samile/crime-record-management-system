@extends('layouts.app')
@section('content')
    <div class="container">
        @include('includes.urls')
        <div class="card">
            <div class="card-header">
                <h4 class="">Register New Crime Type</h4>
            </div>
            <div class="card-body">
                <form id="submit_crime_type">
                    @csrf
                    <div class="mb-3">
                        <label for="crime_type_name">Enter crime type name</label>
                        <input type="text" name="name" id="crime_type_name" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <input type="submit" name="submit" value="Submit" class="bg-primary text-white form-control">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
