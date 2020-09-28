@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Write Post</div>

                <div class="card-body">
                    <form role="form" method="POST" class="text-dark" action="{{ route('posts.update', $post) }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        {{ method_field('PATCH') }}
                        <div class="form-group">
                            <label>Post Title :</label>
                            <input
                                type="text"
                                class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}"
                                    name="title"
                                    value="{{ $post->title }}"
                                    placeholder="input post title..."
                                    required
                            >
                            @if ($errors->has('title'))
                                <div class="invalid-feedback">
                                    <strong>{{ $errors->first('title') }}</strong>
                                </div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label>Content :</label>
                            <textarea
                                class="form-control{{ $errors->has('content') ? ' is-invalid' : '' }}"
                                name="content"
                                rows="3"
                                required>{{ $post->content }}</textarea>
                            @if ($errors->has('content'))
                            <div class="invalid-feedback">
                                <strong>{{ $errors->first('content') }}</strong>
                            </div>
                            @endif
                        </div>
                        <button type="submit" class="btn btn-primary">Edit Post</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
