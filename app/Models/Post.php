<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class Post extends Model
{
    use HasFactory;

    protected $guarded = [];

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
}
