<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class GalleryImage extends Model
{
    public function setUpdatedAt($value){ ; }

    public function delete(){
        
        if(file_exists('images/gallery/'.$this->image))
            unlink('images/gallery/'.$this->image);

        parent::delete();
    
    }
}
