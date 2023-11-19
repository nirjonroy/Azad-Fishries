<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests;
use App\Product;
use App\Slider;
use App\Visitor;
use App\Brand;

use DB;
class HomeController extends Controller
{
   public function visitor(){
       
     if (isset($_COOKIE['Visitor'])){

        }
        else {
                setCookie('Visitor', 'yes', time()+(60*60*24));
                Visitor::find(1)->increment('total_count');
        }
     
        return "ok";
   }
   
    public function homeView(){
        
        if (isset($_COOKIE['Visitor'])){

        }
        else {
                setCookie('Visitor', 'yes', time()+(60*60*24*30));
                Visitor::find(1)->increment('total_count');
        }
        
    	$products=DB::table('products')
    				->join('categories as c','c.id','products.category_id')
    				->select('products.*','c.name as category')
    				->get()
    				->take(20);

    	$chi=DB::table('products')
    				->join('categories as c','c.id','products.category_id')
    				->where('products.category_id', 8)
    				// ->where( 'products.created_at', '>', date('Y-m-d', strtotime("-7 days")))
    				->select('products.*','c.name as category')
    				->latest()
    				->get()
    				->take(16);

    	$acc=DB::table('products')
    				->join('categories as c','c.id','products.category_id')
    				->where('products.category_id', 4)
    				// ->where( 'products.created_at', '>', date('Y-m-d', strtotime("-7 days")))
    				->select('products.*','c.name as category')
    				->latest()
    				->get()
    				->take(16);

        $lobs=DB::table('products')
                    ->join('categories as c','c.id','products.category_id')
                    ->whereIn('products.category_id', [14,22])
                    // ->where( 'products.created_at', '>', date('Y-m-d', strtotime("-7 days")))
                    ->select('products.*','c.name as category')
                    ->latest()
                    ->get()
                    ->take(16);
        

        $sliders=Slider::all();
        $brands = Brand::whereNotNull('image')->get();
        
        $popular = DB::table('order_details')
                    ->join('products', 'products.id', 'order_details.product_id')
                 ->select('order_details.product_id', 'products.name', 'products.image', 'products.sell_price', 'products.old_price' 
                
                 ,DB::raw('COUNT(order_details.quantity) as qty'))
                 
                  ->groupby('product_id', 'products.name', 'products.image', 'products.sell_price', 'products.old_price')
                  ->orderBy('qty', 'DESC')
                   ->get();
        $sale = DB::table('wishlists')
                    ->join('products', 'products.id', 'wishlists.product_id')
                 ->select('wishlists.product_id', 'products.name', 'products.image', 'products.sell_price', 'products.old_price' 
                
                 ,DB::raw('COUNT(wishlists.quantity) as qty'))
                 
                  ->groupby('product_id', 'products.name', 'products.image', 'products.sell_price', 'products.old_price')
                  ->orderBy('qty', 'DESC')
                   ->get();
        
                //  dd($sale);
    	return view('frontend.home', compact('acc','chi','products','sliders','lobs', 'brands', 'popular', 'sale'));
    }
    
    
    // public function brand_wiseProduct($id){
    //     //  $brand_id = request('brand_id');
    //     $brands = Brand::join('products', 'products.brand_id', 'brands.id' )
    //             ->where('brand_id', $id)->first();
    //     dd($brands);
    //     //return view('frontend.brands', compact('brands'));
        
        
    // }
    public function productByBrand($id){
        $brands = Product::join('brands', 'brands.id', 'products.brand_id' )
                ->where('brand_id', $id)
                ->select('products.*')
                ->get();
        
       return view('frontend.productByBrand', compact('brands'));
    }
    public function faqView(){

    	return view('frontend.faq');
    }

    public function aboutusView(){

    	return view('frontend.about_us');
    }

    public function contactView(){

    	return view('frontend.contact');
    }
    
    public function privacyPolicy(){

    	return view('frontend.privacy_policy');
    }
    
    public function termCondition(){

    	return view('frontend.term_condition');
    }

}
