<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <title>
    Blog post
  </title>
</head>

<body class="antialiased">
  <div class="">
    {!! $post->body !!}
  </div>
  <br />  
  <a href="/">Go back</a>
</body>

</html>