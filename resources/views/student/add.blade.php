@extends('layouts.app')
@section('title', 'Add Employee')
@section('content')

<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            Details
        </div>
        <form action="{{ route('employee.store') }}" method="POST">
            @csrf
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4 form-group">
                        <label for="name" class="req_fld">Name</label>
                        <input class="form-control" type="text" name="name" value="{{old('name')}}">
                        @error('name')
                            <span class="text-danger small">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="col-md-4 form-group">
                        <label for="email" class="req_fld">Email</label>
                        <input class="form-control" type="text" name="email" value="{{old('email')}}" autocomplete="off">
                        @error('email')
                            <span class="text-danger small">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="col-md-4 form-group">
                        <label for="contact_no" class="req_fld">Contact Number</label>
                        <input class="form-control" type="text" name="contact_no" value="{{old('contact_no')}}">
                        @error('contact_no')
                            <span class="text-danger small">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 form-group">
                        <label for="gender" class="req_fld">Gender</label>
                        <select id="gender" class="form-control" name="gender">
                            <option>Please Select</option>
                            <option value="M" {{old('gender') == "M" ? 'selected' : ''}}>Male</option>
                            <option value="F" {{old('gender') == "F" ? 'selected' : ''}}>Female</option>
                        </select>
                        @error('gender')
                            <span class="text-danger small">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="col-md-4 form-group">
                        <label for="password" class="req_fld">Password</label>
                        <input class="form-control" type="password" name="password" autocomplete="off">
                        @error('password')
                            <span class="text-danger small">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="col-md-4 form-group">
                        <label for="password_confirmation" class="req_fld">Confirm Password</label>
                        <input class="form-control" type="password" name="password_confirmation">
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <div class="row">
                    <div class="col">
                        <a href="{{ route('employee.index') }}" class="btn btn-info" type="button">Back</a>
                        <button class="btn btn-secondary" type="reset">Reset</button>
                        <button class="btn btn-primary float-right" type="submit">Submit</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection