<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\SubCategory;
use App\Model\Category;
use URL;
use Exception;

class SubCategoryController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($id){
        $check = Category::find($id);
        if(isset($check) == true ){
            $category = Category::find($id);
            $no = 1;
            return view("admin.sub_category")->with('category', $category)->with('no', $no);
        }
        else{
            return 'Category not found.';
        }
    }

    public function post(Request $request, $id){
        
        //validate
        $request->validate([
            'name' => 'required',
        ]);
        
        if($request->id != null)
            $sub_category = SubCategory::find($request->id);
        else $sub_category = new SubCategory();

        // Saving data
        try{
            $sub_category->name = $request->name;
            $sub_category->category_id = $id;
            $sub_category->save();
            if($sub_category->id > 0)
                session()->flash("message",'SubCategory saved successfully.');
            else
                session()->flash("message",'SubCategory saving failed.');
        }catch(Exception $e){
            session()->flash('message','Failed to save SubCategory.');
            return redirect(URL::previous());
        }

        return redirect(URL::to('/').'/admin/sub_category/'.$id);
    }

    public function api($id)
    {
        return SubCategory::find($id);
    }

    public function delete($id){

        $check = SubCategory::find($id);
        if(isset($check) == true ){
            $sub_category = SubCategory::find($id);
            if($sub_category ){
                $sub_category->delete();
                session()->flash("message",'SubCategory deleted successfully.');
            }
            else
            session()->flash("message",'SubCategory delete failed.');

            return redirect(URL::to('/').'/admin/sub_category/'.$sub_category->category_id);
        }
        else{
            return 'SubCategory Not Found.';
        }

    }
}