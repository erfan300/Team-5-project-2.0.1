<div class="comment">
    <p>
        @if($comment->user)
            {{ $comment->user->Username }} said: {{ $comment->comment_text }}
        @else
            Anonymous User said: {{ $comment->comment_text }}
        @endif
    </p>
</div>