<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\SiteSetting;
use App\Models\Tag;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class BlogController extends Controller
{

    public function blog(){
        $blog = News::query()
                    ->active()
        ->get();

        $tags = Tag::query()->whereStatus(1)->where('section',3)->get();

        $random_posts = News::with('tags')
                                ->active()
                                ->inRandomOrder()
                                ->take(2)
        ->get();

        return view('frontend.blog.blog',compact('blog', 'tags' , 'random_posts'));
    }
    

    public function post($slug):View{

        $post  = News::with('tags')
        ->whereSlug($slug)
        ->Active()
        ->firstOrFail();

        $tags = Tag::query()->whereStatus(1)->where('section',3)->get();

        $related_posts = News::query()
                            ->active()
                            ->take(
                                    SiteSetting::whereNotNull('value')
                                                ->pluck('value','name')
                                    ->toArray()['site_bogs']
                            )
        ->get();

        $random_posts = News::with('tags')
                                ->active()
                                ->inRandomOrder()
                                ->take(2)
        ->get();
        return view('frontend.blog.blog-post' , compact('post','related_posts','tags' , 'random_posts'));
    }
}
