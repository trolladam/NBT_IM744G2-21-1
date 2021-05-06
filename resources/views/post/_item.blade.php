<div class="post d-flex mb-4">
    <a href="{{ route('post.show', $post) }}">
        @if ($post->has_image)
        <img class="flex-shrink-0" width="150" height="150" style="object-fit: cover;" src="/uploads{{ $post->image }}" alt="{{ $post->title }}" />
        @else
        <img class="flex-shrink-0" src="https://via.placeholder.com/150" alt="{{ $post->title }}" />
        @endif
    </a>
    <div class="ms-3">
        <h4>
            <a href="{{ route('post.show', $post) }}">{{ $post->title }}</a>
        </h4>
        <p>
            <a href="{{ route('profile.show', $post->author) }}">
                <img class="rounded-circle" width="15" src="{{ $post->author->avatar }}" alt="{{ $post->author->full_name }}" />
            </a>
            <a href="{{ route('profile.show', $post->author) }}">
                {{ $post->author->full_name }}
            </a>
            @can('update', $post)
                <a href="{{ route('post.edit', $post) }}">edit</a>
            @endcan
        </p>
        <p>
            {{ $post->minutes_to_read }}
        </p>
        <p>{{ $post->description }}</p>
    </div>
</div>
