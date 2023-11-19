<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Order;
use App\DeliveryCharge;
use Illuminate\Support\Facades\DB;
class CheckoutController extends Controller
{
    public function index(){
    	$cart = session()->get('cart');
        $charges=DeliveryCharge::all();
    	return view('frontend.checkout', compact('cart','charges'));
    }

    public function store(Request $request){



        try {
            $cart = session()->get('cart');
            if (empty($cart)) {
               return back()->with('error','Your Cart Is Empty !');
            }
            $validatedData = $request->validate([
                'name' => 'required',
                'phone' => 'required',
                'email' => '',
                'address' => 'required',
                'district' => '',
                'total' => '',
                'transaction_id' => '',
                'payment_method' => 'required',
                'delivery_charge_id' => 'required',
            ]);
            
           

            $charge=DeliveryCharge::find(request('delivery_charge_id'))->amount;
            $validatedData['charge_amount']=$charge;
            $validatedData['shipping_charge']=$charge;
            $validatedData['before_discount']=$cart['total'];
            $validatedData['invoice_no']=$this->getInvoiceNo();
            $validatedData['user_id']=auth()->user()->id;

            DB::beginTransaction();

            $order=Order::create($validatedData);

            $data=[];
            foreach ($cart['items'] as $key => $item) {
                $data[]=[
                    'product_id'=>$key,
                    'quantity'=>$item['quantity'],
                    'price'=>$item['price'],
                    'sub_total'=>$item['sub_total'],
                ];
            }

            $order->details()->createMany($data);
            
            DB::commit();
            
            // send mail
            
            $data = [
                    'name'   => $request->input('name'), 
                   'email'   => $request->input('email'), 
                    'subject' => 'Mail From Azad Fisheries',
                    'order'    => $order
                ];
            $this->sendMail($data);
            // Order::create($data);
            // send mail 
            session()->put('cart', []);
            return redirect('/')->with('success',' Order Added Successfully !');
        } catch (\Exception $e) {
            DB::rollback();
            // something went wrong
            session()->put('cart', []);
             return back()->with('success', 'order added');
        }

    }
    
    
    private function getInvoiceNo(){
        
        $last=Order::latest()->first();
        $id=$last ? $last->id+1:1;
        $inv='AZAD-FISH#'.$id;

        return $inv;
    }
    
    
    private function sendMail($data){
        

      \Mail::send('mail.order_create', $data, function($message) use ($data)
      {
        $message->from('info@azadfisheries.com','Azad Fish');
        $message->to($data['email'],$data['name']);
        $message->subject($data['subject']);
      });
      
      
    if (\Mail::failures()) {
        throw new Exception("Your Mail Is Invalid .."); 
    }
    
  
    }
}
