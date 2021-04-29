@extends('layout.master')

@section('content')
<div class="row">
    <div class="col-md-4 col-lg-2">
        <img class="img-fluid mb-4 w-100 rounded-circle" src="{{ $user->avatar }}" alr="{{ $user->full_name }}" />
        <h3>{{ $user->full_name }}</h3>
        <p>{{ $user->bio }}</p>
    </div>
    <div class="col-md-8">
        @foreach($posts as $post)
            @include('post._item')
        @endforeach
        {{ $posts->links() }}
    </div>
</div>
@endsection
