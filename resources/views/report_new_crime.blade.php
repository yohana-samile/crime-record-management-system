@extends('layouts.app')
@section('content')
    <div class="container">
        @include('includes.urls')
        <div class="card">
            <div class="card-header">
                <h4 class="">Report Crime</h4>
            </div>
            <div class="card-body">
                <form id="report_new_crime_action">
                    @csrf
                    <div class="mb-3">
                        <select name="crime_type_id" id="crime_type_id" class="form-control" required>
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
                        <label for="case_discription">Enter Brifyly Discription (option)</label>
                        <textarea name="case_discription" id="case_discription" cols="10" class="form-control" rows="10"></textarea>
                    </div>

                    <div class="mb-3">
                        <input type="submit" name="submit" value="Submit" class="bg-primary text-white form-control">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
