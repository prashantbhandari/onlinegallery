<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Product;
use App\Model\ContactInfo;
use App\Model\Category;
use App\Model\SubCategory;
use App\Model\Review;
use App\Model\NewReview;
use App\Model\TitleImage;
use URL;
use Exception;

class ProductDisplayController extends Controller
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
        $products = Product::inRandomOrder()->paginate(16);
        $new_products = Product::orderBy('created_at', 'desc')->take(10)->get();
        $most_viewed = Product::orderby('view_count', 'desc')->take(10)->get();
        $title = "Home - Sex material nepal";
        $meta_d = "Here is the gallery for variety of sex toys. Sex material at ".$contact_info->address.". Adult toys for men and women. Variety of  sex toys in ".$contact_info->address.".";
        return view("index")
                            ->with('products', $products)
                            ->with('new_products', $new_products)
                            ->with('most_viewed', $most_viewed)
                            ->with('contact_info', $contact_info)
                            ->with('title', $title)
                            ->with('t_image', $t_image)
                            ->with('meta_d', $meta_d);
    }

    public function productinfo($id){

        $check = Product::find($id);
        if(isset($check) == true ){
            $infos = ContactInfo::all();
            foreach($infos as $info){
                $contact_info = $info;
            }
            $reviews = Review::where('product_id', $id)->get();
            $number = count($reviews);
            $rating = 0;
            foreach($reviews as $review){
                $rating = $review->stars + $rating;
            }
            if($number == 0){        
                $rating = $rating;
            }else{
                $rating = $rating/$number;
            }
            foreach(TitleImage::all() as $title_image){
                $t_image = $title_image;
            }
            $t_image = $t_image->image;
            $product = Product::find($id);
            $product->view_count++;
            $product->save();
            $related = Product::where('sub_category_id', $product->sub_category_id)->take(10)->get();
            $title = $product->name." - sex material Gallery";
            $meta_d = $product->name." ".$product->short_desc.". Here is the gallery for variety of sex toys. Sex material Gallery at ".$contact_info->address.". Adult toys for men and women. Variety of  sex toys in ".$contact_info->address.".";
            return view("product")
                                ->with('product', $product)
                                ->with('related', $related)
                                ->with('contact_info', $contact_info)
                                ->with('rating', $rating)
                                ->with('number', $number)
                                ->with('title', $title)
                                ->with('t_image', $t_image)
                                ->with('meta_d', $meta_d);
        }
        else{
            return 'Product not found';
        }
    }

    public function categoryproducts($id){
        $check = Category::find($id);
        if(isset($check) == true ){
            $infos = ContactInfo::all();
            foreach($infos as $info){
                $contact_info = $info;
            }
            foreach(TitleImage::all() as $title_image){
                $t_image = $title_image;
            }
            $t_image = $t_image->image;
            $category = Category::find($id);
            $category_products = Product::inRandomOrder()->where('category_id', $id)->paginate(16);
            $title = $category->name." - Sex material nepal";
            $meta_d = "Adult toys for ".$category->name.". Here is the gallery for variety of sex toys. Sex material nepal at ".$contact_info->address.". Adult toys for men and women. Variety of  sex toys in ".$contact_info->address."."; 
            return view("category-product")
                                ->with('category_products', $category_products)
                                ->with('contact_info', $contact_info)
                                ->with('category', $category)
                                ->with('title', $title)
                                ->with('t_image', $t_image)
                                ->with('meta_d', $meta_d);
        }
        else{
            return 'Category not found.';
        }

    }

    public function subcategoryproducts($id){
        $check = SubCategory::find($id);
        if(isset($check) == true ){
            $infos = ContactInfo::all();
            foreach($infos as $info){
                $contact_info = $info;
            }
            foreach(TitleImage::all() as $title_image){
                $t_image = $title_image;
            }
            $t_image = $t_image->image;
            $sub_category = SubCategory::find($id);
            $sub_category_products = Product::inRandomOrder()->where('sub_category_id', $id)->paginate(16);
            $title = $sub_category->name." - Sex material nepal";
            $meta_d = "Adult toys of ".$sub_category->name." in category ".$sub_category->category->name.". Here is the gallery for variety of sex toys. Sex material at ".$contact_info->address.". Adult toys for men and women. Variety of  sex toys in ".$contact_info->address."."; 
            return view("subcategory-product")
                                ->with('sub_category_products', $sub_category_products)
                                ->with('contact_info', $contact_info)
                                ->with('sub_category', $sub_category)
                                ->with('title', $title)
                                ->with('t_image', $t_image)
                                ->with('meta_d', $meta_d);
        }
        else{
            return 'SubCategory not found.';
        }

    }

    public function reviewpost(Request $request, $id){
        
        $review = new Review();
        $review->product_id = $id;
        $review->stars = $request->stars;
        $review->comment = $request->comment;
        $review->save();

        $new_review = new NewReview();
        $new_review->product_id = $id;
        $new_review->stars = $request->stars;
        $new_review->comment = $request->comment;
        $new_review->one = 1;
        $new_review->save();

        session()->flash("message",'Thank you for the review.');
        return redirect(URL::previous());
    }

}
