@extends('layouts.user')

@section('content')
<div class="container mt-5">
    @foreach($categories as $category)
        <div class="mt-4">
            @foreach($category->faqs as $faq)
                <div class="card mb-3">
                    <div class="card-header">
                        <h5>{{ $faq->question }}</h5>
                        <span class="badge badge-secondary">{{ $category->name }}</span>
                    </div>
                    <div class="card-body">
                        <p>{{ $faq->answer }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    @endforeach
</div>
@endsection