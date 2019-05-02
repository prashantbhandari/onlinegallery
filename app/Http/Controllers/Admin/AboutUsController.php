<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\AboutUs;
use URL;
use Exception;

class AboutUsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){

        $descriptions = AboutUs::all();
        foreach($descriptions as $description){
            $desc = $description;
        }
        return view("admin.aboutus")->with('desc', $desc);

    }

    public function post(Request $request){

        $request->validate([
            'description' => 'required',
        ]);

       //for product
       if($request->id != null)
            $about = AboutUs::find($request->id);
        else $about = new AboutUs();


       try{
           
           $about->id = $request->id;
           $about->description = $request->description;     

           $about->save();
           if($about->id > 0)
               session()->flash("message",'About info saved successfully.');
           else
               session()->flash("message",'About info saving failed.');
       }catch(Exception $e){
           session()->flash('message','Failed to save About info.');
       }

       return redirect(URL::to('/').'/admin/about-us');

    }

}
