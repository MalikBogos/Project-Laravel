<!-- resources/views/admin/create-faq.blade.php -->
@extends('layouts.admin')

@section('content')
<div class="container mt-5">
    <h1>Create FAQ</h1>
    <form action="{{ route('faq.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="category_id">Category</label>
            <select class="form-control" id="category_id" name="category_id" required>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="question">Question</label>
            <input type="text" class="form-control" id="question" name="question" maxlength="1000" required>
        </div>
        <div class="form-group">
            <label for="answer">Answer</label>
            <textarea class="form-control" id="answer" name="answer" rows="5" maxlength="1000" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Create FAQ</button>
    </form>
</div>
@endsection
