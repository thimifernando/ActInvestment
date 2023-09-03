@extends('layouts.app')
@section('title', 'Add New Supplier')

@section('content')

<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            Details
        </div>
        <form action="{{ route('supplier.store') }}" method="POST">
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
                        <label for="address" class="req_fld">Address</label>
                        <input class="form-control" type="text" name="address" value="{{old('address')}}" >
                        @error('address')
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
                
            </div>
            <div class="card-footer">
                <div class="row">
                    <div class="col">
                        <a href="{{ route('supplier.index') }}" class="btn btn-info" type="button">Back</a>
                        <button class="btn btn-secondary" type="reset">Reset</button>
                        <button class="btn btn-primary float-right" type="submit">Submit</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection