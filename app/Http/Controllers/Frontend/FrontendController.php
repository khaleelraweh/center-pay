<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index(){
        // $main_slider = Slider::whereStatus(1)->whereNull('parent_id')->get();
        
        // return view('frontend.index',compact('product_categories'));
        return view('frontend.index');
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
