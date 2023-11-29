<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\CommonQuestion;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Slider;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index(){
        // $main_slider = Slider::whereStatus(1)->whereNull('parent_id')->get();
        
       $main_sliders = Slider::with('firstMedia')
            ->MainSliders()
            // ->inRandomOrder()
            ->orderBy('published_on','desc')
            ->Featured()
            ->Active()
            ->take(8)
        ->get();

        $adv_sliders = Slider::with('firstMedia')
            ->AdvertisorSliders()
            // ->inRandomOrder()
            ->orderBy('published_on','desc')
            ->Featured()
            ->Active()
            ->take(3)
        ->get();

        $featured_product_cards = Product::with('firstMedia')
            ->CardCategory()
            ->orderBy('published_on','desc') // to show only the last product card added 
            // ->inRandomOrder()
            ->Featured()
            ->Active()
            ->HasQuantity()
            ->ActiveCategory()
            ->take(8)
        ->get();

        $random_product_cards = Product::with('firstMedia')
            ->CardCategory()
            ->inRandomOrder()
            ->Active()
            ->HasQuantity()
            ->ActiveCategory()
            ->take(8)
        ->get();

        $card_categories = ProductCategory::with('firstMedia')
            ->Active()
            ->RootCategory()
            ->CardCategory()
            ->HasProducts()
        ->get();

        $common_questions = CommonQuestion::query()->active()->take(6)->get();


        return view('frontend.index',compact('main_sliders','adv_sliders','featured_product_cards','card_categories','random_product_cards','common_questions'));
    }

 
    public function product($slug){

        $card_product  = Product::with('category','tags','photos','reviews')->withAvg('reviews','rating')->whereSlug($slug)->Active()->HasQuantity()->ActiveCategory()->firstOrFail();

        // releated card_product = get card_product with first Media where has relation category 
        $relatedProducts = Product::with('firstMedia','photos')->whereHas('category', function ($query) use ($card_product){
            // where this category id is equal to $card_product->product_category_id where its status is true :means active
            $query->whereId($card_product->product_category_id)->whereStatus(true);
        })->inRandomOrder()->Active()->HasQuantity()->take(4)->get(); // get in random order  only card_product which is active and has quantity :and take from them 4 card_product 

        return view('frontend.product',compact('card_product','relatedProducts'));
    }

   


}
