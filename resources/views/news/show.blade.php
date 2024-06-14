<!-- resources/views/news/show.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h2 class="card-title font-bold text-xl">{{ $news->title }}</h2>
                </div>
                <div class="card-body">
                    <p>{{ $news->content }}</p>
                    @if ($news->cover_image)
                        <div class="mt-3">
                            <img src="{{ asset('storage/cover_images/' . $news->cover_image) }}" alt="Cover Image" class="img-thumbnail" style="max-width: 300px;">
                        </div>
                    @else
                        <p>No cover image available.</p>
                    @endif
                </div>
                <div class="card-footer text-sm text-gray-600">
                <p><strong>Published Date:</strong> {{ $news->published_at ? $news->published_at->format('F j, Y \a\t g:i A') : 'Not Published' }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
