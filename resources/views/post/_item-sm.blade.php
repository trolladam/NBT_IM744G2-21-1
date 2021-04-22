<div class="post-sm">
    <div class="d-flex mb-3">
        <div class="me-3">
            <h4><a href="{{ route('post.show', $post) }}">{{ $post->title }}</a></h4>
            <p>{{ $post->description }}</p>
        </div>
        <a href="{{ route('post.show', $post) }}">
            @if ($post->has_image)
                <img class="flex-shrink-0" src="/uploads{{ $post->image }}" alt="{{ $post->title }}" />
            @else
                <img class="flex-shrink-0" src="https://via.placeholder.com/100" alt="{{ $post->title }}" />
            @endif
        </a>
    </div>
</div>
