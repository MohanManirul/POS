
@extends('backend.layouts.master')

@section('title')
Invoice Page - Admin Panel
@endsection

@section('styles')
    <!-- Start datatable css -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.jqueryui.min.css">
@endsection


@section('admin-content')

<!-- page title area start -->
<div class="page-title-area">
    <div class="row align-items-center">
        <div class="col-sm-6">
            <div class="breadcrumbs-area clearfix">
                <h4 class="page-title pull-left">Pending Invoice</h4>
                <ul class="breadcrumbs pull-left">
                    <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li><span>Pending Invoice</span></li>
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
                    @include('backend.layouts.partials.messages')
                    <h4 class="header-title float-left">Pending Invoice List</h4>
                    <p class="float-right">
                        <!-- <a class="btn btn-primary text-white mb-2" href="{{route('admin.invoices.create')}}">+ Create Invoice</a>    -->
                    </p>
                    <div class="clearfix"></div>
                    <div class="data-tables">
                        <table id="dataTable" class="text-center tbl">
                            <thead class="bg-light text-capitalize">
                                <tr>
                                    <th>Sl</th>
                                    <th>Date</th>
                                    <th>Purchase No</th>
                                    <th>Product Name</th>
                                    <th>Supplier</th>
                                    <th>Category</th>
                                    <th>Description</th>
                                    <th>Quantity</th>
                                    <th>Unit Price</th>
                                    <th>Buying Price</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                               @foreach ($allData as $key => $invoice)
                               <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ date('d-m-Y' , strtotime($invoice->date)) }}</td>
                                    <td>{{ $invoice->invoice_no }}</td>  
                                    <td>{{ $invoice['product']['name']}}</td>                                  
                                    <td>{{ $invoice['supplier']['name']}}</td>
                                    <td>{{ $invoice['category']['name']}}</td>
                                    <td>{{ $invoice->description }}</td> 
                                    <td>{{ $invoice->buying_qty }} {{ $invoice['product']['unit']['name']}}</td>
                                    <td>{{ $invoice->unit_price }}</td>  
                                    <td>{{ $invoice->buying_price }}</td> 
                                    <td>
                                        @if($invoice->status== '0')
                                        <span style="color:red; background:#ddd; padding:5px;">Pending</span>
                                        @elseif($invoice->status== '1')
                                        <span style="color:green; background:#ddd; padding:5px;">Approved</span>
                                        @endif
                                    </td> 
                                     
                                     <td>
                                     @if($invoice->status== '0')
                                        <a class="btn btn-danger text-white" href="{{ route('admin.invoices.approve', $invoice->id) }}"
                                        onclick="event.preventDefault(); document.getElementById('delete-form-{{ $invoice->id }}').submit();">
                                            Approve
                                        </a>
                                        @endif
                                        <form id="delete-form-{{ $invoice->id }}" action="{{ route('admin.invoices.approve', $invoice->id) }}" method="POST" style="display: none;">
                                           
                                            @csrf
                                        </form>
                                    </td>
                                </tr>
                               @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- data table end -->
        
    </div>
</div>

@endsection


@section('scripts')
     <!-- Start datatable js -->
     <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
     <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
     <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
     <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
     <script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap.min.js"></script>
     
     <script>
         /*================================
        datatable active
        ==================================*/
        if ($('#dataTable').length) {
            $('#dataTable').DataTable({
                responsive: true
            });
        }

     </script>
@endsection