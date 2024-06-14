@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if (count($posts) > 0)
                @foreach ($posts as $post)
                    <div class="card mb-4">
                        <div class="card-header bg-primary text-white">
                            <h2 class="card-title font-bold text-xl">{{ $post->title }}</h2>
                        </div>
                        <div class="card-body">
                            <p>{{ $post->content }}</p>
                            @if ($post->cover_image && $post->cover_image != 'noimage.jpg')
                                <div class="mt-3">
                                    <img src="{{ asset('storage/cover_images/' . $post->cover_image) }}" alt="Cover Image" class="img-thumbnail" style="max-width: 300px;">
                                </div>
                            @endif
                        </div>
                        <div class="card-footer text-sm text-gray-600">
                            <p><strong>Published By:</strong> <a href="{{ route('user.profile', ['user' => $post->user->name]) }}">{{ $post->user->name }}</a></p>
                            <p><strong>Published Date:</strong> {{ $post->created_at->format('F j, Y \a\t g:i A') }}</p>
                            <a href="{{ route('posts.show', $post->id) }}" class="btn btn-primary mt-2">View Post</a>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="alert alert-info text-center" role="alert">
                    <h4 class="alert-heading">No posts found</h4>
                    <p>It looks like there are no posts available at the moment. Check back later or create a new post!</p>
                    @auth
                        <a href="{{ route('posts.create') }}" class="btn btn-primary mt-3">Create a Post</a>
                    @endauth
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
