@extends('layouts.app')
@section('content')
    <div class="container">
        @include('includes.urls')
        <div class="card">
            <div class="card-header">
                <h5 class="card-title" id="case_status_modelLabel">Update Case Status</h5>
            </div>
            <div class="card-body">
                <form id="update_case_status">
                    @csrf
                    <div class="mb-3">
                        <input type="hidden" name="id" id="id" value="{{ $case->id }}" required>
                        <select name="case_status" id="case_status" class="form-control">
                            <option value="on investigation">on investigation</option>
                            <option value="complite">Complite And Close</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <input type="submit" class="form-control bg-primary text-white" value="Save changes">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
