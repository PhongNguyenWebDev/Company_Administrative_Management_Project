@extends('admin.page.permission.show.permission')
@section('content-permission')
    <!-- Roles Content -->
    <div class="container">
        <section class="container-fluid position-relative">
            <section class="container">
                <div class="row justify-content-between">
                    <div class="col-md-6">
                        <button class="btn btn-primary" id="toggleSearch">Toggle Search</button>
                        <form class="form-inline mt-2 mt-md-0 mb-3" method="GET" action="{{ route('role.index') }}">
                            <input class="form-control me-sm-2" type="search" name="query" placeholder="Search"
                                aria-label="Search" value="{{ $query ?? '' }}">
                            <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Search</button>
                        </form>
                    </div>
                    <div class="col-md-6 d-flex justify-content-md-end">
                        <div class="col-md-4 mb-2 mb-md-0">
                            <a href="{{ route('role.create') }}" class="btn btn-primary btn-block">Add New
                                Role</a>
                        </div>
                    </div>
                </div>
            </section>
            <section class="container my-3">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th scope="col" class="text-muted table-active">NO</th>
                                <th scope="col" class="text-muted table-active">NAME</th>
                                <th scope="col" class="text-muted table-active">DESCRIPTION</th>
                                <th scope="col" class="text-muted table-active">FEATURE</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($roles as $role)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $role->name }}</td>
                                    <td>{{ $role->description }}</td>
                                    <td class="col-2">
                                        <div class="d-flex justify-content-between">
                                            <a href="{{ route('role.edit', $role->id) }}"
                                                class="btn btn-primary btn-sm">Edit</a>
                                            <button class="btn btn-sm btn-info mx-1"
                                                onclick="copyRole({{ $role->id }})">Copy</button>

                                            <form action="{{ route('role.destroy', $role->id) }}" method="POST"
                                                onsubmit="return confirm('Are you sure you want to delete this role?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                            </form>
                                            <!-- The text field -->
                                            @can('role-edit-permission')
                                                <a href="{{ route('permission.create', $role->id) }}"
                                                    class="btn btn-success btn-sm">Add Permission</a>
                                            @endcan
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="d-flex justify-content-center">
                    {{ $roles->appends(['query' => $query])->links('pagination.custom') }}
                </div>
            </section>
        </section>
    </div>
    <!-- JavaScript for copying role -->
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
        function copyRole(roleId) {
            if (confirm('Are you sure you want to copy this role?')) {
                axios.post('{{ route('role.copy') }}', {
                        role_id: roleId,
                        _token: '{{ csrf_token() }}'
                    })
                    .then(response => {
                        alert('Role copied successfully!');
                        location.reload();
                    })
                    .catch(error => {
                        alert('Failed to copy role. Please try again later.');
                        console.error(error);
                    });
            }
        }
    </script>
@endsection
