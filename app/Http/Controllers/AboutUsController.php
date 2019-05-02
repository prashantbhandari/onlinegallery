<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\AboutUs;
use App\Model\ContactInfo;
use App\Model\TitleImage;


class AboutUsController extends Controller
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
        $descriptions = AboutUs::all();
        foreach($descriptions as $description){
            $desc = $description;
        }
        $title = "About - Sex material nepal";
        $meta_d = "About page of Sex material nepal at ".$contact_info->address.". Here is the gallery for variety of sex toys. Sex Contact Gallery at ".$contact_info->address.". Adult toys for men and women. Variety of  sex toys in ".$contact_info->address.".";
        return view("aboutus")
                            ->with('desc', $desc)
                            ->with('contact_info', $contact_info)
                            ->with('title', $title)
                            ->with('t_image', $t_image)
                            ->with('meta_d', $meta_d);
    }
}
