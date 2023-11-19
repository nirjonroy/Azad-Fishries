<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Exception;
use App\User;
use Illuminate\Support\Facades\Auth;


class SocialiteController extends Controller
{
    
    public function redirect($provider){
         return Socialite::driver($provider)->redirect();
    }
     

    public function callback($provider){
      $getInfo = Socialite::driver($provider)->stateless()->user();
        
       $user = $this->createUser($getInfo,$provider); 
       
       Auth::loginUsingId($user->id);

       return redirect()->to('/');
    }
    
    function createUser($getInfo,$provider){
     $user = User::where('provider_id', $getInfo->id)->first();
     if (!$user) {
          $user = User::create([
             'name'     => $getInfo->name,
             'email'    => $getInfo->email ?? null,
             'type'    => 'user',
             'provider' => $provider,
             'provider_id' => $getInfo->id
         ]);
       }
       return $user;
    }



}
