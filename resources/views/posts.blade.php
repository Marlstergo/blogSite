<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <title>
        Blog post
    </title>
</head>

<body class="antialiased">
    @foreach ($all_posts as $post)
        <div>
            <a href='/post/<?= $post->slug ?>'>
                <h2>{{ $post->title }}</h2>
            </a>
            <p>
                {{ $post->excerpt }}
            </p>
        </div>
    @endforeach
</body>

</html>