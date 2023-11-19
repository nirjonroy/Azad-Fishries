<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Wishlist;
use App\Product;
class WishlistController extends Controller
{
     public function index(){
        
        $items=Wishlist::with('product')->where('user_id', auth()->user()->id)->latest()->paginate(20);
        
    	return view('frontend.wishlist', compact('items'));
    }
    
    public function store(Request $request)
    {   
        $product=Product::find($request->id);
        $data=['product_id'=>$request->id,'user_id'=>auth()->user()->id];

        Wishlist::updateOrCreate($data,['quantity'=>1,'price'=>$product->sell_price]);
        
        return response()->json(['status'=>1,'msg'=>'Product added to Wishlist successfully!']);
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
    {
        
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
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $brand=Wishlist::find($id);
        $brand->delete();
        return response()->json(['status'=>1,'msg'=>'Product removed successfully']);

    }
    
}
