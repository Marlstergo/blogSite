<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <title>
    Blog post
  </title>
</head>

<body class="antialiased">
  <h2>
    {{ strtoupper($post->title)}}
  </h2>
  <div class="">
    {!! $post->body !!}
  </div>
  <br />  
  <a href="/">Go back</a>
</body>

</html>