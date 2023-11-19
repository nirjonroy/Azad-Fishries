@extends('admin.layout.app')
@section('admin_content')
<div class="row">
	<div class="col-md-12">
		<h3 class="well"> Search Track List</h3>
		<div class="table-responsive">
    	<table class="table table-bordered table-striped" id="brands_table">
    		<thead>
    			<tr>
    				<th>SL</th>
    				<th>Search Name</th>
    				<th>Action</th>
    			</tr>
    		</thead>
    		<tbody>
    			@forelse($search_track as $item)
    			<tr>
    				<td>{{ $item->id}}</td>
    				<td>{{ $item->search_value}}</td>
    				<td> <a class="btn btn-danger" href="delete_search/{{ $item->id }}">
                                        Delete
                                    </a></td>
    				
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