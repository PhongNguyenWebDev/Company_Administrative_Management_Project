@extends('admin.page.permission.show.permission')
@section('content-permission')
    <!-- Users Content -->
    <div class="container">
        <section class="container-fluid position-relative">
            <section class="container">
                <div class="row justify-content-between">
                    <div class="col-md-6">
                        <button class="btn btn-primary" id="toggleSearch">Toggle Search</button>
                        <form class="form-inline mt-2 mt-md-0 mb-3" method="GET" action="{{ route('user.index') }}">
                            <input class="form-control me-sm-2" type="search" name="query" placeholder="Search"
                                aria-label="Search" value="{{ $query ?? '' }}">
                            <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Search</button>
                        </form>
                    </div>
                    <div class="col-md-6 d-flex justify-content-md-end">
                        <div class="col-md-4 mb-2 mb-md-0">
                            <a href="{{ route('user.create') }}" class="btn btn-primary btn-block">Add New
                                User</a>
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
                                <th scope="col" class="text-muted table-active">EMAIL</th>
                                <th scope="col" class="text-muted table-active">PHONE</th>
                                <th scope="col" class="text-muted table-active">LOCATION</th>
                                <th scope="col" class="text-muted table-active">ROLE</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($user as $item)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->phone }}</td>
                                    @if (!empty($item->location->location_name))
                                        <td>{{ $item->location->location_name }} <br>
                                            {{ $item->location->departments->department_name }}</td>
                                        <td>
                                    @endif
                                    @foreach ($module as $m)
                                        @if ($item->id === $m->model_id)
                                            {{ $m->role->name }}
                                        @endif
                                    @endforeach
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{-- <div class="d-flex justify-content-center">
                {{ $locations->appends(['query' => $query])->links('pagination.custom') }}
            </div> --}}
            </section>
        </section>
    </div>
@endsection
