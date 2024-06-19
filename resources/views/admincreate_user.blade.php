@extends('layouts.dashboard')

@section('content')
    <section id="create-user">
        <div class="container">
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <h1>Create New User</h1>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{ route('admin.users.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" class="form-control" id="name" value="{{ old('name') }}" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" class="form-control" id="email" value="{{ old('email') }}" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" class="form-control" id="password" required>
                        </div>
                        <div class="form-group">
                            <label for="password_confirmation">Confirm Password</label>
                            <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" required>
                        </div>
                        <div class="form-group">
                            <label for="type">Type</label>
                            <input type="text" name="type" class="form-control" id="type" value="{{ old('type') }}" required>
                        </div>

                        <div class="d-flex justify-content-end gap-2">
                            <button type="submit" class="btn btn-dark mt-3 rounded-pill px-4 py-2"><i data-feather="user-plus"></i> Create User</button>
                            <a href="{{ route('admin.users') }}" class="btn btn-secondary mt-3 rounded-pill px-4 py-2">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
