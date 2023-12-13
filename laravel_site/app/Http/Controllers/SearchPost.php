<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class SearchPost extends Controller
{
    //
    public function index(Request $request) {
        $posts = Post::where('title', 'like', '%'.$request->input('search_text').'%')->where('active', 1)->orderByDesc('created_at')->paginate(5);
        return view('search_results')->with('posts', $posts)->with('request', $request);
    }
}
