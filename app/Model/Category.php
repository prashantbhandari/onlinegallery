<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public $timestamps = false;

    public function sub_categories(){
        return $this->hasMany('App\Model\SubCategory');
    }

    public function products(){
        return $this->hasMany('App\Model\Product');
    }

    public function delete(){
        
        foreach($this->sub_categories as $sub_category)
            $sub_category->delete();

        parent::delete();

    }
}
