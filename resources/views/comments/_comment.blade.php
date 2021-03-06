<div class="panel panel-default">
    <div class="panel-body">
        <p>{{ $comment->content }}</p>
    </div>
    <div class="panel-footer">
        <button type="button" class="btn btn-xs btn-default like-btn pull-left" id="comment-like-btn-{{ $comment->id }}" data-id="{{ $comment->id }}" data-morph="comment">
            <span class="likes-count">{{ $comment->likes->count() }}</span>
            <i class="fa {{ auth()->user()->likedComment($comment) ? 'fa-heart' : 'fa-heart-o' }} text-primary"></i>
        </button>
        <p>Posted by <a href="{{ route('profile', ['user' => $user]) }}">{{ $comment->author->name }}</a> @ {{ $comment->created_at->diffForHumans() }}</p>
    </div>
</div>
