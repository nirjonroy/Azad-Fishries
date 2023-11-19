<div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Brand Update</h4>
      </div>
      <div class="modal-body">
        	<form class="form-horizontal" action="{{ route('admin.charges.update',[$charge->id])}}" method="post">
				@csrf
				@method('PATCH')

				<div class="form-group">
			  	 <label class="control-label col-sm-2" >Title:</label>
				    <div class="col-sm-10">
				      <input type="text" class="form-control" name="title" value="{{ $charge->title}}">
				      	
				    </div>
				  </div>

				<div class="form-group">
				    <label class="control-label col-sm-2" >Amount:</label>
				    <div class="col-sm-10">
				      <input type="text" class="form-control" placeholder="Enter Name" name="amount" value="{{ $charge->amount}}">
				      	
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