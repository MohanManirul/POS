<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\Purchases;
use App\Models\Backend\Categories;
use App\Models\Backend\Suppliers;
use App\Models\Backend\Units;
use App\Models\Backend\Products;
use Auth;
use DB;
class PurchasesController extends Controller
{
    public function index(){
        $allData = Purchases::orderBy('date' , 'desc')->orderBy('id' , 'desc')->get();
        return view('backend.pages.purchases.view-purchases', compact('allData') );
    }

    public function create(){ 
        $data['categories'] = Categories::all();
        $data['suppliers'] = Suppliers::all();
        $data['units'] = Units::all();       
        return view('backend.pages.purchases.create-purchase', $data);
    }

    public function store(Request $request){
        if($request->category_id == null){
            return redirect()->back()->with('error' , 'Sorry ! you do not select any item');
        }else{
            $count_category = count($request->category_id);
            for($i=0; $i<$count_category; $i++){
                $purchase = new Purchases();
                $purchase->date = date('Y-m-d' , strtotime($request->date[$i]));
                $purchase->purchase_no = $request->purchase_no[$i];
                $purchase->supplier_id = $request->supplier_id[$i];
                $purchase->category_id = $request->category_id[$i];
                $purchase->product_id = $request->product_id[$i];
                $purchase->buying_qty = $request->buying_qty[$i];
                $purchase->unit_price = $request->unit_price[$i];
                $purchase->buying_price = $request->buying_price[$i];
                $purchase->description = $request->description[$i];
                $purchase->status = '0';
                $purchase->save();
            }
        }
        return redirect()->route('admin.purchases.index')->with('success','data added successfully...');
    }

    public function show(){
        
    }

    public function destroy ($id){
        $purchases = Purchases::find($id);
        if(!is_null($purchases)){
            $purchases->delete();
        }
        
        return redirect()->route('admin.purchases.index')->with('success','data deleted successfully...');
    }

    public function pendingList(){
        $allData = Purchases::orderBy('date' , 'desc')->orderBy('id' , 'desc')->where('status','0')->get();
        return view('backend.pages.purchases.view-pending-list', compact('allData') );
    }

    public function approve($id){
        $purchase = Purchases::find($id); //id find in purchase model 
        $product = Products::where('id',$purchase->product_id)->first();
        $purchase_qty = ((float)($purchase->buying_qty)) + ((float)($product->quantity));
        $product->quantity = $purchase_qty;
        if($product->save()){
            DB::table('purchases')
                ->where('id',$id)
                ->update(['status' => 1]);
        }
         return back();
    }
   
}
