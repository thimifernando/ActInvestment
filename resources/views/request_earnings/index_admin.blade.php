@extends('layouts.app')
@section('title', 'Redeem Request')


@section('content')

    <div class="container-fluid">
        {{-- <div class="card">
        <div class="card-header">
            Search
            <a href="{{ route('request_earnings.create') }}" class="btn btn-info float-right" type="button">Make New Request</a>
        </div>
        <form action="{{ url()->current() }}">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4 form-group">
                        <label for="name">Name</label>
                        <input class="form-control" type="text" name="name" value="{{request()->get('name')}}">
                    </div>
                    <div class="col-md-4 form-group">
                        <label for="is_active">Status</label>
                        <select id="is_active"  name="is_active" class="form-control">
                            <option value="">All</option>
                            <option value="1" {{request()->get('is_active') == "1" ? 'selected' : ''}}>Active</option>
                            <option value="0" {{request()->get('is_active') == "0" ? 'selected' : ''}}>Inactive</option>
                        </select>
                    </div>
                    <div class="col-md-4 form-group">
                        <label for="email">Email</label>
                        <input class="form-control" type="text" name="email" value="{{request()->get('email')}}">
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <div class="row">
                    <div class="col">
                        <a href="{{ url()->current() }}" class="btn btn-secondary" type="button">Reset</a>
                        <button class="btn btn-primary float-right" type="submit">Search</button>
                    </div>
                </div>
            </div>
        </form>
    </div> --}}
        <div class="card">
            <div class="card-header">
                Redeem Requests
            </div>
            <div class="card-body">
                <table class="table table-light">
                    <thead class="thead-light">
                        <tr>
                            <th>#</th>
                            <th>Date</th>
                            <th>Amount</th>
                            <th>Status</th>
                            <th>Email</th>
                            @if (auth()->user()->user_role == 'ADMIN')
                                <th>Action</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($inc_reqs as $req)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $req->created_at }}</td>
                                <td>${{ $req->amount }}</td>
                                <td>{{ $req->status == 'A' ? 'Payout' : ($req->status == 'P' ? 'Pending' : 'Hold') }}</td>
                                <td>{{ $req->registered_package->user->email }}</td>
                                @if (auth()->user()->user_role == 'ADMIN')
                                    <td>
                                        <a href="{{ route('request_earnings.edit', ['request_earning' => $req->id]) }}"
                                            class="btn btn-warning">Manage</a>
                                    </td>
                                @endif
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center">
                                    No Data Available
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
