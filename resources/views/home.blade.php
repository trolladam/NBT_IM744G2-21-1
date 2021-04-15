@extends('layout.master')

@section('content')
<div class="row mb-5">
    <div class="col-md-6 col-lg-4">
        <div class="featured-post">
            @if ($featured_post->has_image)
            <img class="img-fluid" src="/uploads{{ $featured_post->image }}" alt="{{ $featured_post->title }}" />
            @else
            <img class="img-fluid" src="https://via.placeholder.com/1200" alt="{{ $featured_post->title }}" />
            @endif
            <h3 class="mt-3">{{ $featured_post->title }}</h3>
            <p>{{ $featured_post->description }}</p>
        </div>
    </div>
    <div class="col-md-6 col-lg-8">
        <h2>{{ $featured_topic->title }}</h2>
        @foreach($featured_topic_posts as $post)
            @include('post._item-sm')
        @endforeach
    </div>
</div>
<div class="row">
    <div class="col-md-8">
        <h2 class="mb-4">{{ __("Recent posts") }}</h2>
        @foreach($recent as $post)
            @include('post._item')
        @endforeach
    </div>
</div>
@endsection
