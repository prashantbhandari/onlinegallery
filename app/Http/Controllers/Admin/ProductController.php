<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\SubCategory;
use App\Model\Category;
use App\Model\Productimage;
use App\Model\Specification;
use App\Model\Product;
use URL;
use Exception;

class ProductController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $sub_category = null;
        return view("admin.product")->with('sub_category', $sub_category);
    }

    public function entryindex($id){
        $check = SubCategory::find($id);
        if(isset($check) == true ){
            $categoryedit = true;
            $sub_category = SubCategory::find($id);
            $product = null;
            return view("admin.product-entry")
                                ->with('sub_category', $sub_category)
                                ->with('product', $product)
                                ->with('categoryedit', $categoryedit);
        }
        else{
            return 'Sub Category Not Found.';
        }
    }

    public function productentryindex(){
        $categoryedit = false;
        $sub_category = null;
        $product = null;
        return view("admin.product-entry")->with('sub_category', $sub_category)->with('product', $product)->with('categoryedit', $categoryedit);
    }

    public function infoindex($id){
        $product = Product::find($id);
        return view("admin.product-info")->with('product', $product);
    }

    public function productindex($id){
        $sub_category = SubCategory::find($id);
        $no = 1;
        return view("admin.product")->with('sub_category', $sub_category)->with('no', $no);
    }

    public function entrypost(Request $request, $id){
         //validate
         $request->validate([
            'name' => 'required',
            'short_desc' => 'required',  
            'images' => 'required',
            'price' => 'required',
            'availability' => 'required',
            'specification_name' => 'required',
            'specification_value' => 'required',
        ]);

        //for product
        $productmodel = new Product();
        $sub_category = SubCategory::find($id);

        try{
            

            $productmodel->name = $request->name;
            $productmodel->short_desc = $request->short_desc;   
            $productmodel->long_desc = $request->long_desc;                     
            $productmodel->price = $request->price;   
            $productmodel->availability = $request->availability;      
            $productmodel->sub_category_id = $id;  
            $productmodel->category_id = $sub_category->category->id;         

            $productmodel->save();
            
        }catch(Exception $e){
            session()->flash('message','Failed to save Product.');
        }

        // for images
        $uploadPath = 'images/productimage';

        foreach($request->images as $image){

            $imagemodel = new Productimage();

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
            
                $imagemodel->product_id = $productmodel->id;
                $imagemodel->image = $fileName;
                $imagemodel->save();
            }catch(Exception $e){
                session()->flash('message','Failed to save Image.');
            }
        }
        
        //for specifications

        //Saving data
        for($i=0; $i<count($request->specification_name); $i++){
            $specs = new Specification();

            try{
            

                $specs->product_id = $productmodel->id;
                $specs->attribute_name = $request->specification_name[$i];            
                $specs->attribute = $request->specification_value[$i];              
                // echo ($specs);
                $specs->save();
            }catch(Exception $e){
                session()->flash('message','Failed to save Specifictions.');
            }
        }

        if($productmodel->id > 0)
            session()->flash("message",'Product saved successfully.');
        else
            session()->flash("message",'Product saving failed.');

        return redirect(URL::previous());

    }

    public function editpost(Request $request, $id){

         //validate
        //  return $request;
         $request->validate([
            'name' => 'required',
            'short_desc' => 'required',  
            'price' => 'required',
            'availability' => 'required',
            'specification_name' => 'required',
            'specification_value' => 'required',
        ]);

        //for product
        $productmodel = Product::find($id);
        $i = 0;

        // IMAGE EDIT

        foreach($request->imagename as $name){
            if(isset($productmodel->productimages[$i])){
                if($name != null){
                    echo "image+name   ";
                    if(isset($request->images[$i])){
                    
                        $uploadPath = 'images/productimage';


                        $imagemodel = $productmodel->productimages[$i];

                        // Handling uploaded image with previous image
                        $fileName = $imagemodel->image;
                    
                        try{

                            $file = $request->images[$i];
                            $file->move($uploadPath,$fileName);
                            
                        }catch(Exception $e){
                            session()->flash('message','Failed to upload image.');
                        }
                        // Saving data
                        try{
                        
                            $imagemodel->product_id = $productmodel->id;
                            $imagemodel->image = $fileName;
                            $imagemodel->save();
                            
                        }catch(Exception $e){
                            session()->flash('message','Failed to save Image.');
                        }
                    }

                }    
                else{
                    $productmodel->productimages[$i]->delete();
                    session()->flash("message",'Image deleted successfully.');
                }
            }
            
            else{
                if($name != null){
                    echo "noimage+name   ";

                    // for images
                    $uploadPath = 'images/productimage';


                        $imagemodel = new Productimage();

                        // Handling uploaded image with previous image
                        $fileName = $imagemodel->image;

                        try{

                            $file = $request->images[$i];
                            $fileName = md5($file->getClientOriginalName().time()).'.'.$file->getClientOriginalExtension();
                            $file->move($uploadPath,$fileName);

                            
                            
                        }catch(Exception $e){
                            session()->flash('message','Failed to upload image.');
                        }
                        // Saving data
                        try{
                        
                            $imagemodel->product_id = $productmodel->id;
                            $imagemodel->image = $fileName;
                            $imagemodel->save();
                        }catch(Exception $e){
                            session()->flash('message','Failed to save Image.');
                        }    
                }    
            }
            $i++;    
        }

        try{
            

            $productmodel->name = $request->name;
            $productmodel->short_desc = $request->short_desc;   
            $productmodel->long_desc = $request->long_desc;                     
            $productmodel->price = $request->price;   
            $productmodel->availability = $request->availability;      
            $productmodel->sub_category_id = $productmodel->sub_category->id;  
            $productmodel->category_id = $productmodel->sub_category->category->id;  


            $productmodel->save();
        }catch(Exception $e){
            session()->flash('message','Failed to save Product.');
        }

        //for specifications

        //Saving data
        for($i=0; $i<count($productmodel->specifications); $i++){
            $productmodel->specifications[$i]->delete();
        }

        for($i=0; $i<count($request->specification_name); $i++){
            $specs = new Specification();

            try{
            

                $specs->product_id = $productmodel->id;
                $specs->attribute_name = $request->specification_name[$i];            
                $specs->attribute = $request->specification_value[$i];              
                // echo ($specs);
                $specs->save();
            }catch(Exception $e){
                session()->flash('message','Failed to save Specifictions.');
            }
        }

        if($productmodel->id > 0)
            session()->flash("message",'Product saved successfully.');
        else
            session()->flash("message",'Product saving failed.');

        return redirect(URL::previous());


    }


    public function edit($id)
    {
        $check = Product::find($id);
        if(isset($check) == true ){
            $categoryedit = true;
            $sub_category = 1;
            $product = Product::find($id);
            return view("admin.product-entry")
                                    ->with('product', $product)
                                    ->with('sub_category', $sub_category)
                                    ->with('categoryedit', $categoryedit);
        }
        else{
            return 'Product Not Found';
        }
    }

    public function editproductentry($id)
    {
        $check = Product::find($id);
        if(isset($check) == true ){
            $categoryedit = false;
            $sub_category = null;
            $product = Product::find($id);
            return view("admin.product-entry")
                                ->with('product', $product)
                                ->with('sub_category', $sub_category)
                                ->with('categoryedit', $categoryedit);
        }
        else{
            return 'Product Not Found.';
        }
    }


    public function delete($id){

        $check = Product::find($id);
        if(isset($check) == true ){
            $product = Product::find($id);
            if($product){
                $product->delete();
                session()->flash("message",'Product deleted successfully.');
            }
            else
            session()->flash("message",'Product delete failed.');

            return redirect(URL::to('/').'/admin/sub_category/product/'.$product->sub_category->id);
        }
        else{
            return 'Product Not Found';
        }
    }

    
    public function deleteproduct($id){
        
        $check = Product::find($id);
        if(isset($check) == true ){
            $product = Product::find($id);
            if($product){
                $product->delete();
                session()->flash("message",'Product deleted successfully.');
            }
            else
            session()->flash("message",'Product delete failed.');

            return redirect(URL::to('/').'/admin/product');
        }
        else{
            return 'Product Not Found.';
        }

    }


    public function selectapi($id){
        $category = Category::find($id);
        $sub_category = $category->sub_categories;
        return $sub_category;
    }

    public function productpost(Request $request){
        //validate
        $request->validate([
           'name' => 'required',
           'short_desc' => 'required',  
           'images' => 'required',
           'price' => 'required',
           'availability' => 'required',
           'specification_name' => 'required',
           'specification_value' => 'required',
       ]);

       //for product
       $productmodel = new Product();

       try{
           

           $productmodel->name = $request->name;
           $productmodel->short_desc = $request->short_desc;   
           $productmodel->long_desc = $request->long_desc;                     
           $productmodel->price = $request->price;   
           $productmodel->availability = $request->availability;      
           $productmodel->sub_category_id = $request->select_subcategory;
           $productmodel->category_id = $request->select_category;

           $productmodel->save();
       }catch(Exception $e){
           session()->flash('message','Failed to save Product.');
       }

       // for images
       $uploadPath = 'images/productimage';

       foreach($request->images as $image){

           $imagemodel = new Productimage();

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
           
               $imagemodel->product_id = $productmodel->id;
               $imagemodel->image = $fileName;
               $imagemodel->save();
           }catch(Exception $e){
               session()->flash('message','Failed to save Image.');
           }
       }
       
       //for specifications

       //Saving data
       for($i=0; $i<count($request->specification_name); $i++){
           $specs = new Specification();

           try{
           

               $specs->product_id = $productmodel->id;
               $specs->attribute_name = $request->specification_name[$i];            
               $specs->attribute = $request->specification_value[$i];              
               // echo ($specs);
               $specs->save();
           }catch(Exception $e){
               session()->flash('message','Failed to save Specifictions.');
           }
       }

       if($productmodel->id > 0)
               session()->flash("message",'Product saved successfully.');
           else
               session()->flash("message",'Product saving failed.');

       return redirect(URL::previous());

   }


   public function editproduct(Request $request, $id){

    //validate
    $request->validate([
       'name' => 'required',
       'short_desc' => 'required',  
       'price' => 'required',
       'availability' => 'required',
       'specification_name' => 'required',
       'specification_value' => 'required',
   ]);

   //for product
   $productmodel = Product::find($id);
   $i = 0;

   // IMAGE EDIT

   foreach($request->imagename as $name){
       if(isset($productmodel->productimages[$i])){
           if($name != null){
               echo "image+name   ";
               if(isset($request->images[$i])){
               
                   $uploadPath = 'images/productimage';


                   $imagemodel = $productmodel->productimages[$i];

                   // Handling uploaded image with previous image
                   $fileName = $imagemodel->image;
               
                   try{

                       $file = $request->images[$i];
                       $file->move($uploadPath,$fileName);
                       
                   }catch(Exception $e){
                       session()->flash('message','Failed to upload image.');
                   }
                   // Saving data
                   try{
                   
                       $imagemodel->product_id = $productmodel->id;
                       $imagemodel->image = $fileName;
                       $imagemodel->save();
                   }catch(Exception $e){
                       session()->flash('message','Failed to save Image.');
                   }
               }

           }    
           else{
               $productmodel->productimages[$i]->delete();
               session()->flash("message",'Image deleted successfully.');
           }
       }
       
       else{
           if($name != null){
               echo "noimage+name   ";

               // for images
               $uploadPath = 'images/productimage';


                   $imagemodel = new Productimage();

                   // Handling uploaded image with previous image
                   $fileName = $imagemodel->image;

                   try{

                       $file = $request->images[$i];
                       $fileName = md5($file->getClientOriginalName().time()).'.'.$file->getClientOriginalExtension();
                       $file->move($uploadPath,$fileName);

                       
                       
                   }catch(Exception $e){
                       session()->flash('message','Failed to upload image.');
                   }
                   // Saving data
                   try{
                   
                       $imagemodel->product_id = $productmodel->id;
                       $imagemodel->image = $fileName;
                       $imagemodel->save();
                   }catch(Exception $e){
                       session()->flash('message','Failed to save Image.');
                   }    
           }    
       }
       $i++;    
   }

   try{
       

       $productmodel->name = $request->name;
       $productmodel->short_desc = $request->short_desc;   
       $productmodel->long_desc = $request->long_desc;                     
       $productmodel->price = $request->price;   
       $productmodel->availability = $request->availability;      
       $productmodel->sub_category_id = $request->select_subcategory;
       $productmodel->category_id = $request->select_category;

       $productmodel->save();
       
   }catch(Exception $e){
       session()->flash('message','Failed to save Product.');
   }

   //for specifications

   //Saving data
   for($i=0; $i<count($productmodel->specifications); $i++){
       $productmodel->specifications[$i]->delete();
   }

   for($i=0; $i<count($request->specification_name); $i++){
       $specs = new Specification();

       try{
       

           $specs->product_id = $productmodel->id;
           $specs->attribute_name = $request->specification_name[$i];            
           $specs->attribute = $request->specification_value[$i];              
           // echo ($specs);
           $specs->save();
       }catch(Exception $e){
           session()->flash('message','Failed to save Specifictions.');
       }
   }

   if($productmodel->id > 0)
        session()->flash("message",'Product saved successfully.');
    else
        session()->flash("message",'Product saving failed.');

   return redirect(URL::previous());


}

}
