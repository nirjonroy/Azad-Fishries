<script src="{{ asset ('admin/js/jquery-1.11.1.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
<script src="{{ asset('admin/js/classie.js')}}"></script>

<script src="{{ asset('admin/js/jquery.nicescroll.js')}}"></script>
<script src="{{ asset('admin/js/scripts.js')}}"></script>

<script src="{{ asset('admin/js/SidebarNav.min.js')}}" type='text/javascript'></script>
<script src="{{ asset('admin/js/bootstrap.js')}}"> </script>

<script>
    var menuLeft = document.getElementById( 'cbp-spmenu-s1' ),
        showLeftPush = document.getElementById( 'showLeftPush' ),
        body = document.body;
        
    showLeftPush.onclick = function() {
        classie.toggle( this, 'active' );
        classie.toggle( body, 'cbp-spmenu-push-toright' );
        classie.toggle( menuLeft, 'cbp-spmenu-open' );
        disableOther( 'showLeftPush' );
    };
    

    function disableOther( button ) {
        if( button !== 'showLeftPush' ) {
            classie.toggle( showLeftPush, 'disabled' );
        }
    }
</script>
<script>
  $('.sidebar-menu').SidebarNav();

  //  modaL
$(document).on('click','a.btn-modal',function(e){
    e.preventDefault();
    var url =$(this).data('href');
    $.ajax({
        url: url,
        type: 'GET',
        dataType: 'json', // added data type
        success: function(res) {     
            if (res.status) {
                $('div#common_modal').html(res.html);

                setTimeout(function(){ 
                    $('div#common_modal').modal('show');

                 }, 1000);

            }else{
                toastr.error('Something Went Wrong');
            }
        }
    });
});

</script>

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
@stack('js')
	<!-- //side nav js -->
