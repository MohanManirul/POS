
@extends('backend.layouts.master')

@section('title')
Supplier Create - Admin Panel
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
                        Edit Supplier
                        @else
                        Add Supplier
                    @endif
                </h4>

                <ul class="breadcrumbs pull-left">
                    <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li><a href="{{ route('admin.suppliers.index') }}">All Supplier</a>

                    <li>
                        <span>
                        @if(isset($editData))
                            Edit Supplier
                            @else 
                            Add Supplier
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
                    <form id="addSuppliers" action="{{ (@$editData)?(route('admin.suppliers.update', $editData->id)):route('admin.suppliers.store') }}" method="POST">
                       @csrf
                         @if(isset($editData))
                            @method('PUT')
                        @endif
                        <div class="form-row">
                            <div class="form-group col-md-6 col-sm-8">
                                <label for="name">Supplier Name</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Enter Supplier Name" value="{{@$editData->name}}">
                                <font style="color: red">{{($errors->has('name')?($errors->first('name')): '')}}</font>
                            </div> 

                            <div class="form-group col-md-6 col-sm-8">
                                <label for="mobile_no">Mobile No</label>
                                <input type="text" class="form-control" id="mobile_no" name="mobile_no" placeholder="Enter Mobile No" value="{{@$editData->mobile_no}}">
                                <font style="color: red">{{($errors->has('name')?($errors->first('name')): '')}}</font>
                            </div> 

                            <div class="form-group col-md-6 col-sm-8">
                                <label for="address">Address</label>
                                <input type="text" class="form-control" id="address" name="address" placeholder="Enter Address" value="{{@$editData->address}}">
                                <font style="color: red">{{($errors->has('name')?($errors->first('name')): '')}}</font>
                            </div> 

                            <div class="form-group col-md-6 col-sm-8">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email" value="{{@$editData->email}}">
                                <font style="color: red">{{($errors->has('name')?($errors->first('name')): '')}}</font>
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
