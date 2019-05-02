<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\TitleImage;
use URL;
use Exception;

class TitleImageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $title_images = TitleImage::all();
        foreach($title_images as $title_image){
            $image = $title_image;
        }
        return view('admin/title-image')->with('image', $image);
    }

    public function post(Request $request){

        $request->validate([
            'id' => 'required',
            'image' => 'required',
        ]);

       //for product
        $title_image = TitleImage::find($request->id);

        // Handling uploaded image with previous image
        $uploadPath = 'images/index';

        $fileName = $title_image->image;
    
        try{

            $file = $request->image;
            $fileName = md5($file->getClientOriginalName().time()).'.'.$file->getClientOriginalExtension();
            $file->move($uploadPath,$fileName);

            if($request->id != null){
                if(file_exists($uploadPath.'/'.$title_image->image))
                    unlink($uploadPath.'/'.$title_image->image);
            }
            
        }catch(Exception $e){
            session()->flash('message','Failed to upload image.');
        }
        // Saving data
        try{
        
            $title_image->image = $fileName;
            $title_image->save();

            session()->flash('message','Title Image changed successfully.');
        }catch(Exception $e){
            session()->flash('message','Failed to save Image.');
        }

       return redirect(URL::to('/').'/admin/title-image');

    }
}

