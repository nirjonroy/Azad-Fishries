@extends('admin.layout.app')
@section('admin_content')
<div class="row">
  <div class="col-md-6">
      <div class="panel panel-default">
		<div class="panel-heading"> <h3>Brand List</h3></div>
		<div class="panel-body">
          	<div class="table-responsive">
            	<table class="table table-bordered table-striped" id="brands_table">
            		<thead>
            			<tr>
            				<th>Brand Name</th>
            				<th>Brand Image</th>
            				<th>Action</th>
            			</tr>
            		</thead>
            		<tbody>
            			@forelse($items as $item)
            			<tr>
            				<td>{{ $item->name}}</td>
            				<td>
    	    					<img src='{{ imgUrl("brand",$item->image)}}' width="120">
    	    				</td>
            				<td>
            					<a class="btn btn-sm btn-success btn-modal" data-href="{{ route('admin.brands.edit',[$item->id]) }}"><i class="fa fa-edit"></i>Edit</a>
            					<form action="{{ route('admin.brands.destroy',[$item->id]) }}" method="POST">
    							    @method('DELETE')
    							    @csrf
    							    <button class="btn btn-sm btn-danger" onclick="return confirm(' you want to delete?');"><i class="fa fa-trash"></i> Delete</button>
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
    </div>
  </div>
  <div class="col-md-6">
  	<div class="col-md-12">
  	    <div class="panel panel-default">
			<div class="panel-heading"> <h3>Brand Create</h3></div>
			<div class="panel-body">
          		<form class="form-horizontal" action="{{ route('admin.brands.store')}}" method="post" enctype="multipart/form-data">
          			@csrf
        			  	<div class="form-group">
        				    <label class="control-label col-sm-2" >Name:</label>
        				    <div class="col-sm-10">
        				      <input type="text" class="form-control" placeholder="Enter Name" name="name">
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
        				      <button type="submit" class="btn btn-primary">Submit</button>
        				    </div>
        			  	</div>
        		</form>
            </div>
        </div>
  	</div>
  </div>
</div>
@endsection