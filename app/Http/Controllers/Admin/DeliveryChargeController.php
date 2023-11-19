<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\DeliveryCharge;
class DeliveryChargeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   if(!auth()->user()->can('delivery_charge.view')){
            abort(403, 'Unauthorized action.');
        } 
        $query=DeliveryCharge::orderBy('title');
            $q=request('q');
            if (!empty($q)) {
                $query->where('title','Like','%'.$q.'%');
            }
        $items=$query->paginate(20);
        return view('admin.charge.index', compact('items'));
    }

    public function store(Request $request)
    {   if(!auth()->user()->can('delivery_charge.create')){
            abort(403, 'Unauthorized action.');
        } 
        $validatedData = $request->validate([
            'title' => 'required',
            'amount' => 'required|numeric',
        ]);

        DeliveryCharge::create($validatedData);
        return back()->with('success',' DeliveryCharge Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    { if(!auth()->user()->can('delivery_charge.update')){
            abort(403, 'Unauthorized action.');
        } 
        $charge=DeliveryCharge::find($id);

        $html= view('admin.charge.edit', compact('charge'))->render();
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
    { if(!auth()->user()->can('delivery_charge.update')){
            abort(403, 'Unauthorized action.');
        } 
        $charge=DeliveryCharge::find($id);
        $charge->title=request('title');
        $charge->amount=request('amount');
        $charge->save();
        return back()->with('success',' DeliveryCharge Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   if(!auth()->user()->can('delivery_charge.delete')){
            abort(403, 'Unauthorized action.');
        } 
        $brand=DeliveryCharge::find($id);
        $brand->delete();
        return back()->with('success',' DeliveryCharge Deleted');

    }

}
