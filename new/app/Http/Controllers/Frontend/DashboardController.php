<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Order;
use App\User;
use DB;
class DashboardController extends Controller
{
    public function myAccount(){

    	return view('frontend.dashboard.index');
    }

    public function userOrderList(){
    	$items=Order::where('user_id',auth()->user()->id)->latest()->paginate(20);
    	return view('frontend.dashboard.order_list', compact('items'));
    }

    public function profileDetails(){
    	$user=User::find(auth()->user()->id);
    	return view('frontend.dashboard.profile_details', compact('user'));
    }

    public function updateProfile(){
    	$user=User::find(auth()->user()->id);
    	return view('frontend.dashboard.update_profile', compact('user'));
    }
    
    public function postUpdateProfile(Request $request){
        
        $id=auth()->user()->id;
        $validatedData = $request->validate([
            'name' => 'required',
            'phone' => 'required|numeric',
            'email' => 'required|email|regex:/(.+)@(.+)\.(.+)/i|unique:users,email,'.$id,
            'address' => 'required',
        ]);
        
        
        if(!empty(request('password'))){
            
            $request->validate([
                'password' => 'required|min:6',
                'password_confirm' => 'same:password',
            ]);
            
            // if (\Hash::check($request->old_password, auth()->user()->password) == false){
            //   return back()->with('error','Old Password Do Not Match !');  
            // } 
    
            $validatedData['password']=\Hash::make(request('password'));
        }
        
        DB::table('users')->where('id',$id)->update($validatedData);
        
        return back()->with('success','Profile Update Successfully !');
    }
    
    public function userOrderDetails($id){
        
        $order=Order::with('details','details.product','user')->find($id);
        return view('frontend.dashboard.order_details', compact('order'));
    }

}
