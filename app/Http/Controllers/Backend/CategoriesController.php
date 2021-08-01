<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\Categories;
use App\Models\Backend\Products;
use Auth;
class CategoriesController extends Controller
{
    public function index(){
        $allData = Categories::all();
        return view('backend.pages.categories.view-categories', compact('allData'));
    }

    public function create(){        
        return view('backend.pages.categories.create-category');
    }

    public function store(Request $request){
        $categories = new Categories();
        $categories->name = $request->name;      
        //$categories->created_by = Auth::user()->id;
        $categories->save();
        return redirect()->route('admin.categories.index')->with('success','data added successfully...');
    }

    public function edit($id){
        $editData = Categories::find($id);
        return view('backend.pages.categories.create-category' , compact('editData'));
        //dd($editData);
    }
    public function update(Request $request , $id){

        $categories = Categories::find($id);
        $categories->name = $request->name;
        //$categories->updated_by = Auth::user()->$id;
        $categories->save();
        return redirect()->route('admin.categories.index')->with('success','data updated successfully...');
    }

    public function destroy ($id){
        $categories = Categories::find($id);
        if(!is_null($categories)){
            $categories->delete();
        }
        
        return redirect()->route('admin.categories.index')->with('success','data deleted successfully...');
    }
}
