@extends('layouts.user')

@section('content')
<div class="max-w-2xl mx-auto py-10">
    <div class="bg-white shadow-md rounded-lg p-6">
        <div class="flex items-center space-x-6">
            <div class="relative w-20 h-20 rounded-full overflow-hidden">
                <img class="object-cover w-full h-full" src="{{ Storage::url($user->avatar) }}" alt="Avatar">
            </div>
            <div>
                <h1 class="text-2xl font-semibold">{{ $user->name }}</h1>
                <p class="text-gray-600">{{ $user->first_name }} {{ $user->last_name }}</p>
                <p class="text-gray-600">{{ optional($user->birthday)->format('F j, Y') }}</p>
            </div>
        </div>
        <div class="mt-6">
            <h2 class="text-lg font-medium text-gray-900">About Me</h2>
            <p class="mt-2 text-gray-600">{{ $user->bio }}</p>
        </div>
    </div>
</div>
@endsection
