@extends('frontend.layout.app')
@section('main_content')
<!-- Begin Uren's Breadcrumb Area -->
<div class="breadcrumb-area">
<div class="container">
    <div class="breadcrumb-content">
        <h2>Account</h2>
        <ul>
            <li><a href="{{ route('home')}}">Home</a></li>
            <li class="active">My Account</li>
        </ul>
    </div>
</div>
</div>
<!-- Uren's Breadcrumb Area End Here -->
<!-- Begin Uren's Page Content Area -->
<main class="page-content">
<!-- Begin Uren's Account Page Area -->
<div class="account-page-area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3">
                <ul class="nav myaccount-tab-trigger" id="account-page-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link {{ Request::segment(1) =='my-account' ?'active' :''}}" href="{{ route('myAccount')}}">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::segment(1) =='user-order-list' ?'active' :''}}" href="{{ route('user_order_list')}}">Orders</a>
                    </li>
                    <!--<li class="nav-item">-->
                    <!--    <a class="nav-link {{ Request::segment(1) =='profile-details' ?'active' :''}}" href="{{ route('profile_details')}}">Profile Details</a>-->
                    <!--</li>-->
                    <li class="nav-item">
                        <a class="nav-link {{ Request::segment(1) =='update-profile' ?'active' :''}}" href="{{ route('update_profile')}}"> Update Profile</a>
                    </li>
                </ul>
            </div>
            <div class="col-lg-9">
                <div class="">
                    <div class="myaccount-orders">
                        <h4 class="small-title">MY ORDERS</h4>
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <tbody>
                                    <tr>
                                        <th>ORDER</th>
                                        <th>DATE</th>
                                        <th>STATUS</th>
                                        <th>Charge Amount</th>
                                        <th>TOTAL</th>
                                        <th></th>
                                    </tr>
                                    @foreach($items as $item)
                                    <tr>
                                        <td><a class="account-order-id" href="javascript:void(0)">#{{$item->invoice_no}}</a></td>
                                        <td>{{ date("d M ,Y", strtotime($item->created_at))}}</td>
                                        <td>{{ $item->status}}</td>
                                        <td>BDT {{$item->shipping_charge}}</td>
                                        <td>BDT {{$item->total}} for {{$item->details->count()}} items</td>
                                        <td><a href="{{ route ('user_order_details',[$item->id])}}" class="btn btn-sm btn-info" target="_blank"><span class="fa fa-eye"> View</span></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Uren's Account Page Area End Here -->
</main>
<!-- Uren's Page Content Area End Here -->

@endsection