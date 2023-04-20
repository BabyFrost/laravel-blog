@extends ('layout')

@section('content')
    <!-- <?php foreach ($posts as $post) : ?> -->
    @foreach ($posts as $post)
        <article class="{{ $loop->even ? 'foobar' : ''}}">
            <h1>
                <a href="/posts/{{ $post->slug }}">
                    <!-- <?= $post->title; ?> -->
                    {{ $post->title }}
                </a>
            </h1>

            <div>
                <!-- <?= $post->excerpt; ?> -->
                {{ $post->excerpt }}
            </div>
        </article>
    @endforeach
    <!-- <?php endforeach; ?> -->
@endsection