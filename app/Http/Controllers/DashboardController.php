<?php

namespace App\Http\Controllers;

use App\Models\Income;
use App\Models\RegisteredPackage;
use App\Services\IncomeCalculationService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $package = RegisteredPackage::with('package')->where('user_id', auth()->user()->id)->first();
        $incomes = Income::where('registered_package_id', $package?->id)
            ->orderBy('earning_date', 'desc')
            ->get();
        $total_earn = Income::where('registered_package_id', $package?->id)->sum('amount');
        return view('dashboard', compact('package', 'incomes', 'total_earn'));
    }
}
