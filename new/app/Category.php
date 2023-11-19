<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $guarded=['id'];
    
    
    public function parent(){
        
        return $this->hasMany('App\Category','parent_id');
    }
}
