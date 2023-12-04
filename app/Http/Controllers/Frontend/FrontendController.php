<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\CommonQuestion;
use App\Models\News;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductReview;
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
            ->Active()
            ->take(5)
        ->get();

        $adv_sliders = Slider::with('firstMedia')
            ->AdvertisorSliders()
            // ->inRandomOrder()
            ->orderBy('published_on','desc')
            ->Active()
            ->take(3)
        ->get();


        $random_cards = Product::with('firstMedia', 'lastMedia' , 'photos')
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

        $common_questions = CommonQuestion::query()->active()->take(3)->get();

        $news = News::query()->active()->take(3)->get();


        return view('frontend.index',compact('main_sliders','adv_sliders','card_categories','random_cards','common_questions' ,'news'));
    }

 
    public function card($slug){
        //get choisen card 
        $card  = Product::with('category','tags','photos','reviews')->withAvg('reviews','rating')->whereSlug($slug)->Active()->HasQuantity()->ActiveCategory()->firstOrFail();

        //get all related card that are the same of card_category of the card choisen
        $related_cards = Product::with('firstMedia','photos')->whereHas('category', function ($query) use ($card){
            $query->whereId($card->product_category_id)->whereStatus(true);
        })->inRandomOrder()->Active()->HasQuantity()->take(4)->get(); // get in random order  only card which is active and has quantity :and take from them 4 card 

        return view('frontend.card',compact('card','related_cards'));
    }

    public function card_category($slug = null){

        // This is the specific category chosen
        $card_category = ProductCategory::withCount('cards')
                            ->whereSlug($slug)
                            ->whereStatus(true)
        ->first();

        //notes card_products = cards
        
        // get all cards related to category chosen
        $cards = Product::with('firstMedia' , 'photos');
        $cards = $cards->with('category')->whereHas('category', function ($query) use ($slug) {
            $query->where([
                'slug' => $slug,
                'status'   => true
            ]);
        })->get();


        //get all card categories to show them of more choice 
        $card_categories = ProductCategory::with('firstMedia')
            ->Active()
            ->RootCategory()
            ->CardCategory()
            ->HasProducts()
            ->where('slug' , '!=',$slug)
        ->get();

        return view('frontend.card_category',compact('card_category' , 'cards' , 'card_categories'));
    }

   


}
