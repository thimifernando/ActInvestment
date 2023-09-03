<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRequestEarningsRequest;
use App\Http\Requests\UpdateRequestEarningsRequest;
use App\Models\Income;
use App\Models\IncomeRequest;
use App\Models\RegisteredPackage;
use Illuminate\Http\Request;

class RequestEarningsController extends Controller
{

    public function index(Request $request)
    {
        if (auth()->user()->user_role == "ADMIN") {
            $inc_reqs = IncomeRequest::with('registered_package.user')->where('status', 'P')->get();
            return view('request_earnings.index_admin', compact('inc_reqs'));
        }
        $package = RegisteredPackage::with('package')->where('user_id', auth()->user()->id)->firstOrFail();
        $total_earn = Income::where('registered_package_id', $package->id)->sum('amount');
        $total_release = IncomeRequest::where('registered_package_id', $package->id)->where('status', 'A')->sum('amount');
        $inc_reqs = IncomeRequest::with('registered_package.user')->where('registered_package_id', $package->id)->get();
        // dd($inc_reqs);
        return view('request_earnings.index', compact('package', 'inc_reqs', 'total_earn', 'total_release'));
    }

    public function create()
    {
        return view('request_earnings.add');
    }

    public function store(StoreRequestEarningsRequest $request)
    {
        $package = RegisteredPackage::with('package')->where('user_id', auth()->user()->id)->firstOrFail();
        $emp = new IncomeRequest();
        $emp->registered_package_id = $package->id;
        $emp->amount = $request->amount;
        $emp->status = 'P';
        $emp->save();

        return redirect()->route('request_earnings.index')->with('notify_message', ['status' => 'success', 'msg' => 'Redeem Request sent successfully!']);
    }

    public function edit(IncomeRequest $request_earning)
    {
        return view('request_earnings.edit', compact('request_earning'));
    }

    public function update(UpdateRequestEarningsRequest $request)
    {
        $emp = IncomeRequest::find($request->request_earning);
        $emp->status = $request->status;
        $emp->save();

        return redirect()->route('request_earnings.index')->with('notify_message', ['status' => 'success', 'msg' => 'Redeem Request Updated successfully!']);
    }
}
