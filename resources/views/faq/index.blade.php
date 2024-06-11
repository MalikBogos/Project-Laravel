@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1>FAQs</h1>
    @foreach($categories as $category)
        <div class="mt-4">
            @foreach($category->faqs as $faq)
                <div class="card mb-3">
                    <div class="card-header">
                        <h5>{{ $faq->question }}</h5>
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