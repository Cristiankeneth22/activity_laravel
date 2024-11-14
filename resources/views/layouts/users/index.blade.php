@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Users Management</h2>

    <!-- Button to add a new user -->
    <a href="{{ route('users.create') }}" class="btn btn-primary mb-3">Add New User</a>

    <!-- Display success message if it exists -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Table displaying the users -->
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->role }}</td>
                    <td>{{ $user->status ? 'Active' : 'Inactive' }}</td>
                    <td>
                        <!-- Edit button -->
                        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning">Edit</a>

                        <!-- Delete form -->
                        <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this user?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
