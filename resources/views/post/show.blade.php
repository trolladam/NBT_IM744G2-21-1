@extends('layout.master')

@section('content')
<div class="page page-post">
    @if ($post->has_image)
        <img class="img-fluid" src="/uploads{{ $post->image }}" alt="{{ $post->title }}" />
    @else
        <img class="img-fluid" src="https://via.placeholder.com/1200x750" alt="{{ $post->title }}" />
    @endif
    <h1>{{ $post->title }}</h1>
    <div>
        <p>

            <a href="{{ route('profile.show', $post->author) }}">
                <img class="rounded-circle" width="25" src="{{ $post->author->avatar }}" alt="{{ $post->author->full_name }}" />
            </a>
            <a href="{{ route('profile.show', $post->author) }}">
                {{ $post->author->full_name }}
            </a>
        </p>
    </div>
    <div class="row">
        <div class="col-md-8 mx-auto">
            {!! $post->content !!}
        </div>
    </div>
</div>
@endsection
