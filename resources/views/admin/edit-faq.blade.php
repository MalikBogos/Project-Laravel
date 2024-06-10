@extends('layouts.admin')

@section('content')
<div class="container mt-5">
    <h1>Edit FAQ</h1>
    <form action="{{ route('faq.update', $faq->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="category_id">Category</label>
            <select class="form-control" id="category_id" name="category_id" required>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ $faq->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="question">Question</label>
            <input type="text" class="form-control" id="question" name="question" value="{{ $faq->question }}" required>
        </div>
        <div class="form-group">
            <label for="answer">Answer</label>
            <textarea class="form-control" id="answer" name="answer" rows="5" required>{{ $faq->answer }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Update FAQ</button>
    </form>
</div>
@endsection
