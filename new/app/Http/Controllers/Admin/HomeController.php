<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use Session;
use DB;

class HomeController extends Controller
{
    public function adminDashboard(){
    	if(!auth()->user()->can('dashboard.access')){
            abort(403, 'Unauthorized action.');
        } 
        
        $orders=DB::table('orders')->get();
        $orders=DB::table('orders')->get();
        $users=DB::table('users')->where('type','user')->count();
        $visitor = DB::table('visitors')->first();
        
        $monthly_order =DB::table('orders')->select(DB::raw('sum(total) as `data`'),DB::raw("DATE_FORMAT(created_at, '%Y-%m') new_date"))
                            ->whereRaw('year(`created_at`) = ?', array(date('Y')))
                            ->groupBy('new_date')
                            ->latest()
                            ->orderBy('new_date')->get();
        
    
    	return view('admin.home', compact('orders','users','monthly_order', 'visitor'));
    }
    public function productSell(){
        
        $products = Product::join('order_details', 'order_details.product_id', 'products.id')
                    ->select('products.id','products.name', DB::raw("SUM(order_details.quantity) as total_sell"))
                    ->groupBy('products.id','products.name')
                    ->orderBy('total_sell','desc')
                    ->paginate(30);
        return view('admin.product_sell', compact('products'));
    }
    
    public function productTrack(){
       
       $product_tracks = DB::table('product_tracks')
                        ->join('products', 'products.id', 'product_tracks.product_id')
                        ->select('products.name', 'products.id', DB::raw('COUNT(product_tracks.product_id) as count'))
                        ->groupBy('products.id','products.name')
                        ->orderBy('count','desc')
                        ->paginate(30);
                
         return view('admin.product_track', compact('product_tracks'));
    }
    public function searchTrack(){
        
        $search_track = DB::table('search_track')
                                ->latest()
                                ->get();
                                return view('admin.search_track', compact('search_track'));
                        
    }
    public function delete_search($id){
                      DB::table('search_track')
                    ->where('id', $id)
                    ->delete();
            Session::get('massage', 'delete success');
            return redirect()->back();      
    }
    
   
}
