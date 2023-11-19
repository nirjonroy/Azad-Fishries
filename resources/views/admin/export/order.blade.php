<table border='1' width='100%' cellpadding='3' cellspacing="0" style='border-collapse: collapse;font-size:12px' >
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
        </tr>
        @foreach($items as $item)
        <tr>
            <td>{{$item->invoice_no}}</td>
            <td>{{ date("d M ,Y", strtotime($item->created_at))}}</td>
            <td>{{$item->name}}</td>
            <td>{{$item->phone}}</td>
            <td>{{ $item->status}}</td>
            <td>BDT {{$item->discount}}</td>
            <td>BDT {{$item->shipping_charge}}</td>
            <td>BDT {{$item->total}} for {{$item->details->count()}} items</td>
        </tr>
        @endforeach
    </tbody>
</table>