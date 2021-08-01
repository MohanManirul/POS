<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\Customers;
use Auth;
class CustomersController extends Controller
{
    public function index(){
        $allData = Customers::all();
        return view('backend.pages.customer.view-customer', compact('allData'));
    }

    public function create(){        
        return view('backend.pages.customer.create-customer');
    }

    public function store(Request $request){
        $customer = new Customers();
        $customer->name = $request->name;
        $customer->mobile_no = $request->mobile_no;
        $customer->address = $request->address;
        $customer->email = $request->email;        
        //$customer->created_by = Auth::user()->id;
        $customer->save();
        return redirect()->route('admin.customers.index')->with('success','data added successfully...');
    }

    public function edit($id){
        $editData = Customers::find($id);
        return view('backend.pages.customer.create-customer' , compact('editData'));
        //dd($editData);
    }
    public function update(Request $request , $id){

        $customer = Customers::find($id);
        $customer->name = $request->name;
        $customer->mobile_no = $request->mobile_no;
        $customer->address = $request->address;
        $customer->email = $request->email;
        //$customer->updated_by = Auth::user()->$id;
        $customer->save();
        return redirect()->route('admin.customers.index')->with('success','data updated successfully...');
    }

    public function destroy ($id){
        $customer = Customers::find($id);
        if(!is_null($customer)){
            $customer->delete();
        }
        
        return redirect()->route('admin.customers.index')->with('success','data deleted successfully...');
    }
}
