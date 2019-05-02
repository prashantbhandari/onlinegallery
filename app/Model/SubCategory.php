<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    public $timestamps = false;

    public function category(){
        return $this->belongsTo('App\Model\Category');
    }

    public function products(){
        return $this->hasMany('App\Model\Product');
    }

    public function delete(){
        
        foreach($this->products as $product)
            $product->delete();

        parent::delete();

    }
}
