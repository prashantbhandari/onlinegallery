<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Category;

use URL;
use Exception;

class CategoryController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        return view("admin.category");
    }

    public function post(Request $request){
        
        //validate
        $request->validate([
            'name' => 'required',
        ]);
        
        if($request->id != null)
            $category = Category::find($request->id);
        else $category = new Category();
        
        $category->name = $request->name;
        $category->save();
        if($category->id > 0)
            session()->flash("message",'Category saved successfully.');
        else
            session()->flash("message",'Category saving failed.');

        return redirect(URL::to('/').'/admin/category');

    }

    public function api($id)
    {
        return Category::find($id);
    }

    public function delete($id){

        $check = Category::find($id);
            if(isset($check) == true ){
            $category = Category::find($id);
            if($category ){
                $category->delete();
                session()->flash("message",'Category deleted successfully.');
            }
            else
            session()->flash("message",'Category delete failed.');

            return redirect(URL::to('/').'/admin/category');
        }
        else{
            return 'Category not found.';
        }
    }
}