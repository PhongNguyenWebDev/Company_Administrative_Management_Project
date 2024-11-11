@extends('layout.app')

@section('content')
    <section class="container-fluid position-relative">
        <div class="d-flex justify-content-center mb-3">
            <h2 class="text-center border-bottom">Locations</h2>
        </div>
        <section class="container">
            <div class="row justify-content-between">
                <div class="col-md-6">
                    <button class="btn btn-primary" id="toggleSearch">Toggle Search</button>
                    <form class="form-inline mt-2 mt-md-0 mb-3" method="GET" action="{{ route('location') }}">
                        <input class="form-control me-sm-2" type="search" name="query" placeholder="Search"
                            aria-label="Search" value="{{ $query ?? '' }}">
                        <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Search</button>
                    </form>
                </div>
                <div class="col-md-6 d-flex justify-content-md-end">
                    <div class="col-md-4 mb-2 mb-md-0">
                        <a href="{{ route('add-location') }}" class="btn btn-primary btn-block">Add New Location</a>
                    </div>
                    <div class="col-md-4">
                        <button type="button" class="btn btn-primary btn-block" data-bs-toggle="modal"
                            data-bs-target="#importModal">
                            Import Locations
                        </button>
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
                            <th scope="col" class="text-muted table-active">ADDRESS</th>
                            <th scope="col" class="text-muted table-active">NOTE</th>
                            <th scope="col" class="text-muted table-active">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($locations as $location)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $location->location_name }} <br>
                                    @if ($location->departments)
                                        {{ $location->departments->department_name }}
                                    @else
                                        <span class="badge bg-secondary text-light">Other Department</span>
                                    @endif
                                </td>
                                <td>{{ $location->departments->building }}, {{ $location->departments->street_address }},
                                    {{ $location->departments->city }}, {{ $location->departments->country }},
                                    {{ $location->departments->zip_code }}
                                </td>
                                <td>{{ $location->notes }}</td>
                                <td class="d-flex justify-content-between align-items-center">
                                    @can('edit location')
                                        <a href="{{ route('locations.edit', $location->id) }}"
                                            class="btn btn-sm btn-primary">Edit</a>
                                    @endcan
                                    <button class="btn btn-sm btn-info mx-1"
                                        onclick="copyLocation({{ $location->id }})">Copy</button>
                                    @can('delete location')
                                        <form action="{{ route('locations.destroy', $location->id) }}" method="POST"
                                            class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                        </form>
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="d-flex justify-content-center">
                {{ $locations->appends(['query' => request()->query('query')])->links('pagination.custom') }}
            </div>
        </section>
    </section>

    <!-- Import Locations Modal -->
    <div class="modal fade" id="importModal" tabindex="-1" aria-labelledby="importModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="importModalLabel">Import Locations</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('locations.import_excel') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="importFile" class="form-label">Choose CSV or Excel file</label>
                            <input type="file" class="form-control" id="importFile" name="excel_file"
                                accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel"
                                required>
                        </div>
                        <button type="submit" class="btn btn-primary">Import</button>
                        <a class="btn btn-primary"
                            href="{{ route('download_excel', ['file' => 'locations.xlsx']) }}">Download
                            file Excel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('toggleSearch').addEventListener('click', function() {
            var searchForm = document.querySelector('.form-inline');
            if (searchForm) {
                if (searchForm.style.display === 'none') {
                    searchForm.style.display = 'block';
                } else {
                    searchForm.style.display = 'none';
                }
            } else {
                console.error('Search form element not found.');
            }
        });

        // function copyLocation(locationId) {
        //     // Implement the copy functionality here
        // }
        document.addEventListener('DOMContentLoaded', function() {
            @if (session('success'))
                Swal.fire({
                    icon: 'success',
                    title: 'Success!',
                    text: '{{ session('success') }}',
                    showConfirmButton: false,
                    timer: 3000 // Thời gian hiển thị thông báo
                });
            @endif
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
        function copyLocation(locationId) {
            if (confirm('Are you sure you want to copy this location?')) {
                axios.post('{{ route('locations.copy') }}', {
                        location_id: locationId,
                        _token: '{{ csrf_token() }}'
                    })
                    .then(response => {
                        alert('Location copied successfully!');
                        location.reload(); // Tải lại trang để hiển thị địa điểm đã được sao chép
                    })
                    .catch(error => {
                        alert('Failed to copy location. Please try again later.');
                        console.error(error);
                    });
            }
        }
    </script>
@endsection
