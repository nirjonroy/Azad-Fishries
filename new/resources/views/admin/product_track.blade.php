@extends('admin.layout.app')
@section('admin_content')
<div class="row">
	<div class="col-md-12">
		<h3 class="well"> Product Track List</h3>
		<div class="table-responsive">
    	<table class="table table-bordered table-striped" id="brands_table">
    		<thead>
    			<tr>
    				<th>Product Name</th>
    				<th>Total Click</th>
    			</tr>
    		</thead>
    		<tbody>
    			@forelse($product_tracks as $item)
    			<tr>
    				<td>{{ $item->name}}</td>
    				<td>{{ $item->count}}</td>
    				
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

@endsection