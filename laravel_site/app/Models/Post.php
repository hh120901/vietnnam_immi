<?php

namespace App\Models;

use App\Models\PostCategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;
    protected $table = 'post';
    protected $guarded = [];

    public function category()
    {
        return $this->belongsTo(PostCategory::class);
    }
}
