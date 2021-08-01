
@extends('backend.layouts.master')

@section('title')
Products Create - Admin Panel
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
                        Edit Products
                        @else
                        Add Products
                    @endif
                </h4>

                <ul class="breadcrumbs pull-left">
                    <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li><a href="{{ route('admin.products.index') }}">All Products</a>

                    <li>
                        <span>
                        @if(isset($editData))
                            Edit Products
                            @else 
                            Add Products
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
                    <form id="addProducts" action="{{ (@$editData)?(route('admin.products.update', $editData->id)):route('admin.products.store') }}" method="POST">
                       @csrf
                         @if(isset($editData))
                            @method('PUT')
                        @endif
                        <div class="form-row">
                            <div class="form-group col-md-6 col-sm-8">
                                <label for="name">Products Name</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Enter Products Name" value="{{@$editData->name}}">
                                <font style="color: red">{{($errors->has('name')?($errors->first('name')): '')}}</font>
                            </div> 

                            <div class="form-group col-md-6 col-sm-8">
                             <label for="supplier_id">Select Supplier</label>
                                <select class="form-control select2" name="supplier_id">
                                    <option value="">Please select a supplier for the product</option>
                                    @foreach ($suppliers as $supplier)
                                    <option value="{{ $supplier->id }}" {{(@$editData->supplier_id == $supplier->id)?"selected":""}}>{{ $supplier->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group col-md-6 col-sm-8">
                             <label for="category_id">Select Category</label>
                                <select class="form-control select2" name="category_id">
                                    <option value="">Please select a category for the product</option>
                                    @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" {{(@$editData->category_id==$category->id)?"selected":""}}>{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group col-md-6 col-sm-8">
                             <label for="unit_id">Select Unit</label>
                                <select class="form-control select2" name="unit_id">
                                    <option value="">Please select a unit for the product</option>
                                    @foreach ($units as $unit)
                                    <option value="{{ $unit->id }}" {{(@$editData->unit_id == $unit->id)?"selected":""}}>{{ $unit->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                           
                        </div>             
                        
                    <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">{{(@$editData)?'Update':'Submit'}}</button>
                    </form>
                </div>
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
