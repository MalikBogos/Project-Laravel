<!-- resources/views/admin/contact_messages.blade.php -->

@extends('layouts.admin')

@section('content')
    <div class="container mt-5">
        <h1>Contact Messages</h1>
        <div class="list-group mt-3">
            @foreach($messages as $message)
                <div class="list-group-item">
                    <h5 class="mb-1">{{ $message->name }}</h5>
                    <p class="mb-1">{{ $message->email }}</p>
                    <p class="mb-1">{{ $message->message }}</p>
                    <small>{{ $message->created_at->diffForHumans() }}</small>
                </div>
            @endforeach
        </div>
    </div>
@endsection
