<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\SiteSetting;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class BlogController extends Controller
{

    public function blog(){
        return view('frontend.blog.blog-sticky-sidebar');
    }
    

    public function post($slug):View{

        $post  = News::query()
        ->whereSlug($slug)
        ->Active()
        ->firstOrFail();
        


        $related_posts = News::query()
        ->active()
        ->take(
            SiteSetting::whereNotNull('value')
                    ->pluck('value','name')
                    ->toArray()['site_bogs']
        )
        ->get();
        return view('frontend.blog.blog-post' , compact('post','related_posts'));
    }
}
