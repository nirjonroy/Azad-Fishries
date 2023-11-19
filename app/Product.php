<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded=['id'];

    public function category(){

    	return $this->belongsTo('\App\Category');
    }

    public function brand(){

    	return $this->belongsTo('\App\Brand');
    }


    public function images(){

    	return $this->hasMany('\App\ProductImage');
    }

}
