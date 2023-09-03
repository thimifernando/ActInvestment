<?php

namespace App\Http\Controllers;

use App\Http\Requests\StatusEmployeeRequest;
use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class EmployeeController extends Controller
{
    public function index(Request $request)
    {
        $emps = User::where('user_role', 'EMP')
            ->when($request->filled('name'), function ($q) use ($request) {
                $q->where('name', 'LIKE', "%".$request->name."%");
            })
            ->when($request->filled('is_active'), function ($q) use ($request) {
                $q->where('is_active', $request->is_active);
            })
            ->when($request->filled('email'), function ($q) use ($request) {
                $q->where('email', 'LIKE', "%".$request->email."%");
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
        //dd($request->all());
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

    public function status(StatusEmployeeRequest $request)
    {
        $emp = User::find($request->id);
        $emp->is_active = $request->is_active;
        $emp->save();

        return redirect()->route('employee.index')->with('notify_message', ['status' => 'success', 'msg' => 'Employee successfully ' . ($request->is_active ? 'Activated' : 'Deactivated') . '!']);
    }
}
