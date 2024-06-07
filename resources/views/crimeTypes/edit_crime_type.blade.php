@extends('layouts.app')
@section('content')
    <div class="container">
        @include('includes.urls')
        <div class="card">
            <div class="card-header">
                <h4 class="">Edit Crime Type</h4>
            </div>
            <div class="card-body">
                @if(session('success'))
                    <div class="alert alert-success">
                        <strong>{{ session('success') }}</strong>
                    </div>
                @endif

                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form method="POST" action="{{ route('crimeTypes/edit_crime_type_action')}}">
                    @csrf
                    <div class="mb-3">
                        <label for="crime_type_name">Enter crime type name</label>
                        <input type="hidden" name="id" id="id" value="{{ $crime->id }}" class="form-control" required>
                        <input type="text" name="name" id="crime_type_name" value="{{ $crime->name }}" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <input type="submit" name="submit" value="Update" class="bg-success text-white form-control">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
