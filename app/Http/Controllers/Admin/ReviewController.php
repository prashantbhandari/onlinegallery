<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Review;
use App\Model\NewReview;
use App\Model\Product;
use URL;
use Exception;

class ReviewController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($id){

        $check = Product::find($id);
        if(isset($check) == true ){
            $reviews = Review::where('product_id', $id)->orderBy('created_at', 'DESC')->get();
            $product = Product::find($id);
            $total_stars = 0;

            $no_of_new_reviews = 0;


            $number  = count($reviews);
            foreach($reviews as $review){
                $total_stars = $total_stars + $review->stars;
            }
            if($number == 0){
                $average_stars = "Not Rated";
            }
            else{
                $average_stars = $total_stars / $number;
                $average_stars = number_format((float)$average_stars, 3, '.' ,'');
            }
                            
            // return $reviews;
            return view("admin.review")
                                    ->with('reviews', $reviews)
                                    ->with('product', $product)
                                    ->with('average_stars', $average_stars)
                                    ->with('no_of_new_reviews', $no_of_new_reviews);
        }
        else{
            return 'Product Not Found.';
        }
    }

    public function allReviews(){
        $product = Null;
        $reviews = Review::orderBy('created_at', 'DESC')->get();

        $no_of_new_reviews = 0;

        return view("admin.review")->with('reviews', $reviews)->with('product', $product)->with('no_of_new_reviews', $no_of_new_reviews);

    }

    public function newReviews($count){
        $product = Null;
        $reviews = Review::orderBy('created_at', 'DESC')->get();

        $no_of_new_reviews = $count;

        $new_reviews = NewReview::all();
        foreach($new_reviews as $new_review){
            $new_review->delete();
        }
        return view("admin.review")->with('reviews', $reviews)->with('product', $product)->with('no_of_new_reviews', $no_of_new_reviews);

    }

}
