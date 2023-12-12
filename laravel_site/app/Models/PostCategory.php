<?php

namespace App\Models;

use App\Models\Post;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\PostCategory;

class PostCategory extends Model
{
    const ABOUT_CATEGORY = 'about-us';
    const PRODUCTS_CATEGORY = 'our-products';
    const BLOGS_CATEGORY = 'blogs';
    const TEAMS_CATEGORY = 'our-teams';
    const CAREER_CATEGORY = 'career';
    const BLOGS_GLOBAL = 'blog-global';
    const BLOGS_LOCAL = 'blog-local';
    const BLOGS_TRENDING = 'blog-trending';
    const BLOGS_OTHER = 'blog-other';
	const BLOGS_CHILD	= [self::BLOGS_GLOBAL, self::BLOGS_LOCAL, self::BLOGS_TRENDING, self::BLOGS_OTHER];
    use HasFactory;
    protected $table = 'post_category';
    protected $guarded = [];

    public function posts()
    {
        return $this->hasMany(Post::class, 'category_id');
    }
    public function activePosts() {
        return $this->hasMany(Post::class, 'category_id')->where('active', 1);
    }
}
