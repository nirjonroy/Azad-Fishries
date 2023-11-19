<div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Brand Update</h4>
      </div>
      <div class="modal-body">
        	<form class="form-horizontal" action="{{ route('admin.brands.update',[$brand->id])}}" method="post" enctype="multipart/form-data">
				@csrf
				@method('PATCH')
			  	<div class="form-group">
				    <label class="control-label col-sm-2" >Name:</label>
				    <div class="col-sm-10">
				      <input type="text" class="form-control" placeholder="Enter Name" name="name" value="{{$brand->name}}">
				      	@if($errors->has('name'))
						    <div class="error">{{ $errors->first('name') }}</div>
						@endif
				    </div>
			  	</div>

			  	<div class="form-group">
				    <label class="control-label col-sm-2" >Name:</label>
				    <div class="col-sm-10">
				      <input type="file" class="form-control" name="image">
				      	@if($errors->has('image'))
						    <div class="error">{{ $errors->first('image') }}</div>
						@endif
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