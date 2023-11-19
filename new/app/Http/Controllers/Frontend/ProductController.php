<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use DB;
class ProductController extends Controller
{
	public function shopView(Request $request){
		$categories=DB::table('categories')->orderby('name')->select('id','name')->get();
	    $q=request('q');
        if ($q !='') {
	        $check=DB::table('search_track')->where(['search_value'=>$q])->first();
	        
	        if(empty($check)){
	            DB::table('search_track')->insert(['search_value'=>$q]);
	        }
	        
        }
	    
		$query=DB::table('products')
    				->join('categories as c','c.id','products.category_id')
    				->select('products.*','c.name as category');
    			if (request('category_id') !='') {
    				$query->where('products.category_id', request('category_id'));
    			}

    			if ($q !='') {
    				$query->where(function($q){
    					$q->where('products.name','Like','%'.request('q').'%');
    				});
    			}

    	$products=$query->paginate(16);
    	return view('frontend.shop', compact('products', 'categories'));
	}


	public function productModal($id){

		$product=Product::find($id);

		if ($product) {
			$view=view('frontend.partials.product_modal', compact('product'))->render();
			return response()->json(['status'=>1,'html'=>$view]);
		}else{


		}
	}

	public function productDetails($id){

		$product=Product::find($id);
		
		DB::table('product_tracks')->insert(['product_id'=>$id]);
        
		$products=DB::table('products')
    				->join('categories as c','c.id','products.category_id')
    				->where('products.category_id', $product->category_id)
    				->select('products.*','c.name as category')
    				->latest()
    				->get()
    				->take(12);

		return view('frontend.product_details', compact('product','products'));

	}
    
}
