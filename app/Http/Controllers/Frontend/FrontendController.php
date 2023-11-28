<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
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


        return view('frontend.index',compact('main_sliders','adv_sliders','featured_product_cards','card_categories','random_product_cards'));
    }

    public function cart(){
        return view('frontend.cart');
    }

    public function checkout(){
        return view('frontend.checkout');
    }

    public function detail(){
        return view('frontend.detail');
    }

    public function shop(){
        return view('frontend.shop');
    }

}
