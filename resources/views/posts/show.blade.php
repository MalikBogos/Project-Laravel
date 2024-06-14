@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h2 class="card-title font-bold text-xl">{{ $post->title }}</h2>
                </div>
                <div class="card-body">
                    <p>{{ $post->content }}</p>
                    @if ($post->cover_image && $post->cover_image != 'noimage.jpg')
                        <div class="mt-3">
                        <img src="{{ asset('storage/cover_images/' . $post->cover_image) }}" alt="Cover Image" class="img-fluid rounded" style="max-width: 100%; height: auto;">
                        </div>
                        @endif
                </div>
                <div class="card-footer text-sm text-gray-600">
                    <p><strong>Published By:</strong> <a href="{{ route('user.profile', ['user' => $post->user->name]) }}">{{ $post->user->name }}</a></p>
                    <p><strong>Published Date:</strong> {{ $post->created_at->format('F j, Y') }}</p>

                    <!-- Delete Post Button -->
                    @if(Auth::check() && (Auth::user()->id == $post->user_id || Auth::user()->isAdmin()))
                        <form action="{{ route('posts.destroy', $post->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this post?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger mt-2">Delete Post</button>
                        </form>
                    @endif
                </div>
            </div>

            <!-- Display Comments -->
            <div class="mt-4">
                <h3 class="text-xl font-bold">Comments</h3>
                @if (count($post->comments) > 0)
                    @foreach ($post->comments as $comment)
                        <div class="card mt-3">
                            <div class="card-header bg-gray-200">
                                <p class="text-sm text-gray-600">
                                    <strong><a href="{{ route('user.profile', ['user' => $comment->user->name]) }}">{{ $comment->user->name }}</a></strong> commented on {{ $comment->created_at->format('F j, Y \a\t g:i A') }}
                                </p>
                                <!-- Delete Comment Button -->
                                @if(Auth::check() && (Auth::user()->id == $comment->user_id || Auth::user()->isAdmin()))
                                    <form action="{{ route('comments.destroy', $comment->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this comment?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                    </form>
                                @endif
                            </div>
                            <div class="card-body">
                                <p>{{ $comment->content }}</p>
                            </div>
                        </div>
                    @endforeach
                @else
                    <p>No comments yet.</p>
                @endif
            </div>

            <!-- Add Comment Form -->
            @auth
                <div class="mt-4">
                    <h3 class="text-xl font-bold">Add Comment</h3>
                    <form action="{{ route('posts.storeComment', $post->id) }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <textarea class="form-control" id="comment" name="comment" rows="3" placeholder="Write your comment here..." required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit Comment</button>
                    </form>
                </div>
            @else
                <p class="mt-4"><a href="{{ route('login') }}">Log in</a> to add comments.</p>
            @endauth
        </div>
    </div>
</div>
@endsection
