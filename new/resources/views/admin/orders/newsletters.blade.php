@extends('admin.layout.app')
@section('admin_content')
<div class="row">
    <h3 class="well">Newsletter List</h3>
	<div class="col-md-12">
		<div class="table-responsive">
    	<table class="table table-bordered table-hover table-striped">
            <tbody>
                <tr>
                    <th>SL</th>
                    <th>Email</th>
                    <th>DATE</th>
                    <th>Action</th>
                </tr>
                @foreach($items as $key => $item)
                <tr>
                    <td>#{{$key +1}}</a></td>
                    <td>{{$item->email}}</td>
                    <td>{{ date("d M ,Y", strtotime($item->created_at))}}</td>
                    <td>
                        
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
	<p>{!! urldecode(str_replace("/?","?",$items->appends(Request::all())->render())) !!}</p>	
	</div>
</div>

@endsection