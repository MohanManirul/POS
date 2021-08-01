<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\Units;
use Auth;
class UnitsController extends Controller
{
    public function index(){
        $allData = Units::all();
        return view('backend.pages.units.view-units', compact('allData'));
    }

    public function create(){        
        return view('backend.pages.units.create-unit');
    }

    public function store(Request $request){
        $unit = new Units();
        $unit->name = $request->name;      
        //$unit->created_by = Auth::user()->id;
        $unit->save();
        return redirect()->route('admin.units.index')->with('success','data added successfully...');
    }

    public function edit($id){
        $editData = Units::find($id);
        return view('backend.pages.units.create-unit' , compact('editData'));
        //dd($editData);
    }
    public function update(Request $request , $id){

        $unit = Units::find($id);
        $unit->name = $request->name;
        //$unit->updated_by = Auth::user()->$id;
        $unit->save();
        return redirect()->route('admin.units.index')->with('success','data updated successfully...');
    }

    public function destroy ($id){
        $unit = Units::find($id);
        if(!is_null($unit)){
            $unit->delete();
        }
        
        return redirect()->route('admin.units.index')->with('success','data deleted successfully...');
    }
}
