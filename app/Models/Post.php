<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class Post extends Model
{
    use HasFactory;

    static function findOrFail($id)
    {
        $post = Post::where('id', $id)->first();
        if ($post) {
            return $post;
        } else {
            throw new ModelNotFoundException();
        }
    }
}
