<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use App\Order;
use App\Newsletter;
use App\Exports\OrderExport;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         if(!auth()->user()->can('order.view')){
            abort(403, 'Unauthorized action.');
        } 
        $query=Order::with('details');
            if(request('q') !=''){
            $query->where('invoice_no','Like','%'.request('q').'%');
        }
        
        
        if (request('button') =='excel') {
            $data['items']=$query->latest()->get();
            return Excel::download(new OrderExport($data), 'order_list.xls');
        }else{
            $items=$query->latest()->paginate(30);
        }
        
    
        return view('admin.orders.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         if(!auth()->user()->can('order.view')){
            abort(403, 'Unauthorized action.');
        } 
        $order=Order::with('details','details.product','user')->find($id);
        return view('admin.orders.show', compact('order'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         if(!auth()->user()->can('order.update')){
            abort(403, 'Unauthorized action.');
        } 
        $order=Order::find($id);
        $html= view('admin.orders.partials.status_update', compact('order'))->render();
        return response()->json(['status'=>1,'html'=>$html]);
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         if(!auth()->user()->can('order.update')){
            abort(403, 'Unauthorized action.');
        } 
        $order=Order::find($id);
        $order->status=request('status');
        $order->save();
        return back()->with('success',' Order Status Updated');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $order=Order::find($id);
        $order->details()->delete();
        $order->delete();
        return back()->with('success','Order Deleted');
        
    }

    public function orderInvoice($id){
         if(!auth()->user()->can('order.print')){
            abort(403, 'Unauthorized action.');
        } 

        $order=Order::with('details','details.product','user')->find($id);
        return view('admin.orders.invoice', compact('order'));

    }
    
    public function newsletters()
    {
        if(!auth()->user()->can('newsletters.view')){
            abort(403, 'Unauthorized action.');
        } 
        $query=Newsletter::latest();
            if(request('q') !=''){
            $query->where('email','Like','%'.request('q').'%');
        }
        
  
        $items=$query->latest()->paginate(30);
        
        
    
        return view('admin.orders.newsletters', compact('items'));
    }
    
}
