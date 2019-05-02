<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Specification extends Model
{
    public $timestamps = false;

    public function product(){
        return $this->belongsTo('App\Model\Product');
    }
}
