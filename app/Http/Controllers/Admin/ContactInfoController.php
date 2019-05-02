<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\ContactInfo;
use URL;
use Exception;

class ContactInfoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $infos = ContactInfo::all();
        foreach($infos as $info){
            $contact_info = $info;
        }
        // return $contact_info;
        return view("admin.contact-info")->with('contact_info', $contact_info);
    }

    public function infopost(Request $request){

        $request->validate([
            'id'=> 'required',
            'latitude' => 'required',
            'longitude' => 'required',  
            'phone' => 'required',
            'email' => 'required',
            'address' => 'required',
        ]);

       //for product
       if($request->id != null)
            $contact_info = ContactInfo::find($request->id);
        else $contact_info = new ContactInfo();


       try{
           
           $contact_info->id = $request->id;
           $contact_info->latitude = $request->latitude;
           $contact_info->longitude = $request->longitude;
           $contact_info->api_key = $request->api_key;      
           $contact_info->phone = $request->phone;   
           $contact_info->address = $request->address;                                       
           $contact_info->email = $request->email;   
           $contact_info->facebook = $request->facebook;      
           $contact_info->twitter = $request->twitter;  
           $contact_info->google_plus = $request->google_plus;      
           $contact_info->linkedin = $request->linkedin;      
           $contact_info->instagram = $request->instagram;      

           $contact_info->save();
           if($contact_info->id > 0)
               session()->flash("message",'Contact info saved successfully.');
           else
               session()->flash("message",'Contact info saving failed.');
       }catch(Exception $e){
           session()->flash('message','Failed to save contact info.');
       }

       return redirect(URL::to('/').'/admin/contact-info');
    }
}
