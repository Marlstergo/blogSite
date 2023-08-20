<?php

use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;
use Spatie\YamlFrontMatter\YamlFrontMatter;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    $all_posts = Post::all();
    // dd($all_posts->last()->category->slug);
    return view('posts', ['all_posts' => $all_posts]);
});

Route::get('/post/{post:slug}', function (Post $post) {
    // $post = Post::findOrFail($post);
    return view('post', ['post' => $post]);
});

Route::get('/category/{category:slug}', function (Category $category) {
    $posts = $category->posts;
    // dd($posts->first()->get());
    return view('posts', ['all_posts' => $posts]);
});