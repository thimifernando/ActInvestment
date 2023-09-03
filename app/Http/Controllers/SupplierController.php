<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(request('search')){
            $supplier = Supplier::where('name', 'like', '%'.request('search').'%')->get();

        }
        else{
            $supplier=Supplier::all();
        }
        
        return view('supplier.index')->with('supplier',$supplier);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('supplier.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated =$request->validate([
            'name'=>'required|regex:/^[\pL\s]+$/u',
            'address'=> 'required',
            'contact_no'=> 'required|numeric|digits:10'
        ]);
        Supplier::create([
            'name' => $request->get('name'),
            'address' => $request->get('address'),
            'contact_no' => $request->get('contact_no')
        ]);
        return redirect()->route('supplier.index')->with('success', 'Supplier added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Supplier $supplier)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Supplier $supplier)
    {
        return view('supplier.editsupplier', compact('supplier'));
       
    }
   
    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Supplier $supplier)
    {
        $validated =$request->validate([
            'name'=>'required|regex:/^[\pL\s]+$/u',
            'address'=> 'required',
            'contact_no'=> 'required|numeric|digits:10'
        ]);
        $supplier->update([
            'name' => $request->get('name'),
            'address' => $request->get('address'),
            'contact_no' => $request->get('contact_no')
        ]);
        return redirect()->route('supplier.index')->with('notify_message', ['status' => 'success', 'msg' => 'Supplier Updated successfully!']);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Supplier $supplier)
    {
        $supplier->delete();
        return redirect()->route('supplier.index')->with('success', 'Supplier deleted successfully.');
    }
    
}
