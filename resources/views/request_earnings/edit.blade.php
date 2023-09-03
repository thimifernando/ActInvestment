@extends('layouts.app')
@section('title', 'Manage Redeem')
@section('content')

    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                Details
            </div>
            <form action="{{ route('request_earnings.update', ['request_earning' => $request_earning->id]) }}" method="POST">
                @csrf
                @method('patch')
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 form-group">
                            <label for="amount" class="req_fld">Amount</label>
                            <input class="form-control" type="number" max="40" name="amount"
                                value="{{ $request_earning->amount }}" disabled>
                            @error('amount')
                                <span class="text-danger small">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-4 form-group">
                            <label for="status" class="req_fld">Status</label>
                            <select name="status" id="status" class="form-control">
                                <option value="P">Pending</option>
                                <option value="A">Payout</option>
                                <option value="H">Hold</option>
                            </select>
                            @error('amount')
                                <span class="text-danger small">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col">
                            <a href="{{ route('request_earnings.index') }}" class="btn btn-info" type="button">Back</a>
                            <button class="btn btn-secondary" type="reset">Reset</button>
                            <button class="btn btn-warning float-right" type="submit">Update</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
