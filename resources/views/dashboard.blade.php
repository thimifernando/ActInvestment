@extends('layouts.app')
@section('title', 'Dashboard')


@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-6">
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>${{number_format($package?->package?->daily_income, 2)}}/day</h3>
                        <p>{{$package?->package?->name ?? "--"}} (${{number_format($package?->package?->fee, 2)}})</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-box-open"></i>
                    </div>
                    {{-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> --}}
                </div>

            </div>
            <div class="col-lg-3 col-6">
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>${{$total_earn}}</h3>
                        <p>Total Earned</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-dollar-sign"></i>
                    </div>
                    {{-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> --}}
                </div>
            </div>
            {{-- <div class="col-lg-3 col-6">
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3>Total</h3>

                        <p>20$</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                </div>
            </div> --}}
            <div class="col-lg-3 col-6">
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3>{{!empty($package) ? now()->diffInDays(Carbon\Carbon::parse($package?->registered_date)->addDays(150)) : '--'}}</h3>
                        <p>Days Ramaining</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-calendar"></i>
                    </div>
                    {{-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> --}}
                </div>

            </div>

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Earnings
                    </div>

                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th style="text-align: center">Date</th>
                                    <th style="text-align: center">Earned</th>
                                    {{-- <th style="text-align: center">Total</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($incomes as $income)
                                    <tr>
                                        <td style="text-align: center">{{$income->earning_date}}</td>
                                        <td style="text-align: center">${{$income->amount}}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->

@endsection
