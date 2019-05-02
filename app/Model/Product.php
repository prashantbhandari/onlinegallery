<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    public static function all($options = Array()){
        return self::orderBy('id','name')->get();
    }

    public function productimages(){
        return $this->hasMany('App\Model\Productimage');
    }

    public function specifications(){
        return $this->hasMany('App\Model\Specification');
    }

    public function sub_category(){
        return $this->belongsTo('App\Model\SubCategory');
    }

    public function category(){
        return $this->belongsTo('App\Model\Category');
    }

    public function reviews(){
        return $this->hasMany('App\Model\Review');
    }

    public function newreviews(){
        return $this->hasMany('App\Model\NewReview');
    }

    public function delete(){
        
        foreach($this->productimages as $productimage){
            $productimage->delete();
        }

        foreach($this->specifications as $specification){
            $specification->delete();
        }

        foreach($this->reviews as $review){
            $review->delete();
        }

        foreach($this->newreviews as $review){
            $review->delete();
        }

        parent::delete();

    }
}
