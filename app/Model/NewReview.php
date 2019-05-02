<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class NewReview extends Model
{
    public function setUpdatedAt($value){ ; }

    public function product(){
        return $this->belongsTo('App\Model\Product');
    }

    public function delete(){

        parent::delete();

    }
}
