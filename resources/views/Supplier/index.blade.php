@extends('layouts.app')
@section('title', 'Product Suppliers')

@section('content')
@if(session()->has('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div>
@endif

    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                Search
                <a href="{{ route('supplier.create') }}" class="btn btn-success float-right" type="button">Add New Supplier</a>
            </div>
            <form action="">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8 form-group">
                            <label for="name">Supplier Name</label>
                            <input class="form-control" type="search" name="search" value="{{ request('search') }}">
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

        </div>
        <div class="card">
            <div class="card-body">
                <div class="col-md-12">
                    <table class="table table-light">
                        <thead class="thead-light">
                            <tr>
                                <th>Supplier Name</th>
                                <th>Supplier Address</th>
                                <th>Supplier Contact Number</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($supplier as $supplier)
                                <tr>
                                    <td>{{ $supplier->name }}</td>
                                    <td>{{ $supplier->address }}</td>
                                    <td>{{ $supplier->contact_no }}</td>
                                    <td>
                                        <a href="" class="btn btn-primary mt-2">View</a>
                                        <a href="{{ route('supplier.edit',$supplier) }}" class="btn btn-warning mt-2">Edit</a>
                                        <form class="d-inline" action="{{ route('supplier.destroy',$supplier) }}" method="POST">
                                            @method('delete')
                                            @csrf
                                            <button type="submit" class="btn btn-danger mt-2" onclick="return confirm('This result permanant delete of your Supplier,Are you sure?')">Delete</button>
                                        </form>
                                    
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    
    </div>

    

@endsection