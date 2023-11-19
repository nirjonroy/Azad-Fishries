@extends('admin.layout.app')
@section('admin_content')
<div class="row">
    <h3 class="well">Order List</h3>
    <div class="col-md-12">
		<form>
		    <div class="col-sm-4">
		        <input type="submit" name="button" value="excel" class="btn btn-sm btn-primary">
		    </div>
            
        </form>
	</div>
	<div class="col-md-12">
		<div class="table-responsive">
    	<table class="table table-bordered table-hover table-striped">
            <tbody>
                <tr>
                    <th>ORDER</th>
                    <th>DATE</th>
                    <th>User</th>
                    <th>Phone</th>
                    <th>Status</th>
                    <th>Discount</th>
                    <th>Charge</th>
                    <th>TOTAL</th>
                    <th>Action</th>
                </tr>
                @foreach($items as $item)
                <tr>
                    <td><a class="account-order-id btn-modal" data-href="{{ route('admin.orders.edit',[$item->id]) }}">#{{$item->invoice_no}}</a></td>
                    <td>{{ date("d M ,Y", strtotime($item->created_at))}}</td>
                    <td>{{$item->name}}</td>
                    <td>{{$item->phone}}</td>
                    <td><a class="account-order-id btn-modal" data-href="{{ route('admin.orders.edit',[$item->id]) }}">{{ $item->status}}</a></td>
                    <td>BDT {{$item->discount}}</td>
                    <td>BDT {{$item->shipping_charge}}</td>
                    <td>BDT {{$item->total}} for {{$item->details->count()}} items</td>
                    <td>
                        <a href="{{ route('admin.orders.show',[$item->id])}}" class="btn btn-sm btn-primary"><span class="fa fa-eye"></span> View</a>
                        <a href="{{ route('admin.invoice',[$item->id])}}" class="btn btn-sm btn-info" target="_blank"><span class="fa fa-print"></span> Invoice</a>
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