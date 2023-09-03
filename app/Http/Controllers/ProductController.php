<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $emps = Product::when($request->filled('name'), function ($q) use ($request) {
                $q->where('name', 'LIKE', "%".$request->name."%");
            })
            ->when($request->filled('description'), function ($q) use ($request) {
                $q->where('description', 'LIKE', "%".$request->description."%");
            })
            ->get();
        return view('employee.index', compact('emps'));
    }

    public function create()
    {
        return view('employee.add');
    }

    public function store(StoreEmployeeRequest $request)
    {
        // dd($request->all());
        $emp = new User;
        $emp->name = $request->name;
        $emp->email = $request->email;
        $emp->contact_no = $request->contact_no;
        $emp->gender = $request->gender;
        $emp->password = Hash::make($request->password);
        $emp->user_role = "EMP";
        $emp->is_active = 1;
        $emp->save();

        return redirect()->route('employee.index')->with('notify_message', ['status' => 'success', 'msg' => 'Employee created successfully!']);
    }

    public function show(Request $request)
    {
        $emp = User::findOrFail($request->employee);
        return view('employee.view', compact('emp'));
    }

    public function edit(Request $request)
    {
        $emp = User::findOrFail($request->employee);
        return view('employee.edit', compact('emp'));
    }

    public function update(UpdateEmployeeRequest $request)
    {
        $emp = User::find($request->employee);
        $emp->name = $request->name;
        $emp->email = $request->email;
        $emp->contact_no = $request->contact_no;
        $emp->gender = $request->gender;
        if (!empty($request->password)) {
            $emp->password = Hash::make($request->password);
        }
        $emp->save();

        return redirect()->route('employee.index')->with('notify_message', ['status' => 'success', 'msg' => 'Employee Updated successfully!']);
    }
}
