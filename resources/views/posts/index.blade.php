@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4" style="color:white">Posts</h1>
    <div class="row">
        @foreach ($posts as $post)
        <div class="col-md-6 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <h2 class="card-title">{{ $post->title }}</h2>
                    <p class="card-text">{{ \Illuminate\Support\Str::limit($post->content, 150, $end='...') }}</p>
                    <a href="{{ route('posts.show', $post->id) }}" class="btn btn-primary">Read More</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
