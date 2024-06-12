<!-- resources/views/admin/edit-categories.php -->
@extends('layouts.admin')

@section('content')
<div class="container mt-5">
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card mb-3">
        <div class="card-body">
            <h2 class="card-title">Manage Categories</h2>
            <form action="{{ route('faq.categories.store') }}" method="POST" class="mb-4">
                @csrf
                <div class="form-group">
                    <label for="name">New Category Name</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <button type="submit" class="btn btn-success">Add Category</button>
            </form>

            <h3>Existing Categories</h3>
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categories as $category)
                        <tr>
                            <form action="{{ route('faq.categories.update', $category->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <td>
                                    <input type="text" class="form-control" name="name" value="{{ $category->name }}" required>
                                </td>
                                <td>
                                    <button type="submit" class="btn btn-primary btn-sm">Update</button>
                            </form>
                            <form action="{{ route('faq.categories.destroy', $category->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                                </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
