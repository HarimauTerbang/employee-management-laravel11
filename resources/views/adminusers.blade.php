@extends('layouts.dashboard')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Employee List</h1>
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
            <div class="d-flex justify-content-end">
                <a href="{{ route('admin.users.create') }}" class="btn btn-dark mb-3 rounded-pill px-5 py-2"><i data-feather="user-plus"></i> Create New User</a>
            </div>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Type</th>
                        <th>Created At</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->type }}</td>
                            <td>{{ $user->created_at }}</td>
                            <td>
                                <a href="{{ route('admin.users.show', $user->id) }}" class="btn btn-secondary rounded-1"><i data-feather="eye"></i></a>
                                <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-secondary rounded-1"><i data-feather="edit"></i></a>
                                <form action="{{ route('admin.users.delete', $user->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-secondary rounded-1" onclick="return confirm('Are you sure you want to delete this user?')"><i data-feather="trash-2"></i></button>
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
