<!-- resources/views/admin/edit_user.blade.php -->

@extends('layouts.dashboard')

@section('content')
    <section id="edit-user">
        <div class="container">
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <h1>Edit User</h1>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" class="form-control" id="name" value="{{ old('name', $user->name) }}" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" class="form-control" id="email" value="{{ old('email', $user->email) }}" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" class="form-control" id="password">
                            <small class="form-text text-muted">Leave blank to keep current password.</small>
                        </div>
                        <div class="form-group">
                            <label for="password_confirmation">Confirm Password</label>
                            <input type="password" name="password_confirmation" class="form-control" id="password_confirmation">
                        </div>
                        <div class="form-group">
                            <label for="type">Type</label>
                            <input type="text" name="type" class="form-control" id="type" value="{{ old('type', $user->type) }}" required>
                        </div>
                        <div class="d-flex justify-content-end gap-2">
                            <button type="submit" class="btn btn-dark mt-3 rounded-pill px-4 py-2"><i data-feather="edit"></i> Update User</button>
                            <a href="{{ route('admin.users') }}" class="btn btn-secondary mt-3 rounded-pill px-4 py-2">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
