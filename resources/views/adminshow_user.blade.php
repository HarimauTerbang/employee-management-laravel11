@extends('layouts.dashboard')

@section('content')
    <section id="show-user">
        <div class="container">
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <h1>User Details</h1>
                    <table class="table table-striped">
                        <tr>
                            <th>ID</th>
                            <td>{{ $user->id }}</td>
                        </tr>
                        <tr>
                            <th>Name</th>
                            <td>{{ $user->name }}</td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>{{ $user->email }}</td>
                        </tr>
                        <tr>
                            <th>Password</th>
                            <td>{{ $user->password }}</td>
                        </tr>
                        <tr>
                            <th>Type</th>
                            <td>{{ $user->type }}</td>
                        </tr>
                        <tr>
                            <th>Created At</th>
                            <td>{{ $user->created_at }}</td>
                        </tr>
                        <tr>
                            <th>Updated At</th>
                            <td>{{ $user->updated_at }}</td>
                        </tr>
                    </table>
                    <div class="d-flex justify-content-end gap-2">
                        <a href="{{ route('admin.users') }}" class="btn btn-secondary mt-3 rounded-pill px-4 py-2">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
