<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests;
use App\Product;
use App\Slider;
use App\Visitor;

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

    	return view('frontend.home', compact('acc','chi','products','sliders','lobs'));
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
