<!-- resources/views/admin/posts/edit.blade.php -->
@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Edit Post</h1>
    <form action="{{ route('admin.update-post', $post->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ $post->title }}" required>
        </div>
        <div class="form-group">
            <label for="content">Content</label>
            <textarea class="form-control" id="content" name="content" rows="5" required>{{ $post->content }}</textarea>
        </div>
        <div class="form-group">
            <label for="cover_image">Cover Image</label>
            <input type="file" class="form-control-file" id="cover_image" name="cover_image">
            @if($post->cover_image)
                <div class="mt-2">
                    <img src="{{ asset('storage/' . $post->cover_image) }}" alt="Cover Image" class="img-fluid">
                </div>
            @endif
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
