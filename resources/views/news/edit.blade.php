<!-- resources/views/news/edit.blade.php -->
@extends('layouts.admin')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h2 class="card-title font-bold text-xl">Edit News Post</h2>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <form action="{{ route('news.update', $news->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" id="title" name="title" value="{{ $news->title }}" required>
                        </div>
                        <div class="form-group">
                            <label for="cover_image">Cover Image</label>
                            @if ($news->cover_image)
                            <div class="mb-2">
                                <img src="{{ asset('storage/cover_images/' . $news->cover_image) }}" alt="Current Cover Image" style="max-width: 300px;">
                            </div>
                            @endif
                            <input type="file" class="form-control-file" id="cover_image" name="cover_image">
                        </div>
                        <div class="form-group">
                            <label for="content">Content</label>
                            <textarea class="form-control" id="content" name="content" rows="5" required>{{ $news->content }}</textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Update News</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
