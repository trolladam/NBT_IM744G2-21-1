<div class="post-sm">
    <div class="d-flex mb-3">
        <div class="me-3">
            <h4>{{ $post->title }}</h4>
            <p>{{ $post->description }}</p>
        </div>
        @if ($post->has_image)
        <img class="flex-shrink-0" src="/uploads{{ $post->image }}" alt="{{ $post->title }}" />
        @else
        <img class="flex-shrink-0" src="https://via.placeholder.com/100" alt="{{ $post->title }}" />
        @endif
    </div>
</div>
