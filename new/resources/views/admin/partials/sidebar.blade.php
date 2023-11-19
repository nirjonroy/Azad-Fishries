@php
$user=auth()->user();
@endphp
<ul class="sidebar-menu">
  <li class="header">MAIN NAVIGATION</li>

  <li class="treeview {{ Request::segment(2) =='dashboard' ?'active' :''}}">
    <a href="{{ route ('admin.dashboard')}}">
    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
    </a>
  </li>
  
    @if($user->can('slider.view'))
    <li class="treeview {{ Request::segment(2) =='sliders' ?'active' :''}}"><a href="{{ route('admin.sliders.index')}}"><i class="fa fa-list"></i> Slider List</a></li>
    @endif
    
    @if($user->can('brand.view'))
    <li class="treeview {{ Request::segment(2) =='brands' ?'active' :''}}"><a href="{{ route('admin.brands.index')}}"><i class="fa fa-list"></i> Brand List</a></li>
    @endif
    
    @if($user->can('category.view'))
    <li class="treeview {{ Request::segment(2) =='categories' ?'active' :''}}"><a href="{{ route('admin.categories.index')}}"> <i class="fa fa-list"></i> Category List</a> </li>
    @endif

    @if($user->can('product.view') || $user->can('product.create'))
    <li class="treeview  {{ Request::segment(2) =='products' ?'active' :''}}">
        <a href="#">
        <i class="fa fa-product-hunt"></i> <span>Product</span>
        <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
            @if($user->can('product.create'))
            <li class="{{ Request::segment(3) =='create' ?'active' :''}}">
                <a href="{{ route('admin.products.create')}}"><i class="fa fa-plus-circle"></i> Product Create</a>
            </li>
            @endif
            @if($user->can('product.view'))
            <li class="{{ Request::segment(3) =='' ?'active' :''}}">
                <a href="{{ route('admin.products.index')}}"><i class="fa fa-list"></i> Product List</a>
            </li>
            @endif
        </ul>
    </li>
    @endif

    @if($user->can('order.view'))
    <li class="treeview {{ Request::segment(2) =='orders' ?'active' :''}}"><a href="{{ route('admin.orders.index')}}"><i class="fa fa-list"></i> Manage Order List</a></li>
    @endif
    @if($user->can('delivery_charge.view'))
    <li class="treeview {{ Request::segment(2) =='charges' ?'active' :''}}"><a href="{{ route('admin.charges.index')}}"> <i class="fa fa-list"></i> Delivery Charge List</a> </li>
    @endif
    
    @if($user->can('newsletters.view'))
    <li class="treeview {{ Request::segment(2) =='newsletters' ?'active' :''}}"><a href="{{ route('admin.newsletters')}}"> <i class="fa fa-list"></i> Newsletter List</a> </li>
    @endif
    
    
    <li class="treeview {{ Request::segment(2) =='productSell' ?'active' :''}}"><a href="{{ route('admin.productSell')}}"> <i class="fa fa-list"></i> Product Sell Report</a> </li>
     
    <li class="treeview {{ Request::segment(2) =='productSell' ?'active' :''}}"><a href="{{ route('admin.productTrack')}}"> <i class="fa fa-list"></i> Product Track</a> </li>
     <li class="treeview {{ Request::segment(2) =='productSell' ?'active' :''}}"><a href="{{ route('admin.searchTrack')}}"> <i class="fa fa-list"></i> Search Track</a> </li>
  <li class="header">Authorisation Panel</li>
    
    
    @if($user->can('user.view') || $user->can('user.create') || $user->can('customer.view'))
    <li class="treeview  {{ Request::segment(2) =='users' || Request::segment(2) =='users-customers' ?'active' :''}}">
        <a href="#">
        <i class="fa fa-user"></i> <span>User</span>
        <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
            @if($user->can('user.create'))
          <li class="{{ Request::segment(3) =='create' ?'active' :''}}">
            <a href="{{ route('admin.users.create')}}"><i class="fa fa-plus-circle"></i> User Create</a>
          </li>
          @endif
          
          @if($user->can('user.view'))
          <li class="{{ Request::segment(3) =='' ?'active' :''}}">
            <a href="{{ route('admin.users.index')}}"><i class="fa fa-list"></i> User List</a>
          </li>
          @endif
          
          @if($user->can('customer.view'))
          <li class="{{ Request::segment(2) =='users-customers' ?'active' :''}}">
            <a href="{{ route('admin.customers')}}"><i class="fa fa-list"></i> Customer List</a>
          </li>
          @endif
          
        </ul>
    </li>
    @endif

    @if($user->can('role.view') || $user->can('role.create'))
    <li class="treeview  {{ Request::segment(2) =='roles' ?'active' :''}}">
        <a href="#">
        <i class="fa fa-product-hunt"></i> <span>Role</span>
        <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
            @if($user->can('role.create'))
          <li class="{{ Request::segment(3) =='create' ?'active' :''}}">
            <a href="{{ route('admin.roles.create')}}"><i class="fa fa-plus-circle"></i> Role Create</a>
          </li>
          @endif
          
          @if($user->can('role.view'))
          <li class="{{ Request::segment(3) =='' ?'active' :''}}">
            <a href="{{ route('admin.roles.index')}}"><i class="fa fa-list"></i> Role List</a>
          </li>
          @endif
        </ul>
    </li>
    @endif

    @if($user->can('permission.index') || $user->can('permission.create'))
  <li class="treeview  {{ Request::segment(2) =='permissions' ?'active' :''}}">
    <a href="#">
    <i class="fa fa-product-hunt"></i> <span>Permission</span>
    <i class="fa fa-angle-left pull-right"></i>
    </a>
    <ul class="treeview-menu">
        @if($user->can('permission.create'))
      <li class="{{ Request::segment(3) =='create' ?'active' :''}}">
        <a href="{{ route('admin.permissions.create')}}"><i class="fa fa-plus-circle"></i> Permission Create</a>
      </li>
      @endif
      
      @if($user->can('permission.index'))
      <li class="{{ Request::segment(3) =='' ?'active' :''}}">
        <a href="{{ route('admin.permissions.index')}}"><i class="fa fa-list"></i> Permission List</a>
      </li>
      @endif
    </ul>
  </li>
  @endif


</ul>