@extends('frontend.layout.app')
@section('main_content')
<!-- Begin Uren's Breadcrumb Area -->
<div class="breadcrumb-area">
    <div class="container">
        <div class="breadcrumb-content">
            <h2>FAQ</h2>
            <ul>
                <li><a href=" {{ route('home')}} ">Home</a></li>
                <li class="active">Privacy Policy</li>
            </ul>
        </div>
    </div>
</div>
<!-- Uren's Breadcrumb Area End Here -->


@endsection