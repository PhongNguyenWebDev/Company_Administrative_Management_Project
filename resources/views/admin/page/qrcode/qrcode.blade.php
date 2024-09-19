<section class="container-fluid position-relative">
    <div class="d-flex justify-content-center mb-3">
        <h2 class="text-center border-bottom">Qr Codes</h2>
    </div>
    <section class="container">
        <div class="row justify-content-between">
            <div class="col-md-6">
                <button class="btn btn-primary" id="toggleSearch">Toggle Search</button>
                <form class="form-inline mt-2 mt-md-0 mb-3" method="GET" action="">
                    <input class="form-control me-sm-2" type="search" name="query" placeholder="Search"
                        aria-label="Search" value="{{ $query ?? '' }}">
                    <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Search</button>
                </form>
            </div>
            <div class="col-md-6 d-flex justify-content-md-end">
                <div class="col-md-4 mb-2 mb-md-0">
                    <a href="{{ route('template') }}" class="btn btn-primary btn-block">Prints Labels</a>
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
                    {{-- @foreach ($locations as $location)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $location->location_name }} <br>
                                    @if ($location->departments)
                                        {{ $location->departments->department_name }}
                                    @else
                                        <span class="badge bg-secondary text-light">Other Department</span>
                                    @endif
                                </td>
                                <td>{{ $location->street_address }}, {{ $location->city }}</td>
                                <td>{{ $location->notes }}</td>
                                <td class="d-flex justify-content-between align-items-center">
                                    <a href="{{ route('locations.edit', $location->id) }}"
                                        class="btn btn-sm btn-primary">Edit</a>
                                    <button class="btn btn-sm btn-info"
                                        onclick="copyLocation({{ $location->id }})">Copy</button>
                                    <form action="{{ route('locations.destroy', $location->id) }}" method="POST"
                                        class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach --}}
                </tbody>
            </table>
        </div>
        {{-- <div class="d-flex justify-content-center">
            {{ $locations->appends(['query' => $query])->links('pagination.custom') }}
        </div> --}}
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

    function copyLocation(locationId) {
        // Implement the copy functionality here
    }
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
