@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1>Manage Posts</h1>
    @foreach ($posts as $post)
        <div class="card mb-3">
            <div class="card-body">
                <h2 class="card-title">{{ $post->title }}</h2>
                <p class="card-text">{{ \Illuminate\Support\Str::limit($post->content, 150, $end='...') }}</p>
                <a href="{{ route('admin.edit-post', $post->id) }}" class="btn btn-primary">Edit</a>
                <form action="{{ route('admin.delete-post', $post->id) }}" method="POST" class="d-inline-block">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    @endforeach
</div>
@endsection
