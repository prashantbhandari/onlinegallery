<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    public function setUpdatedAt($value){ ; }

    public function product(){
        return $this->belongsTo('App\Model\Product');
    }
}
