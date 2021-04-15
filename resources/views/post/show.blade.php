<div class="page page-post">
    @if ($post->has_image)
        <img class="img-fluid" src="/uploads{{ $post->image }}" alt="{{ $post->title }}" />
    @else
        <img class="img-fluid" src="https://via.placeholder.com/1200x750" alt="{{ $post->title }}" />
    @endif
    <div class="row">
        <div class="col-md-8 mx-auto">
            {{ $post->content }}
        </div>
    </div>
</div>
