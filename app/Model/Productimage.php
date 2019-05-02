<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Productimage extends Model
{
    public $timestamps = false;

    public function product(){
        return $this->belongsTo('App\Model\Product');
    }


    public function delete(){
        
        if(file_exists('images/productimage/'.$this->image))
            unlink('images/productimage/'.$this->image);

        parent::delete();
    
    }
}
