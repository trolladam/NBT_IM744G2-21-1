<div class="comment" id="comment-{{$comment->id}}">
    <div class="card mb-3">
        <div class="card-body">
            <div class="comment-meta d-flex">
                <a href="{{ route('profile.show', ['user' => $comment->user]) }}">
                    <img class="avatar rounded-circle" with="50" height="50" src="{{ $comment->user->avatar }}" alt="{{ $comment->user->full_name }}">
                </a>
                <div class="info ms-3">
                    <p class="mb-0">
                        <a class="user" href="{{ route('profile.show', ['user' => $comment->user]) }}">{{ $comment->user->full_name }}</a>
                    </p>
                    <p>{{ $comment->created_at->diffForHumans() }}</p>
                </div>
            </div>
            <p>
                {{ $comment->message }}
            </p>
        </div>
    </div>
</div>
