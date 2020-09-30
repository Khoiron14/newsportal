@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="mb-3">{{ $post->user->name }} at {{ $post->created_at->format('d M Y H:i') }}</div>
            <div class="card mb-3">
                <div class="card-header">
                    @if (auth()->user()!=null && auth()->user()->isAuthor($post))
                    <form action="{{ route('posts.destroy', $post)}}" method="post" onsubmit="return confirm('Are you sure?')">
                        {{ csrf_field() }}
                        @method('DELETE')
                        <button class="btn btn-danger float-right" type="submit">Delete</button>
                    </form>
                    <a href="{{ route('posts.edit', $post) }}" class="btn btn-secondary float-right" type="button">Edit</a>
                    @endif
                    <h5>{{ $post->title }}</h5>
                </div>
                <div class="card-body">
                    @if ($post->image != null)
                    <img src="{{ URL::to('/') }}/images/{{ $post->image->url }}" class="mb-3" width="100%" alt="{{ $post->slug }}">
                    @endif

                    <p>{{ $post->content }}</p>
                </div>
            </div>

            <div class="card mb-3">
                <div class="card-header">
                    <h5>Write Comment</h5>
                </div>
                <div class="card-body">
                    <form role="form" method="POST" class="text-dark" action="{{ route('comment.store', $post) }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <textarea
                                class="form-control{{ $errors->has('text') ? ' is-invalid' : '' }}"
                                name="text"
                                rows="3"
                                required></textarea>
                            @if ($errors->has('text'))
                            <div class="invalid-feedback">
                                <strong>{{ $errors->first('text') }}</strong>
                            </div>
                            @endif
                        </div>
                        <button type="submit" class="btn btn-primary">Comment</button>
                    </form>
                </div>
            </div>

            @foreach($post->comments->reverse() as $comment)
                <div class="card mb-3">
                    <div class="card-body">
                        @if (auth()->user()!=null && auth()->user()->isCommenter($comment))
                        <form action="{{ route('comment.destroy', [$post, $comment])}}" method="post" onsubmit="return confirm('Are you sure?')">
                            {{ csrf_field() }}
                            @method('DELETE')
                            <button class="btn btn-danger float-right" type="submit">Delete</button>
                        </form>
                        @endif
                        <b>{{ $comment->user->name }}</b> - {{ $comment->created_at->diffForHumans() }}
                        <p>{{ $comment->text }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
