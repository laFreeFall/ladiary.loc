@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h2 class="text-center">
                        {{ $user->name }}`s comments <span class="badge">{{ $comments->count() }}</span>
                    </h2>
                </div>
            </div>
            @if(count($comments) > 0)
                @foreach($comments as $comment)
                    <div class="panel panel-default">
                        <div class="panel-body">
                            {{ $comment->content }}
                        </div>
                        <div class="panel-footer">
                            <button type="button" class="btn btn-xs btn-default like-btn pull-left" id="comment-like-btn-{{ $comment->id }}" data-morph="comment" data-id="{{ $comment->id }}">
                                <span class="likes-count">{{ $comment->likes->count() }}</span>
                                <i class="fa {{ auth()->user()->likedComment($comment) ? 'fa-heart' : 'fa-heart-o' }} text-primary"></i>
                            </button>
                            Posted to <a href="{{ route('note', ['user' => $user, 'note' => $comment->note]) }}">{{ $comment->note->title }}</a> @ {{ $comment->created_at->diffForHumans() }}
                        </div>
                    </div>
                @endforeach

                <div class="pagination-links text-center">
                    {{ $comments->links() }}
                </div>
            @else
                <div class="alert alert-warning">
                    <strong>{{ $user->name }}</strong> has not posted any comments yet ):
                </div>
            @endif
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('js/like.js') }}"></script>
@endpush