<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class CarouselImage extends Model
{
    public $timestamps = false;

    public function delete(){
        
        if(file_exists('images/carousel/'.$this->image))
            unlink('images/carousel/'.$this->image);

        parent::delete();
    
    }
}
