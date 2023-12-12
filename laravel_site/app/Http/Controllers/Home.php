<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Banner;
use App\Models\PostCategory;
use Illuminate\Http\Request;

class Home extends Controller
{
    //
    public function index()
    {
        $homeBanners = Banner::where('position', 'homepage')->where('active', 1)->get();
        $travel_news = PostCategory::where('alias', 'travel-news')->first();
        $travel_news_posts = Post::whereIn('category_id', function ($query) use ($travel_news) {
            $query->select('id')
                  ->from('post_category')
                  ->where('id', $travel_news->id)
                  ->orWhere('parent_id', $travel_news->id);
        })->where('active', 1)->orderByDesc('created_at')->limit(5)->get();
        $travel_news_posts->cat = $travel_news;
        $visa = PostCategory::where('alias', 'visa')->first();
        $airport_services = PostCategory::where('alias', 'airport-services')->first();
        $visa_airport_news_posts = Post::where('category_id', $visa->id)->orWhere('category_id', $airport_services->id)->where('active', 1)->orderByDesc('created_at')->limit(5)->get();
        $visa_airport_news_posts->{$visa->id} = $visa;
        $visa_airport_news_posts->{$airport_services->id} = $airport_services;
        return view('home')->with('homeBanners', $homeBanners)->with('travel_news_posts', $travel_news_posts)->with('visa_airport_news_posts', $visa_airport_news_posts);
    }
}
