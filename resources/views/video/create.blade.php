@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Add Video</div>

                <div class="card-body">
                    <form role="form" method="POST" enctype="multipart/form-data" class="text-dark" action="{{ route('videos.store') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label>Video URL :</label>
                            <input
                                type="text"
                                class="form-control{{ $errors->has('url') ? ' is-invalid' : '' }}"
                                    name="url"
                                    value="{{ old('url') }}"
                                    placeholder="input video url..."
                                    required
                            >
                            @if ($errors->has('url'))
                                <div class="invalid-feedback">
                                    <strong>{{ $errors->first('url') }}</strong>
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
