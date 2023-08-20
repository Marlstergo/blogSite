<x-layout>
    <div>
        @if (count($all_posts) == 0)
            <p>
                No posts found.
            </p>
        @else
            @foreach ($all_posts as $post)
                <?php
                // dd($post->category->slug);
                ?>
                <div>
                    <a href='/post/<?= $post->slug ?? 'hi' ?>'>
                        <h2>{{ $post->title }}</h2>
                    </a>
                    <p>
                        <a href='/category/<?= $post->category->slug ?? '' ?>' style='color: green;'>
                            {{ $post->category->name ?? '' }}
                        </a>
                    </p>
                    <p>
                        {{ $post->excerpt }}
                    </p>
                </div>
            @endforeach

        @endif
    </div>
</x-layout>
