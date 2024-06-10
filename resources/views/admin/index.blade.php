@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1>Admin Dashboard</h1>
    <p>Welcome, Admin! Here you can manage the website content.</p>
    <a href="{{ route('admin.manage-posts') }}" class="btn btn-primary">Manage Posts</a>
</div>
@endsection
