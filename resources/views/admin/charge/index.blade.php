@extends('admin.layout.app')
@section('admin_content')

<div class="row">
		<div class="col-md-12">
			<div class="col-md-6">
				<div class="panel panel-default">
					<div class="panel-heading"> <h3>Delivery Charge List</h3></div>
					<div class="panel-body">
						<div class="table-responsive">
		            	<table class="table table-bordered table-striped" id="categories_table">
		            		<thead>
		            			<tr>
		            				<th>Title</th>
		            				<th>Amount</th>
		            				<th>Edit</th>
		            				<th>Delete</th>
		            			</tr>
		            		</thead>
		            		<tbody>
		            			@forelse($items as $item)
		            			<tr>
		            				<td>{{ $item->title}}</td>
		            				<td>{{ $item->amount}}</td>
		            				<td>
		            					<a class="btn btn-sm btn-success btn-modal" data-href="{{ route('admin.charges.edit',[$item->id]) }}"><i class="fa fa-edit"></i>Edit</a>
		            				</td>
		            				<td>
		            					<form action="{{ route('admin.charges.destroy',[$item->id]) }}" method="POST">
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
		        <div class="panel-footer">
            		<p>{!! urldecode(str_replace("/?","?",$items->appends(Request::all())->render())) !!}</p>
		        </div>
		    </div>
			</div>
			<div class="col-md-6">
				<div class="col-md-12">
					<div class="panel panel-default">
					<div class="panel-heading"> <h3>Delivery Charge Create</h3> </div>
					<div class="panel-body">
	      				<form class="form-horizontal" action="{{ route('admin.charges.store')}}" method="post">
	      					@csrf

						  <div class="form-group">
						    <label class="control-label col-sm-2" >Title:</label>
						    <div class="col-sm-10">
						      <input type="text" class="form-control" placeholder="Enter Title" name="title">
						      	@if($errors->has('title'))
								    <div class="error">{{ $errors->first('title') }}</div>
								@endif
						    </div>
						  </div>

						<div class="form-group">
						    <label class="control-label col-sm-2" >Amount:</label>
						    <div class="col-sm-10">
						      <input type="text" class="form-control" placeholder="Enter Name" name="amount">
						      	@if($errors->has('amount'))
								    <div class="error">{{ $errors->first('amount') }}</div>
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
</div>
@endsection