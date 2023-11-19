<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    protected $guarded=['id'];
    
    
     public function product(){

    	return $this->belongsTo('\App\Product');
    }
}
