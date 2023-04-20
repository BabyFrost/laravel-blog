@extends('layout')

@section('content')
    <article>
        <h1>
            <!-- <?= $post->title; ?> -->
            {{ $post->title }}
        </h1>

        <div>
            <!-- <?= $post->body; ?> -->
            {!! $post->body !!}
        </div>

    </article>

    <a href="/">Go Back</a>
@endsection