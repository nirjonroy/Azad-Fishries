@extends('admin.layout.app')
@section('admin_content')
<div class="row">
  <div class="col-md-6">
  	<h3 class="well"> Slider List</h3>
  	<div class="table-responsive">
    	<table class="table table-bordered table-striped" id="brands_table">
    		<thead>
    			<tr>
    				<th>Slider Image</th>
    				<th>Action</th>
    			</tr>
    		</thead>
    		<tbody>
    			@forelse($items as $item)
    			<tr>
    				<td>
    					<img src='{{ asset("images/slider/$item->image")}}' width="200">
    				</td>
    				<td>
    					<a class="btn btn-sm btn-success btn-modal" data-href="{{ route('admin.sliders.edit',[$item->id]) }}"><i class="fa fa-edit"></i>Edit</a>
    					<form action="{{ route('admin.sliders.destroy',[$item->id]) }}" method="POST">
						    @method('DELETE')
						    @csrf
						    <button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> Delete</button>
						</form>
    				</td>
    			</tr>
    			@empty
    			<tr>
    				<td colspan="2">No Records Found</td>
    			</tr>
    			@endforelse
    		</tbody>
    	</table>
    </div>
  </div>
  <div class="col-md-6">
  	<div class="col-md-12">
  		<h3 class="well"> Slider Create</h3>
  		<form class="form-horizontal" action="{{ route('admin.sliders.store')}}" method="post" enctype="multipart/form-data">
  			@csrf

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
				      <button type="submit" class="btn btn-primary">Submit</button>
				    </div>
			  	</div>
		</form>
  	</div>
  </div>
  		</div>
@endsection