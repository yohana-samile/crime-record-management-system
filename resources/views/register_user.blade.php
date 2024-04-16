@extends('layouts.app')
@section('content')
    <div class="container">
        @include('includes.urls')
        <div class="card">
            <div class="card-header">
                <h4>Staff Regstration Page</h4>
            </div>
            <div class="card-body">
                <form id="register_police_staff">
                    @csrf
                    <div class="mb-3">
                        <label for="name">Enter full name</label>
                        <input type="text" name="name" id="name" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="dob">Enter date of birth</label>
                        <input type="date" name="dob" id="dob" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="phone_number">Enter phone_number</label>
                        <input type="tel" name="phone_number" id="phone_number" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <select name="gender" id="gender" class="form-control">
                            <option selected hidden disabled>Choose Gender</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="address">Enter address</label>
                        <input type="tel" name="address" id="address" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <select name="rank_id" id="rank_id" class="form-control">
                            <option selected hidden disabled>Choose Police Rank/Position</option>
                            @foreach ($ranks as $rank)
                                <option value="{{ $rank->id }}">{{ $rank->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="password">Enter Password</label>
                        <input type="tel" name="password" id="password" class="form-control" value="12345678" required>
                        <small>default is 12345678</small>
                    </div>
                    <div class="mb-3">
                        <input type="submit" class="form-control bg-primary text-white" value="Register">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
