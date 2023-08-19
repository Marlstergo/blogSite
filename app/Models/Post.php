<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;

use function PHPUnit\Framework\fileExists;

class Post
{
  public $title;
  public $excerpt;
  public $date;
  public $body;
  public $slug;

  public function __construct($params)
  {
    // dd($params['title']);
    $this->title = $params['title'];
    $this->excerpt = $params['excerpt'];
    $this->date = $params['date'];
    $this->body = $params['body'];
    $this->slug = $params['slug'];
  }

  static function all ()
  {
    $files = File::files(resource_path("posts/"));

    $posts = [];

    foreach ($files as $file) {
      $post = YamlFrontMatter::parseFile($file);
      // dd($post);
      $posts[] = new Post([
        'title' => $post->title,
        'excerpt' => $post->excerpt,
        'date' => $post->date,
        'body' => $post->body(),
        'slug' => $post->slug,
      ]);
    }
    // dd($posts);

    $all_post = collect(File::files(resource_path("posts/")))
    ->map(fn ($file) => YamlFrontMatter::parseFile($file))
    ->map(fn ($document) => new Post([
      'title' => $document->title,
      'excerpt' => $document->excerpt,
      'date' => $document->date,
      'body' => $document->body(),
      'slug' => $document->slug,
    ]));

    return $all_post;
  }

  static function find($slug)
  {
    $post = static::all()->where('slug', $slug)->first();
    return $post;
  }
}
