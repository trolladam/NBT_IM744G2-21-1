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
    <div>
        <div class="col-12 col-md-8 col-lg-6 col-xl-5 mx-auto">
            <p>{{ __("Responses") }}</p>
            @auth
                <form class="mb-4" action="{{ route('post.comment', ['post' => $post]) }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <textarea class="form-control" name="comment" placeholder="{{ __('Comment text...') }}"></textarea>
                    </div>
                    <div class="d-grid mb-3">
                        <button class="btn btn-primary btn-lg" type="submit">Comment</button>
                    </div>
                </form>
            @endauth
            @foreach($post->comments as $comment)
                @include('comment._item')
            @endforeach
    </div>
</div>
@endsection
