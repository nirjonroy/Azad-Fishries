<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use App\Wishlist;
class CartController extends Controller
{
     public function index(){

     	$cart = session()->get('cart');

    	return view('frontend.cart', compact('cart'));
    }


    public function getCartData(){
    	$items='';
    	$view= view('frontend.partials.cart_modal', compact('items'))->render();

    	return response()->json(['status'=>1,'html'=>$view]);
    }


    public function store(Request $request){
    	$id=request('id');
    	$product = Product::findOrFail($id);
          
        $cart = session()->get('cart', []);
  
        if(isset($cart['items'][$id])) {
            $cart['items'][$id]['quantity']++;
            $cart['items'][$id]['sub_total']=$cart['items'][$id]['quantity'] * $product->sell_price;
        } else {
            $cart['items'][$id] = [
                "name" => $product->name,
                "quantity" => 1,
                "price" => $product->sell_price,
                "sub_total" =>1* $product->sell_price,
                "image" => $product->image
            ];
        }
        
        // if (auth()->user()) {
        //     $wishlist=Wishlist::where(['product_id'=>$id,'user_id'=>auth()->user()->id])->first();

        //     if ($wishlist) {
        //         $wishlist->delete();
        //     }
        // }
          
        session()->put('cart', $cart);
        $this->getCartTotalPrice();

        return response()->json(['status'=>1,'msg'=>'Product added to cart successfully!']);

    }

     public function update(Request $request,$id)
    {

        if($id && $request->quantity){
            $cart = session()->get('cart');
            $cart['items'][$id]["quantity"] = $request->quantity;
            $cart['items'][$id]['sub_total']=$cart['items'][$id]['quantity'] * $cart['items'][$id]['price'];
            session()->put('cart', $cart);
            $this->getCartTotalPrice();
           return response()->json(['status'=>1,'msg'=>'Cart updated successfully']);
        }
        return response()->json(['status'=>0,'msg'=>'Item Not Found !']);
    }
  
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function destroy($id)
    {
        if($id) {
            $cart = session()->get('cart');
            if(isset($cart['items'][$id])) {
                unset($cart['items'][$id]);
                session()->put('cart', $cart);
                // $this->getCartTotalPrice();
            }
            return response()->json(['status'=>1,'msg'=>'Product removed successfully']);
        }
        return response()->json(['status'=>0,'msg'=>'Item Not Found !']);
    }


    private function getCartTotalPrice(){
        $cart = session()->get('cart');
        
        if ($cart) {
           $amount=0;
           foreach ($cart['items'] as $key => $value) {
               $amount +=$value['sub_total'];
           }
           $cart['total']=$amount;
           session()->put('cart', $cart);
        }else{
        session()->put('cart', []);
        }

    }


}
