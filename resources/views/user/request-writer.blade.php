@extends('layouts.app')

@section('content')
<div class="container my-4">
    <h1>Request to become a writer.</h1>
    @if (auth()->user()->requestWriter == null)
    <form action="{{ route('user.request-writer.store', auth()->user())}}" method="post">
        {{ csrf_field() }}
        <button class="btn btn-primary" type="submit">Request</button>
    </form>
    @else
    <p class="text-secondary">Please wait for your request</p>
    @endif
</div>
@endsection
