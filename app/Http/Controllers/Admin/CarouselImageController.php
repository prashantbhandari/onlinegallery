<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\CarouselImage;
use URL;
use Exception;



class CarouselImageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $count = CarouselImage::count();
        return view('admin/carousel')->with('count', $count);
    }

    public function imagepost(Request $request){

        //validate
        $request->validate([ 
           'images' => 'required',
       ]);


       $uploadPath = 'images/carousel';

       foreach($request->images as $image){

           $imagemodel = new CarouselImage();

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

       return redirect(URL::to('/').'/admin/carousel');
    }

    public function delete($id){

        $check = CarouselImage::find($id);
        if(isset($check) == true ){
            $carousel_image = CarouselImage::find($id);
            if($carousel_image){
                $carousel_image->delete();
                session()->flash("message",'Image deleted successfully.');
            }
            else
            session()->flash("message",'Image delete failed.');

            return redirect(URL::to('/').'/admin/carousel');
        }
        else{
            return 'Image Not Found.';
        }

   }
}
