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
    <div class="replies ps-5">
        @if (!$comment->is_reply)
            <form class="mb-4" action="{{ route('comment.reply', $comment) }}" method="POST">
                @csrf
                <input type="hidden" value="{{ URL::current() }}#comment-{{$comment->id}}" name="redirect_url">
                <div class="mb-3">
                    <textarea class="form-control" name="comment" placeholder="{{ __('Comment text...') }}"></textarea>
                </div>
                <div class="d-grid mb-3">
                    <button class="btn btn-primary btn-lg" type="submit">Reply</button>
                </div>
            </form>
        @endif

        @foreach($comment->comments as $reply)
            @include('comment._item', ['comment' => $reply])
        @endforeach
    </div>
</div>
