<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\GalleryImage;

use URL;
use Exception;

class GalleryImageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $gallery_images = GalleryImage::orderBy('created_at', 'DESC')->get();
        return view("admin.gallery")->with('gallery_images', $gallery_images);
    }

    public function imagepost(Request $request){

         //validate
         $request->validate([ 
            'images' => 'required',
        ]);


        $uploadPath = 'images/gallery';

        foreach($request->images as $image){

            $imagemodel = new GalleryImage();

            // Handling uploaded image with previous image
            $fileName = $imagemodel->image;
        
            try{

                $file = $image;
                $fileName = md5($file->getClientOriginalName().time()).'.'.$file->getClientOriginalExtension();
                $file->move($uploadPath,$fileName);

                if($request->id != null){
                    if(file_exists($uploadPath.'/'.$imagemodel->image))
                        unlink($uploadPath.'/'.$imagemodel->image);
                }
                
            }catch(Exception $e){
                session()->flash('message','Failed to upload image.');
            }
            // Saving data
            try{
            
                $imagemodel->image = $fileName;
                $imagemodel->save();
                if($imagemodel->id > 0)
                    session()->flash("message",'Image saved successfully.');
                else
                    session()->flash("message",'Image saving failed.');
            }catch(Exception $e){
                session()->flash('message','Failed to save Image.');
            }
        }

        return redirect(URL::to('/').'/admin/gallery');
    }

    public function delete($id){
        
        $check = GalleryImage::find($id);
            if(isset($check) == true ){
            $gallery_image = GalleryImage::find($id);
            if($gallery_image){
                $gallery_image->delete();
                session()->flash("message",'Image deleted successfully.');
            }
            else
            session()->flash("message",'Image delete failed.');

            return redirect(URL::to('/').'/admin/gallery');
        }
        else{
            return 'Image Not Found';
        }

    }
}
