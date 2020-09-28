@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="mb-3">{{ $post->user->name }} at {{ $post->created_at->format('d M Y H:i') }}</div>
            <div class="card mb-3">
                <div class="card-header">
                    @if (auth()->user()!=null && auth()->user()->isAuthor($post))
                    <form action="{{ route('posts.destroy', $post)}}" method="post">
                        {{ csrf_field() }}
                        @method('DELETE')
                        <button class="btn btn-danger float-right" type="submit">Delete</button>
                    </form>
                    <a href="{{ route('posts.edit', $post) }}" class="btn btn-secondary float-right" type="button">Edit</a>
                    @endif
                    <h5>{{ $post->title }}</h5>
                </div>
                <div class="card-body">
                    <p>{{ $post->content }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
