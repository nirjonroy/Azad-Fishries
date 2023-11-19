<div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"><b>#{{$order->invoice_no}}</b>  Order Status Update</h4>
      </div>
      <div class="modal-body">
        	<form class="form-horizontal" action="{{ route('admin.orders.update',[$order->id])}}" method="post">
				@csrf
				@method('PATCH')
			  <div class="form-group">
			    <label class="control-label col-sm-2" >Status:</label>
			    <div class="col-sm-10">
			        <label class="radio-inline"><input type="radio" name="status" checked value="pending" {{ $order->status=="pending" ?'checked':''}}> Pending </label>
                    <label class="radio-inline"><input type="radio" name="status" value="processing" {{ $order->status=="processing" ?'checked':''}}> Processing</label>
                    <label class="radio-inline"><input type="radio" name="status" value="complete" {{ $order->status=="complete" ?'checked':''}}> Complete</label>
			        
			    </div>
			  </div>

			  <div class="form-group">
			    <div class="col-sm-offset-2 col-sm-10">
			      <button type="submit" class="btn btn-primary">Update</button>
			    </div>
			  </div>
			</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

</div>