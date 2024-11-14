@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit User</h2>

    <!-- Display validation errors -->
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- User edit form -->
    <form action="{{ route('users.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT') <!-- This tells Laravel to treat the form as a PUT request -->
        
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" name="name" value="{{ old('name', $user->name) }}" required>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" name="email" value="{{ old('email', $user->email) }}" required>
        </div>

        <div class="form-group">
            <label for="role">Role</label>
            <select name="role" class="form-control" required>
                <option value="admin" {{ old('role', $user->role) == 'admin' ? 'selected' : '' }}>Admin</option>
                <option value="user" {{ old('role', $user->role) == 'user' ? 'selected' : '' }}>User</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success">Update User</button>
    </form>
</div>
@endsection
