<!-- jQuery JS -->
<script src="{{ asset('assets/js/vendor/jquery-1.12.4.min.js')}}"></script>
<!-- Modernizer JS -->
<script src="{{ asset('assets/js/vendor/modernizr-2.8.3.min.js')}}"></script>
<!-- Popper JS -->
<script src="{{ asset('assets/js/vendor/popper.min.js')}}"></script>
<!-- Bootstrap JS -->
<script src="{{ asset('assets/js/vendor/bootstrap.min.js')}}"></script>

<!-- Slick Slider JS -->
<script src="{{ asset('assets/js/plugins/slick.min.js')}}"></script>
<!-- Barrating JS -->
<script src="{{ asset('assets/js/plugins/jquery.barrating.min.js')}}"></script>
<!-- Counterup JS -->
<script src="{{ asset('assets/js/plugins/jquery.counterup.js')}}"></script>
<!-- Nice Select JS -->
<script src="{{ asset('assets/js/plugins/jquery.nice-select.js')}}"></script>
<!-- Sticky Sidebar JS -->
<script src="{{ asset('assets/js/plugins/jquery.sticky-sidebar.js')}}"></script>
<!-- Jquery-ui JS -->
<script src="{{ asset('assets/js/plugins/jquery-ui.min.js')}}"></script>
<script src="{{ asset('assets/js/plugins/jquery.ui.touch-punch.min.js')}}"></script>
<!-- Lightgallery JS -->
<script src="{{ asset('assets/js/plugins/lightgallery.min.js')}}"></script>
<!-- Scroll Top JS -->
<script src="{{ asset('assets/js/plugins/scroll-top.js')}}"></script>
<!-- Theia Sticky Sidebar JS -->
<script src="{{ asset('assets/js/plugins/theia-sticky-sidebar.min.js')}}"></script>
<!-- Waypoints JS -->
<script src="{{ asset('assets/js/plugins/waypoints.min.js')}}"></script>
<!-- jQuery Zoom JS -->
<script src="{{ asset('assets/js/plugins/jquery.zoom.min.js')}}"></script>

<script src="{{ asset('assets/js/main.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
@if(session()->has('success'))
<script type="text/javascript">
    toastr.success('{{session()->get("success")}}');
</script>
@endif

@if(session()->has('error'))
<script type="text/javascript">
    toastr.error('{{session()->get("error")}}');
</script>
@endif
    
<script type="text/javascript">
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
</script>

@stack('js')