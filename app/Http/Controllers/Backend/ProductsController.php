<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\Products;
use App\Models\Backend\Categories;
use App\Models\Backend\Suppliers;
use App\Models\Backend\Units;
use Auth;
class ProductsController extends Controller
{
    public function index(){
        $allData = Products::all();
        return view('backend.pages.products.view-products', compact('allData') );
    }

    public function create(){ 
        $data['categories'] = Categories::all();
        $data['suppliers'] = Suppliers::all();
        $data['units'] = Units::all();       
        return view('backend.pages.products.create-product', $data);
    }

    public function store(Request $request){
        $product = new Products();
        $product->name = $request->name;
        $product->supplier_id = $request->supplier_id;
        $product->category_id = $request->category_id;
        $product->unit_id = $request->unit_id;      
        //$product->created_by = Auth::user()->id;
        $product->save();
        return redirect()->route('admin.products.index')->with('success','data added successfully...');
    }

    public function edit($id){
        $data['editData'] = Products::find($id);
        $data['categories'] = Categories::all();
        $data['suppliers'] = Suppliers::all();
        $data['units'] = Units::all(); 
        return view('backend.pages.products.create-product' , $data);
        //dd($editData);
    }
    public function update(Request $request , $id){

        $product = Products::find($id);
        $product->name = $request->name;
        $product->supplier_id = $request->supplier_id;
        $product->category_id = $request->category_id;
        $product->unit_id = $request->unit_id;  
        //$product->updated_by = Auth::user()->$id;
        $product->save();
        return redirect()->route('admin.products.index')->with('success','data updated successfully...');
    }

    public function destroy ($id){
        $product = Products::find($id);
        if(!is_null($product)){
            $product->delete();
        }
        
        return redirect()->route('admin.products.index')->with('success','data deleted successfully...');
    }
}
