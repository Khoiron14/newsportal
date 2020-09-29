@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Write Post</div>

                <div class="card-body">
                    <form role="form" method="POST" enctype="multipart/form-data" class="text-dark" action="{{ route('posts.store') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label>Post Title :</label>
                            <input
                                type="text"
                                class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}"
                                    name="title"
                                    value="{{ old('title') }}"
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
                            <label>Image :</label>
                            <input
                                type="file"
                                class="form-control-file"
                                name="image"
                                required
                            >
                            @if ($errors->has('image'))
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <strong class="text-danger"><li>{{ $error }}</li></strong>
                                    @endforeach
                                </ul>
                            @endif
                        </div>

                        <div class="form-group">
                            <label>Content :</label>
                            <textarea
                                class="form-control{{ $errors->has('content') ? ' is-invalid' : '' }}"
                                name="content"
                                rows="3"
                                required></textarea>
                            @if ($errors->has('content'))
                            <div class="invalid-feedback">
                                <strong>{{ $errors->first('content') }}</strong>
                            </div>
                            @endif
                        </div>
                        <button type="submit" class="btn btn-primary">Post</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
