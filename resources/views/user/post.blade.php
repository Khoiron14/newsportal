@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <a href="{{ route('posts.create') }}" class="btn btn-primary mb-3" type="button">Write Post</a>
            @foreach($posts as $post)
                <div class="card mb-3">
                    <div class="card-body">
                        <a href="{{ route('posts.show', $post) }}"><h5>{{ $post->title }}</h5></a>
                        {{ $post->contentLimit() }}...
                        <br>
                        {{ $post->user->name }} at {{ $post->created_at->format('d M Y H:i') }}
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
