<!-- resources/views/news/index.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <div class="d-flex justify-content-between align-items-center">
                        <h2 class="card-title font-bold text-xl">Latest News</h2>
                        @auth
                            @if (auth()->user()->isAdmin())
                                <a href="{{ route('news.create') }}" class="btn btn-success">Create News</a>
                            @endif
                        @endauth
                    </div>
                </div>
                <div class="card-body">
                    @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Cover Image</th>
                                    <th>Published Date</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($news as $item)
                                <tr>
                                    <td>{{ $item->title }}</td>
                                    <td>
                                        @if ($item->cover_image)
                                        <img src="{{ asset('storage/cover_images/' . $item->cover_image) }}" alt="Cover Image" style="max-width: 100px;">
                                        @else
                                        No Image
                                        @endif
                                    </td>
                                    <td>{{ $item->published_at->format('M d, Y \a\t g:i A') }}</td>
                                    <td>
                                        <div class="d-flex">
                                            <a href="{{ route('news.show', $item->id) }}" class="btn btn-primary btn-sm me-1">View</a>
                                            @auth
                                                @if (auth()->user()->isAdmin())
                                                    <a href="{{ route('news.edit', $item->id) }}" class="btn btn-info btn-sm me-1">Edit</a>
                                                    <form action="{{ route('news.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this news post?')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                                    </form>
                                                @endif
                                            @endauth
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="4" class="text-center">No news posts found.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
