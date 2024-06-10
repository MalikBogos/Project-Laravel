@extends('layouts.admin')

@section('content')
<div class="container mt-5">
    <div class="d-flex justify-content-end mb-3">
        <a href="{{ route('faq.create') }}" class="btn btn-success">Create FAQ</a>
    </div>
    <h1>FAQs</h1>
    @foreach($categories as $category)
        <h2>{{ $category->name }}</h2>
        @foreach($category->faqs as $faq)
            <div class="card mb-3">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <div>
                        <h5>{{ $faq->question }}</h5>
                        <span class="badge badge-secondary">{{ $category->name }}</span>
                    </div>
                    <div>
                        <a href="{{ route('faq.edit', $faq->id) }}" class="btn btn-primary btn-sm mr-2">Edit</a>
                        <form action="{{ route('faq.destroy', $faq->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </div>
                </div>
                <div class="card-body">
                    <p>{{ $faq->answer }}</p>
                </div>
            </div>
        @endforeach
    @endforeach
</div>
@endsection
