<x-layout>
    <div>
        @if (count($all_posts) == 0)
            <p>
                No posts found.
            </p>
        @else
            @foreach ($all_posts as $post)
                <div>
                    <a href='/post/<?= $post['id'] ?>'>
                        <h2>{{ $post->title }}</h2>
                    </a>
                    <p>
                        {{ $post->excerpt }}
                    </p>
                </div>
            @endforeach

        @endif
    </div>
</x-layout>
