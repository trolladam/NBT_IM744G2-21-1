<div class="post d-flex mb-4">
    @if ($post->has_image)
    <img class="flex-shrink-0" src="/uploads{{ $post->image }}" alt="{{ $post->title }}" />
    @else
    <img class="flex-shrink-0" src="https://via.placeholder.com/100" alt="{{ $post->title }}" />
    @endif
    <div class="ms-3">
        <h4>{{ $post->title }}</h4>
        <p>{{ $post->description }}</p>
    </div>
</div>
