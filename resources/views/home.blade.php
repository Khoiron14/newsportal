@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @foreach($posts as $post)
                <div class="card mb-3">
                    <div class="card-body">
                        @if ($post->image != null)
                        <img src="{{ URL::to('/') }}/images/{{ $post->image->url }}" class="mb-3 mr-3 float-left" width="200px" alt="{{ $post->slug }}">
                        @endif
                        <a href="{{ route('posts.show', $post) }}"><h5>{{ $post->title }}</h5></a>
                        {{ $post->contentLimit() }}...
                        <br>
                        {{ $post->user->name }} at {{ $post->created_at->format('d M Y H:i') }}
                    </div>
                </div>
            @endforeach
            {{ $posts->links() }}
        </div>
    </div>
</div>
@endsection
