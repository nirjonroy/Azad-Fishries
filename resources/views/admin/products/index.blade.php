@extends('admin.layout.app')
@section('admin_content')
<div class="row">
	<div class="col-md-12">
		<h3 class="well"> Product List</h3>
		<div class="table-responsive">
    	<table class="table table-bordered table-striped" id="brands_table">
    		<thead>
    			<tr>
    				<th>Product Name</th>
    				<th>Category Name</th>
    				<th>Brand Name</th>
    				<th>Image</th>
    				<th>Old Price</th>
    				<th>Sell Price</th>
    				<th>Action</th>
    			</tr>
    		</thead>
    		<tbody>
    			@forelse($items as $item)
    			<tr>
    				<td>{{ $item->name}}</td>
    				<td>{{ $item->category->name}}</td>
    				<td>{{ $item->brand ?$item->brand->name :''}}</td>
    				<td>
    					<img src='{{ imgUrl("product",$item->image)}}' width="120">
    				</td>
    				<td>{{ $item->old_price}}</td>
    				<td>{{ $item->sell_price}}</td>
    				<td>
    					<a class="btn btn-sm btn-success" href="{{ route('admin.products.edit',[$item->id]) }}"><i class="fa fa-edit"></i>Edit</a>
    					<form action="{{ route('admin.products.destroy',[$item->id]) }}" method="POST">
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
	<p>{!! urldecode(str_replace("/?","?",$items->appends(Request::all())->render())) !!}</p>
	</div>
</div>

@endsection