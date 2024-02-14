<div class="comment">
    <p>
        @if($comment->user)
            {{ $comment->user->Username }} said: {{ $comment->comment_text }}
        @else
            Anonymous User said: {{ $comment->comment_text }}
        @endif
    </p>

    @auth
        <form method="POST" action="{{ route('comments.reply', [$bookId, $comment->id]) }}">
            @csrf
            <label for="reply_text">Reply:</label>
            <textarea name="reply_text" id="reply_text" rows="2" cols="30"></textarea>
            <button type="submit">Reply</button>
        </form>
        @can('delete-comment', $comment)
            <form method="POST" action="{{ route('comments.destroy', [$bookId, $comment->id]) }}">
                @csrf
                @method('DELETE')
                <button type="submit">Delete</button>
            </form>
        @endcan
    @else
        <p>Please log in to leave a reply.</p>
    @endauth

    @if(count($comment->replies) > 0)
        <button class="show-replies-btn" data-comment-id="{{ $comment->id }}">Show Replies</button>
        <div class="replies-content" id="replies-{{ $comment->id }}" style="display: none;">
            @foreach($comment->replies as $reply)
                @include('partials.comment', ['comment' => $reply, 'bookId' => $bookId])
            @endforeach
        </div>
    @endif
</div>
