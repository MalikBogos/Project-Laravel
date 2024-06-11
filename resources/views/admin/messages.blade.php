<!-- resources/views/admin/messages.blade.php -->

@extends('layouts.admin')

@section('content')
<div class="container mt-5">
    <div class="card border-primary">
        <div class="card-body">
            <h1 class="card-title">Submitted Messages</h1>
            @if($messages->isEmpty())
                <p>No messages found.</p>
            @else
                <ul class="list-group">
                    @foreach($messages as $message)
                        <li class="list-group-item">
                            <strong>{{ $message->name }}</strong> ({{ $message->email }})<br>
                            {{ $message->message }}<br>
                            <small>Submitted on {{ $message->created_at->format('Y-m-d H:i:s') }}</small>
                        </li>
                    @endforeach
                </ul>
            @endif
        </div>
    </div>
</div>
@endsection
