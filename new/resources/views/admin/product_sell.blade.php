@extends('admin.layout.app')
@section('admin_content')
<div class="row">
	<div class="col-md-12">
		<h3 class="well">To Sell Product List</h3>
		<div class="table-responsive">
    	<table class="table table-bordered table-striped" id="brands_table">
    		<thead>
    			<tr>
    				<th>Product Name</th>
    				<th>Quantity</th>
    			</tr>
    		</thead>
    		<tbody>
    			@forelse($products as $item)
    			<tr>
    				<td>{{ $item->name}}</td>
    				<td>{{ $item->total_sell}}</td>
    				
    			</tr>
    			@empty
    			<tr>
    				<td colspan="2">No Records Found</td>
    			</tr>
    			@endforelse
    		</tbody>
    	</table>
    </div>
	<p>{!! urldecode(str_replace("/?","?",$products->appends(Request::all())->render())) !!}</p>
	</div>
</div>

@endsection