@extends('layouts.admin')

@section('content')
<div class="container mt-5">
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <h2 class="mb-4">User List</h2>
    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>Name</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Birthday</th>
                    <th style="width: 20%">Bio</th>
                    <th>Usertype</th>
                    <th style="width: 15%">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->first_name }}</td>
                        <td>{{ $user->last_name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->birthday ? $user->birthday->format('Y-m-d') : 'N/A' }}</td>
                        <td>{{ $user->bio }}</td>
                        <td>
                            <span class="badge {{ $user->usertype === 'admin' ? 'bg-success' : 'bg-secondary' }}">
                                {{ ucfirst($user->usertype) }}
                            </span>
                        </td>
                        <td class="text-center">
                            @if ($user->name !== 'admin')
                                <form action="{{ route('users.updateUsertype', $user) }}" method="POST" class="d-inline">
                                    @csrf
                                    <div class="btn-group-vertical" role="group" aria-label="User Type">
                                        <select name="usertype" class="form-select mb-1">
                                            <option value="user" {{ $user->usertype === 'user' ? 'selected' : '' }}>User</option>
                                            <option value="admin" {{ $user->usertype === 'admin' ? 'selected' : '' }}>Admin</option>
                                        </select>
                                        <button type="submit" class="btn btn-primary btn-sm btn-block py-2">Update</button>
                                    </div>
                                </form>
                            @else
                                <span class="text-muted">Cannot change</span>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
