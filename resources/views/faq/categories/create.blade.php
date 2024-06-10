@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1>Create Category</h1>
    <form action="{{ route('faq.categories.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Category Name</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Category Name" required>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Create Category</button>
    </form>
</div>
@endsection
