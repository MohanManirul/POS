 <!-- sidebar menu area start -->

 @php
     $usr = Auth::guard('admin')->user();
 @endphp
 <div class="sidebar-menu">
    <div class="sidebar-header">
        <div class="logo">
            <a href="{{ route('admin.dashboard')}}">
                Admin Dashboard pos
            </a>
        </div>
    </div>
    <div class="main-menu">
        <div class="menu-inner">
            <nav>
                <ul class="metismenu" id="menu">

                    @if ($usr->can('dashboard.view'))
                    <li class="active">
                        <a href="javascript:void(0)" aria-expanded="true"><i class="ti-dashboard"></i><span>dashboard</span></a>
                        <ul class="collapse">
                            <li class="{{ Route::is('admin.dashboard') ? 'active' : '' }}"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        </ul>
                    </li>
                    @endif

                    @if ($usr->can('role.create') || $usr->can('role.view') ||  $usr->can('role.edit') ||  $usr->can('role.delete'))
                    <li>
                        <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-tasks"></i><span>
                            Roles & Permissions
                        </span></a>
                        <ul class="collapse {{ Route::is('admin.roles.create') || Route::is('admin.roles.index') || Route::is('admin.roles.edit') || Route::is('admin.roles.show') ? 'in' : '' }}">
                            @if ($usr->can('role.view'))
                                <li class="{{ Route::is('admin.roles.index')  || Route::is('admin.roles.edit') ? 'active' : '' }}"><a href="{{ route('admin.roles.index') }}">All Roles</a></li>
                            @endif
                            @if ($usr->can('role.create'))
                                <li class="{{ Route::is('admin.roles.create')  ? 'active' : '' }}"><a href="{{ route('admin.roles.create') }}">Create Role</a></li>
                            @endif
                        </ul>
                    </li>
                    @endif
                    
                    <!--- Admin management ----->

                    @if ($usr->can('admin.create') || $usr->can('admin.view') ||  $usr->can('admin.edit') ||  $usr->can('admin.delete'))
                    <li>
                        <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-user"></i><span>
                            Admins
                        </span></a>
                        <ul class="collapse {{ Route::is('admin.admins.create') || Route::is('admin.admins.index') || Route::is('admin.admins.edit') || Route::is('admin.admins.show') ? 'in' : '' }}">
                            
                            @if ($usr->can('admin.view'))
                                <li class="{{ Route::is('admin.admins.index')  || Route::is('admin.admins.edit') ? 'active' : '' }}"><a href="{{ route('admin.admins.index') }}">All Admins</a></li>
                            @endif

                            @if ($usr->can('admin.create'))
                                <li class="{{ Route::is('admin.admins.create')  ? 'active' : '' }}"><a href="{{ route('admin.admins.create') }}">Create Admin</a></li>
                            @endif
                        </ul>
                    </li>
                    @endif
                    <!--- Admin management ----->

            <!--- Suppliers management ----->

            @if ($usr->can('admin.create') || $usr->can('admin.view') ||  $usr->can('admin.edit') ||  $usr->can('admin.delete'))
                    <li>
                        <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-user"></i><span>
                        Suppliers
                        </span></a>
                        <ul class="collapse {{ Route::is('admin.suppliers.create') || Route::is('admin.suppliers.index') || Route::is('admin.suppliers.edit') || Route::is('admin.suppliers.show') ? 'in' : '' }}">
                            
                            @if ($usr->can('admin.view'))
                                <li class="{{ Route::is('admin.suppliers.index')  || Route::is('admin.suppliers.edit') ? 'active' : '' }}"><a href="{{ route('admin.suppliers.index') }}">All Suppliers</a></li>
                            @endif

                            @if ($usr->can('admin.create'))
                                <li class="{{ Route::is('admin.suppliers.create')  ? 'active' : '' }}"><a href="{{ route('admin.suppliers.create') }}">Create Suppliers</a></li>
                            @endif
                        </ul>
                    </li>
                    @endif
                    <!--- Suppliers management ----->
                    
            <!--- Customer management ----->

            @if ($usr->can('admin.create') || $usr->can('admin.view') ||  $usr->can('admin.edit') ||  $usr->can('admin.delete'))
                    <li>
                        <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-user"></i><span>
                        Customer
                        </span></a>
                        <ul class="collapse {{ Route::is('admin.customers.create') || Route::is('admin.customers.index') || Route::is('admin.customers.edit') || Route::is('admin.customers.show') ? 'in' : '' }}">
                            
                            @if ($usr->can('admin.view'))
                                <li class="{{ Route::is('admin.customers.index')  || Route::is('admin.customers.edit') ? 'active' : '' }}"><a href="{{ route('admin.customers.index') }}">All Customers</a></li>
                            @endif

                            @if ($usr->can('admin.create'))
                                <li class="{{ Route::is('admin.customers.create')  ? 'active' : '' }}"><a href="{{ route('admin.customers.create') }}">Create Customer</a></li>
                            @endif
                        </ul>
                    </li>
                    @endif
                    <!--- Suppliers management ----->



            <!--- Unit management ----->

            @if ($usr->can('admin.create') || $usr->can('admin.view') ||  $usr->can('admin.edit') ||  $usr->can('admin.delete'))
                    <li>
                        <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-user"></i><span>
                        Units
                        </span></a>
                        <ul class="collapse {{ Route::is('admin.units.create') || Route::is('admin.units.index') || Route::is('admin.units.edit') || Route::is('admin.units.show') ? 'in' : '' }}">
                            
                            @if ($usr->can('admin.view'))
                                <li class="{{ Route::is('admin.units.index')  || Route::is('admin.units.edit') ? 'active' : '' }}"><a href="{{ route('admin.units.index') }}">All Units</a></li>
                            @endif

                            @if ($usr->can('admin.create'))
                                <li class="{{ Route::is('admin.units.create')  ? 'active' : '' }}"><a href="{{ route('admin.units.create') }}">Create Unit</a></li>
                            @endif
                        </ul>
                    </li>
                    @endif
                    <!--- Unit management ----->

                    
            <!--- Categories management ----->

            @if ($usr->can('admin.create') || $usr->can('admin.view') ||  $usr->can('admin.edit') ||  $usr->can('admin.delete'))
                    <li>
                        <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-user"></i><span>
                        Categories
                        </span></a>
                        <ul class="collapse {{ Route::is('admin.categories.create') || Route::is('admin.categories.index') || Route::is('admin.categories.edit') || Route::is('admin.categories.show') ? 'in' : '' }}">
                            
                            @if ($usr->can('admin.view'))
                                <li class="{{ Route::is('admin.categories.index')  || Route::is('admin.categories.edit') ? 'active' : '' }}"><a href="{{ route('admin.categories.index') }}">All Categoriess</a></li>
                            @endif

                            @if ($usr->can('admin.create'))
                                <li class="{{ Route::is('admin.categories.create')  ? 'active' : '' }}"><a href="{{ route('admin.categories.create') }}">Create Categories</a></li>
                            @endif
                        </ul>
                    </li>
                    @endif
                    <!--- Categories management ----->


 


        <!--- Products management ----->

            @if ($usr->can('admin.create') || $usr->can('admin.view') ||  $usr->can('admin.edit') ||  $usr->can('admin.delete'))
                    <li>
                        <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-user"></i><span>
                        Products
                        </span></a>
                        <ul class="collapse {{ Route::is('admin.products.create') || Route::is('admin.products.index') || Route::is('admin.products.edit') || Route::is('admin.products.show') ? 'in' : '' }}">
                            
                            @if ($usr->can('admin.view'))
                                <li class="{{ Route::is('admin.products.index')  || Route::is('admin.products.edit') ? 'active' : '' }}"><a href="{{ route('admin.products.index') }}">All Products</a></li>
                            @endif

                            @if ($usr->can('admin.create'))
                                <li class="{{ Route::is('admin.products.create')  ? 'active' : '' }}"><a href="{{ route('admin.products.create') }}">Create Product</a></li>
                            @endif
                        </ul>
                    </li>
                    @endif
            <!--- Products management ----->

            <!--- Purchases management ----->

            @if ($usr->can('admin.create') || $usr->can('admin.view') ||  $usr->can('admin.edit') ||  $usr->can('admin.delete'))
                    <li>
                        <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-user"></i><span>
                        Purchases
                        </span></a>
                        <ul class="collapse {{ Route::is('admin.purchases.create') || Route::is('admin.purchases.index') || Route::is('admin.purchases.edit') || Route::is('admin.purchases.show') ? 'in' : '' }}">
                            
                            @if ($usr->can('admin.view'))
                                <li class="{{ Route::is('admin.purchases.index')  || Route::is('admin.purchases.edit') ? 'active' : '' }}"><a href="{{ route('admin.purchases.index') }}">All Purchases</a></li>
                            @endif

                            @if ($usr->can('admin.create'))
                                <li class="{{ Route::is('admin.purchases.create')  ? 'active' : '' }}"><a href="{{ route('admin.purchases.create') }}">Create Purchases</a></li>
                            @endif

                            @if ($usr->can('admin.create'))
                                <li class="{{ Route::is('admin.purchases.pending.list')  ? 'active' : '' }}"><a href="{{ route('admin.purchases.pending.list') }}">Approval Purchase</a></li>
                            @endif
                        </ul>
                    </li>
                    @endif
            <!--- Purchases management ----->


            <!--- Invoice management ----->

            @if ($usr->can('admin.create') || $usr->can('admin.view') ||  $usr->can('admin.edit') ||  $usr->can('admin.delete'))
                    <li>
                        <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-user"></i><span>
                        Invoice
                        </span></a>
                        <ul class="collapse {{ Route::is('admin.invoices.create') || Route::is('admin.invoices.index') || Route::is('admin.invoices.edit') || Route::is('admin.invoices.show') ? 'in' : '' }}">
                            
                            @if ($usr->can('admin.view'))
                                <li class="{{ Route::is('admin.invoices.index')  || Route::is('admin.invoices.edit') ? 'active' : '' }}"><a href="{{ route('admin.invoices.index') }}">All Invoice</a></li>
                            @endif

                            @if ($usr->can('admin.create'))
                                <li class="{{ Route::is('admin.invoices.create')  ? 'active' : '' }}"><a href="{{ route('admin.invoices.create') }}">Create Invoice</a></li>
                            @endif

                            @if ($usr->can('admin.create'))
                                <li class="{{ Route::is('admin.invoices.pending.list')  ? 'active' : '' }}"><a href="{{ route('admin.invoices.pending.list') }}">Approval Invoice</a></li>
                            @endif
                        </ul>
                    </li>
                    @endif
            <!--- Invoice management ----->

                </ul>
            </nav>
        </div>
    </div>
</div>
<!-- sidebar menu area end -->