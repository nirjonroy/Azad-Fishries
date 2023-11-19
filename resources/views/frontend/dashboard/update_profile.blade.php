@extends('frontend.layout.app')

@push('css')

<style>

    .error{
        color:red;
    }
</style>
@endpush
@section('main_content')
<!-- Begin Uren's Breadcrumb Area -->
<div class="breadcrumb-area">
<div class="container">
    <div class="breadcrumb-content">
        <div class="breadcrumb-content">
        <h2>Account</h2>
        <ul>
            <li><a href="{{ route('home')}}">Home</a></li>
            <li class="active">My Account</li>
        </ul>
    </div>
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
                    <div class="container">
                        <div class="row">
                           
                            <div class="col-md-8 border-right">
                                <form action="{{ route ('post_update_profile')}}" method="post">
                                    @csrf
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <h4 class="text-right">Profile Settings</h4>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-md-12">
                                            <label class="labels">Name</label>
                                            <input type="text" class="form-control" value="{{ $user->name}}" name="name">
                                            @if($errors->has('name'))
            								    <div class="error">{{ $errors->first('name') }}</div>
            								@endif
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-md-12">
                                            <label class="labels">PhoneNumber</label>
                                            <input type="text" class="form-control" value="{{ $user->phone}}" name="phone">
                                            @if($errors->has('phone'))
            								    <div class="error">{{ $errors->first('phone') }}</div>
            								@endif
                                        </div>
                                        
                                        <div class="col-md-12">
                                            <label class="labels">Address</label>
                                            <textarea name="address" class="form-control" placeholder="Address">{{ $user->address }}</textarea>
                                            @if($errors->has('address'))
            								    <div class="error">{{ $errors->first('address') }}</div>
            								@endif
                                        </div>
                                        
                                        <div class="col-md-12">
                                            <label class="labels">Email ID</label>
                                            <input type="text" class="form-control" value="{{ $user->email}}" name="email">
                                            @if($errors->has('email'))
            								    <div class="error">{{ $errors->first('email') }}</div>
            								@endif
                                        </div>
                                        
                                        
                                        <div class="col-md-12">
                                            <label class="labels">old password</label>
                                            <input type="password" class="form-control" placeholder="old password" name="old_password">
                                            <p>(if don't want to update password, please put it empty !)</p>
                                            @if($errors->has('old_password'))
            								    <div class="error">{{ $errors->first('old_password') }}</div>
            								@endif
                                        </div>
                                        
                                        <div class="col-md-12">
                                            <label class="labels">new password</label>
                                            <input type="password" class="form-control" placeholder="new password" name="password">
                                            @if($errors->has('password'))
            								    <div class="error">{{ $errors->first('password') }}</div>
            								@endif
                                        </div>
                                        
                                        <div class="col-md-12">
                                            <label class="labels">Confirm Password</label>
                                            <input type="password" class="form-control" placeholder="Confirm Password" name="password_confirm">
                                            
                                            @if($errors->has('password_confirm'))
            								    <div class="error">{{ $errors->first('password_confirm') }}</div>
            								@endif
            								
                                        </div>
                                        
                                        
                                        
                                    </div>
                                    
                                    <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="submit">Update Profile</button></div>
                                </form>
                            </div>
                            
                        </div>
                    </div>
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