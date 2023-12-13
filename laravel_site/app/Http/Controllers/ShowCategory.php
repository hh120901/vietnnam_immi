<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\PostCategory;
use Illuminate\Http\Request;

class ShowCategory extends Controller
{
	
	//
	public function index(Request $request, $alias = null, $post_slug = null) 
	{
		$category = PostCategory::where('alias', $alias)->first();
		if (!empty($category)) {
			if (!empty($post_slug)) 
			{
				$post = Post::where('slug', $post_slug)->first();
				$post->cat_alias = $alias;
				$other_posts = Post::whereIn('category_id', function ($query) use ($category) {
					$query->select('id')
						  ->from('post_category')
						  ->where('id', $category->id)
						  ->orWhere('parent_id', $category->id);
				})->where('id','<>', $post->id)->where('active', 1)->orderByDesc('created_at')->paginate(5);
				// $other_posts = Post::orderByDesc('created_at')->paginate(10);
				return view('post_details')->with('post', $post)->with('other_posts', $other_posts)->with('request', $request);
			} 
			else 
			{
				$posts = Post::whereIn('category_id', function ($query) use ($category) {
					$query->select('id')
						  ->from('post_category')
						  ->where('id', $category->id)
						  ->orWhere('parent_id', $category->id);
				})->where('active', 1)->orderByDesc('created_at')->paginate(4);
				return view('category_details')->with('category', $category)->with('posts', $posts)->with('request', $request);
			}
		} 
		else {
			return redirect()->route('home');
		}
	}
}
