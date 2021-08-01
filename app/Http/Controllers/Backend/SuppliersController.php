<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\Suppliers;
use Auth;
class SuppliersController extends Controller
{
    public function index(){
        $allData = Suppliers::all();
        return view('backend.pages.supplier.view-supplier', compact('allData'));
    }

    public function create(){        
        return view('backend.pages.supplier.create-supplier');
    }

    public function store(Request $request){
        $supplier = new Suppliers();
        $supplier->name = $request->name;
        $supplier->mobile_no = $request->mobile_no;
        $supplier->address = $request->address;
        $supplier->email = $request->email;        
        //$supplier->created_by = Auth::user()->id;
        $supplier->save();
        return redirect()->route('admin.suppliers.index')->with('success','data added successfully...');
    }

    public function edit($id){
        $editData = Suppliers::find($id);
        return view('backend.pages.supplier.create-supplier' , compact('editData'));
        //dd($editData);
    }
    public function update(Request $request , $id){

        $supplier = Suppliers::find($id);
        $supplier->name = $request->name;
        $supplier->mobile_no = $request->mobile_no;
        $supplier->address = $request->address;
        $supplier->email = $request->email;
        //$supplier->updated_by = Auth::user()->$id;
        $supplier->save();
        return redirect()->route('admin.suppliers.index')->with('success','data updated successfully...');
    }

    public function destroy ($id){
        $supplier = Suppliers::find($id);
        if(!is_null($supplier)){
            $supplier->delete();
        }
        
        return redirect()->route('admin.suppliers.index')->with('success','data deleted successfully...');
    }
}
