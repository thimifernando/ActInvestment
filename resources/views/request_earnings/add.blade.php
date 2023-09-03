@extends('layouts.app')
@section('title', 'Make New Request')
@section('content')

<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            Details
        </div>
        <form action="{{ route('request_earnings.store') }}" method="POST">
            @csrf
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4 form-group">
                        <label for="amount" class="req_fld">Amount</label>
                        <input class="form-control" type="number" max="40" name="amount" value="{{old('amount')}}">
                        @error('amount')
                            <span class="text-danger small">{{$message}}</span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <div class="row">
                    <div class="col">
                        <a href="{{ route('request_earnings.index') }}" class="btn btn-info" type="button">Back</a>
                        <button class="btn btn-secondary" type="reset">Reset</button>
                        <button class="btn btn-primary float-right" type="submit">Submit</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection