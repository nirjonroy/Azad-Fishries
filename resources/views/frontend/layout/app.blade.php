<!doctype html>
<html class="no-js" lang="zxx">
<?php header('Access-Control-Allow-Origin: *'); ?>
@include('frontend.partials.head')
<body class="template-color-1">

    <div class="main-wrapper">

          <!-- Begin Loading Area -->
        <div class="loading">
            <div class="text-center middle">
                <div class="lds-ellipsis">
                    <img src="{{ asset('images/loading.gif')}}" style="width: 15%;">
                </div>
            </div>
        </div>
        <!-- Loading Area End Here -->

        <!-- Begin Uren's Header Main Area -->
        @include('frontend.partials.header')
        <!-- Uren's Header Main Area End Here -->
        

        

        @yield('main_content')
                                  


        

        <!-- Begin Uren's Footer Area -->
        @include('frontend.partials.footer')
        <!-- Uren's Footer Area End Here -->
     
        <!-- Begin Uren's Modal Area -->
        <div class="modal fade modal-wrapper" id="exampleModalCenter">
            
        </div>
        <!-- Uren's Modal Area End Here -->

    </div>

    <!-- JS -->
    @include('frontend.partials.js')
    <!-- JS -->
</body>

</html>