<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <title>
    Blog post
  </title>
</head>

<body class="antialiased">
  @yield('slot')
</body>

</html>