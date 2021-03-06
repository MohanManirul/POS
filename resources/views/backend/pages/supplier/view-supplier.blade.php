
@extends('backend.layouts.master')

@section('title')
suppliers Page - Admin Panel
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
                <h4 class="page-title pull-left">Suppliers</h4>
                <ul class="breadcrumbs pull-left">
                    <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li><span>All Suppliers</span></li>
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
                    <h4 class="header-title float-left">Suppliers List</h4>
                    <p class="float-right">
                        <a class="btn btn-primary text-white mb-2" href="{{route('admin.suppliers.create')}}">+ Create Supplier</a>   
                    </p>
                    <div class="clearfix"></div>
                    <div class="data-tables">
                        <table id="dataTable" class="text-center">
                            <thead class="bg-light text-capitalize">
                                <tr>
                                    <th>Sl</th>
                                    <th>Name</th>
                                    <th>Address</th>
                                    <th>Mobile_No</th>
                                    <th>Email</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                               @foreach ($allData as $key => $suppliers)
                               <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $suppliers->name }}</td>
                                    <td>{{ $suppliers->address }}</td>
                                    <td>{{ $suppliers->mobile_no }}</td>
                                    <td>{{ $suppliers->email }}</td>  
                                     <td>
                                        <a class="btn btn-success text-white" href="{{ route('admin.suppliers.edit', $suppliers->id) }}">Edit</a>
                                        @php 
                                            $count_suplliers = App\Models\Backend\Products::where('supplier_id',$suppliers->id)->count();
                                        @endphp

                                        @if($count_suplliers<1)
                                        <a class="btn btn-danger text-white" href="{{ route('admin.suppliers.destroy', $suppliers->id) }}"
                                        onclick="event.preventDefault(); document.getElementById('delete-form-{{ $suppliers->id }}').submit();">
                                            Delete
                                        </a>
                                        @endif
                                        <form id="delete-form-{{ $suppliers->id }}" action="{{ route('admin.suppliers.destroy', $suppliers->id) }}" method="POST" style="display: none;">
                                            @method('DELETE')
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