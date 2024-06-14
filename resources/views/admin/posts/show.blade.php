@extends('layouts.admin')

@section('content')
<div class="container mx-auto mt-5">
    <div class="flex justify-center">
        <div class="w-full max-w-2xl">
            <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg">
                <div class="bg-blue-500 text-white p-4 rounded-t-lg">
                    <h1 class="text-xl font-semibold">{{ $post->title }}</h1>
                </div>
                <div class="p-6">
                    <p class="text-gray-700 dark:text-gray-300">{{ $post->content }}</p>
                </div>
                @if($post->cover_image)
                <div class="p-6">
                    <img src="{{ asset('storage/' . $post->cover_image) }}" alt="Cover Image" class="w-full h-auto rounded">
                </div>
                @endif
                <div class="bg-gray-100 dark:bg-gray-900 text-gray-500 dark:text-gray-400 p-4 rounded-b-lg">
                    <small>Published on {{ $post->created_at->format('F j, Y') }}</small>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
