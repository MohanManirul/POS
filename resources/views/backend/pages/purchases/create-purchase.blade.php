
@extends('backend.layouts.master')

@section('title')
Purchases Create - Admin Panel
@endsection

@section('styles')
<!-- <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" /> -->

<style>
    .form-check-label {
        text-transform: capitalize;
    }
</style>
@endsection


@section('admin-content')

<!-- page title area start -->
<div class="page-title-area">
    <div class="row align-items-center">
        <div class="col-sm-6">
            <div class="breadcrumbs-area clearfix">
                <h4 class="page-title pull-left">
                    @if(isset($editData))
                        Edit Purchases
                        @else
                        Add Purchases
                    @endif
                </h4>

                <ul class="breadcrumbs pull-left">
                    <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li><a href="{{ route('admin.purchases.index') }}">All Purchases</a>

                    <li>
                        <span>
                        @if(isset($editData))
                            Edit Purchases
                            @else 
                            Add Purchases
                        @endif
                </span></li>
                </ul>
            </div>
        </div>
        <div class="col-sm-6 clearfix">
            @include('backend.layouts.partials.logout')
        </div>
    </div>
</div>
<!-- page title area end -->

<div class="main-content-inner">

    <div class="row">
        <!-- data table start -->
        <div class="col-12 mt-5">
            <div class="card">
                <div class="card-body">
                        <div class="form-row">
                            <div class="form-group col-md-4 col-sm-8">
                                <label for="date">Date <font style="color: red;">*</font></label>
                                <input type="text" class="form-control form-control-sm singledatepicker " autocomplete="off" id="date" name="date" placeholder="YYYY-MM-DD" value="{{@$editData['student']['date']}}">
                            </div> 

                            <div class="form-group col-md-4 col-sm-6">
                                <label for="purchase_no">Purchases No</label>
                                <input type="text" class="form-control form-control-sm" id="purchase_no" name="purchase_no" placeholder="Enter Purchases No" value="{{@$editData->name}}">
                                <font style="color: red">{{($errors->has('name')?($errors->first('name')): '')}}</font>
                            </div>                            

                            <div class="form-group col-md-4 col-sm-6">
                             <label for="supplier_id">Select Supplier</label>
                                <select class="form-control form-control-sm select2" name="supplier_id" id="supplier_id">
                                    <option value="">Please select a supplier for the product</option>
                                    @foreach ($suppliers as $supplier)
                                    <option value="{{ $supplier->id }}" {{(@$editData->supplier_id==$supplier->id)?"selected":""}}>{{ $supplier->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group col-md-4 col-sm-6">
                             <label for="category_id">Category Name</label>
                                <select class="form-control form-control-sm select2" name="category_id" id="category_id">
                                    <option value="">Please select a category for the product</option>                                    
                                    <option value=""></option>                                    
                                </select>
                            </div>

                            <div class="form-group col-md-4 col-sm-6">
                             <label for="product_id">Product Name</label>
                                <select class="form-control form-control-sm select2" name="product_id" id="product_id">
                                    <option value="">Please select a Product</option>                                    
                                </select>
                            </div>

                            <div class="form-group col-md-4 col-sm-6" style="margin-top:26px">
                                <i class="btn btn-success fa fa-plus-circle addeventmore"> Add More</i>
                            </div>                           
                        </div>
                    
                </div>
                <!-- purchase product list --->
                <div class="card-body">
                    <form id="addPurchase"  action="{{ (@$editData)?(route('admin.purchases.update', $editData->id)):route('admin.purchases.store') }}" method="POST">
                        @csrf
                         @if(isset($editData))
                            @method('PUT')
                        @endif
                       <table id="dataTable" class="text-center table-bordered" width="100%">
                       <thead class="bg-light text-capitalize">
                                <tr>
                                    <th>Sl</th>
                                    <th>Category</th>
                                    <th>Product Name</th>
                                    <th>Pcs/Kg</th>
                                    <th>Unit Price</th>
                                    <th>Description</th>
                                    <th>Total Price</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody id="addRow" class="addRow">
                            
                            </tbody>
                            <tbody>
                               <tr>
                                    <td class="text-right" colspan="6"><b style="font-size:20px; color:red; ">Grand Total Price :</b></td>
                                     <td>
                                        <input type="text" name="estimated_amount" value="0" id="estimated_amount" class="form-control form-control-sm text-right estimated_amount" readonly style="background-color: #D8FDBA">
                                     </td>
                                     <td></td>
                                </tr>
                            </tbody>
                           
                        </table>
                        <br>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary" id="storeButton">Purchase Store</button>
                        </div>
                    </form>
                </div>
                <!-- purchase product list --->
            </div>
        </div>
        <!-- data table end -->
        
    </div>
</div>

@endsection


@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>

<script>
    $(document).ready(function() {
        $('.select2').select2();
    })
</script>
@endsection
