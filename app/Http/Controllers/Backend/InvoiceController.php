<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\Purchases;
use App\Models\Backend\Categories;
use App\Models\Backend\Suppliers;
use App\Models\Backend\Units;
use App\Models\Backend\Products;
use App\Models\Backend\Invoice;
use App\Models\Backend\InvoiceDetails;
use App\Models\Backend\Payment;
use App\Models\Backend\PaymentDetails;
use Auth;
use DB;
class InvoiceController extends Controller
{
    public function index(){
        $allData = Invoice::orderBy('date' , 'desc')->orderBy('id' , 'desc')->get();
        return view('backend.pages.invoice.view-invoices', compact('allData') );
    }

    public function create(){ 
        $data['categories'] = Categories::all();
        $invoice_data = Invoice::orderBy('id','desc')->first();
        if($invoice_data == null){
            $first_reg = '0';
            $data['invoice_no'] = $first_reg+1;
            //dd($invoice_no);
        }else{
            $invoice_data = Invoice::orderBy('id','desc')->first()->invoice_no;
            $data['invoice_no'] = $invoice_data+1;
            //dd($invoice_no);
        }     
        return view('backend.pages.invoice.create-invoice', $data);
    }

    public function store(Request $request){
        if($request->category_id == null){
            return redirect()->back()->with('error' , 'Sorry ! you do not select any item');
        }else{
            $count_category = count($request->category_id);
            for($i=0; $i<$count_category; $i++){
                $invoice = new Invoice();
                $invoice->date = date('Y-m-d' , strtotime($request->date[$i]));
                $invoice->invoice_no = $request->invoice_no[$i];
                $invoice->supplier_id = $request->supplier_id[$i];
                $invoice->category_id = $request->category_id[$i];
                $invoice->product_id = $request->product_id[$i];
                $invoice->buying_qty = $request->buying_qty[$i];
                $invoice->unit_price = $request->unit_price[$i];
                $invoice->buying_price = $request->buying_price[$i];
                $invoice->description = $request->description[$i];
                $invoice->status = '0';
                $invoice->save();
            }
        }
        return redirect()->route('admin.invoice.index')->with('success','data added successfully...');
    }

    public function show(){
        
    }

    public function destroy ($id){
        $invoices = Invoice::find($id);
        if(!is_null($invoices)){
            $invoices->delete();
        }
        
        return redirect()->route('admin.invoice.index')->with('success','data deleted successfully...');
    }

    public function pendingList(){
        $allData = Invoice::orderBy('date' , 'desc')->orderBy('id' , 'desc')->where('status','0')->get();
        return view('backend.pages.invoice.view-pending-list', compact('allData') );
    }

    public function approve($id){
        $invoice = Invoice::find($id); //id find in invoice model 
        $product = Products::where('id',$invoice->product_id)->first();
        $invoice_qty = ((float)($invoice->buying_qty)) + ((float)($product->quantity));
        $product->quantity = $invoice_qty;
        if($product->save()){
            DB::table('invoices')
                ->where('id',$id)
                ->update(['status' => 1]);
        }
         return back();
    }
   
}
