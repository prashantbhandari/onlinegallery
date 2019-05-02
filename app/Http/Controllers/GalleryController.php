<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\ContactInfo;
use App\Model\GalleryImage;
use App\Model\TitleImage;


class GalleryController extends Controller
{
    public function index(){
        $infos = ContactInfo::all();
        foreach($infos as $info){
            $contact_info = $info;
        }
        foreach(TitleImage::all() as $title_image){
            $t_image = $title_image;
        }
        $t_image = $t_image->image;
        $title = "Gallery - Sex material Gallery";
        $images = GalleryImage::orderBy('created_at', 'desc')->paginate(100);
        $meta_d = "gallary photos page of Sex material Gallery at ".$contact_info->address.". Here is the gallery for variety of sex toys. Sex Contact Gallery at ".$contact_info->address.". Adult toys for men and women. Variety of  sex toys in ".$contact_info->address.".";
        return view("gallery")
                            ->with('images', $images)
                            ->with('contact_info', $contact_info)
                            ->with('title', $title)
                            ->with('t_image', $t_image)
                            ->with('meta_d', $meta_d);
    }
}
