<style>
    @keyframes fadeInUp {
        0% {
            opacity: 0;
            transform: scale(0);
        }
        50% {
            opacity: 1;
            transform: scale(1) ;
        }
        80% {
            opacity: 1;
            transform: scale(0.85);
        }
        100% {
            opacity: 1;
            transform: scale(1);
        }
    }
    #userlist {
        animation: fadeInUp 0.5s ease forwards;
    }
</style>
<main id="user-list" style="margin-top: 10vh; margin-bottom: 10vh">
    <div class="container">
        <h1 id="userlist" class="text-center display-4 py-4">Employee List</h1>
        <div class="card p-3 py-3">
            <div class="row">
                <div class="col-md-12">
                    <div id="userlist">
                    @if (session('success'))
                        <div class="alert alert-success">
                            <i data-feather="check-circle"></i>
                            {{ session('success') }}
                        </div>
                    @endif
                    @if (session('error'))
                        <div class="alert alert-danger">
                            <i data-feather="alert-circle"></i>
                            {{ session('error') }}
                        </div>
                    @endif
                    </div>
                    <div class="d-flex justify-content-end">
                        <a href="{{ route('admin.users.create') }}" class="btn btn-dark mb-3 rounded-pill px-5 py-2"><i data-feather="user-plus"></i> Create New User</a>
                    </div>
                    <table class="table table-striped table-responsive d-block">
                        <thead>
                            <tr>
                                <th class="col-1">ID</th>
                                <th class="col-3">Name</th>
                                <th class="col-3">Email</th>
                                <th class="col-2">Type</th>
                                {{-- <th class="col-2">Created At</th> --}}
                                <th class="col-1">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->type }}</td>
                                    {{-- <td>{{ $user->created_at }}</td> --}}
                                    <td class="d-lg-flex gap-2">
                                        <a href="{{ route('admin.users.show', $user->id) }}" class="btn btn-secondary rounded-0"><i data-feather="eye"></i></a>
                                        <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-light rounded-0"><i data-feather="edit"></i></a>
                                        <form action="{{ route('admin.users.delete', $user->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-secondary rounded-0" onclick="return confirm('Are you sure you want to delete this user?')"><i data-feather="trash-2"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
                <div class="d-flex justify-content-center">
                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>
</main>

<script>
    $(document).ready(function() {
        $('#userlist').addClass('animated');
    });
</script>
