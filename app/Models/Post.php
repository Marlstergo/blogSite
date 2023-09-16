<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class Post extends Model
{
    use HasFactory;

    protected $guarded = [];

    // this auto add category and author query by eager loading to prevent multiple db query after each post is loaded
    protected $with = ['category', 'author'];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    static function findOrFail($id)
    {
        $post = Post::where('id', $id)->first();
        if ($post) {
            return $post;
        } else {
            throw new ModelNotFoundException();
        }
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
