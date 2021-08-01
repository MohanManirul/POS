<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\Products;
use App\Models\Backend\Purchases;
use App\Models\Backend\Categories;
use App\Models\Backend\Suppliers;
use App\Models\Backend\Units;
use Auth;

class DefaultController extends Controller
{
     /* get category when select supplier
        this function get help from ajax
        which is written in custom script
    */
    public function getCategory(Request $request){
        $supplier_id = $request->supplier_id;
        //dd($supplier_id);
        $allCategory = Products::with(['category'])->select('category_id')->where('supplier_id' , $supplier_id)->groupBy('category_id')->get();
        //dd($allCategory->toArray());
        return response()->json($allCategory);
    }

    /* get product when select category
        this function get help from ajax
        which is written in custom script
    */
    public function getProduct(Request $request){
        $category_id = $request->category_id;
        $allProduct = Products::where('category_id' , $category_id)->get();
        //dd($allProduct->toArray());
        return response()->json($allProduct);

    }

    /* get product stock when select product
        this function get help from ajax
        which is written in custom script
    */
    public function getProductStock(Request $request){
        $product_id = $request->product_id;
        $stock = Products::where('id' , $product_id)->first()->quantity;
        //dd($allProduct->toArray());
        return response()->json($stock);

    }
}
