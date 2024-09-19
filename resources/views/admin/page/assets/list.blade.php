<section class="container-fluid position-relative">
    <div class="d-flex justify-content-center mb-3">
        <h2 class="text-center border-bottom">Assets</h2>
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
                    <a href="{{ route('assets.create') }}" class="btn btn-primary btn-block">New Asset</a>
                </div>
                <div class="col-md-4">
                    <button type="button" class="btn btn-primary btn-block" data-bs-toggle="modal"
                        data-bs-target="#importModal">
                        Import Assets
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
                        <th scope="col" class="text-muted table-active">CODE</th>
                        <th scope="col" class="text-muted table-active">NAME</th>
                        <th scope="col" class="text-muted table-active">LOCATION</th>
                        <th scope="col" class="text-muted table-active">CONDITION</th>
                        <th scope="col" class="text-muted table-active">PURCHASE</th>
                        <th scope="col" class="text-muted table-active">PRICE</th>
                        <th scope="col" class="text-muted table-active">NOTES</th>
                        <th scope="col" class="text-muted table-active">FEATURE</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($assets as $asset)
                        <tr>
                            <td scope="row">{{ $loop->iteration }}</td>
                            <td>{{ $asset->category->name }}</td>
                            <td>{{ $asset->name }}</td>
                            <td>{{ $asset->location->location_name }} <br>
                                @if ($asset->location->departments)
                                    {{ $asset->location->departments->department_name }}
                                @else
                                    <span class="badge bg-secondary text-light">Other Department</span>
                                @endif
                            </td>
                            <td>{{ $asset->condition->name }}</td>
                            <td>
                                <div class="d-flex flex-column">
                                    <span>Date: {{ \Carbon\Carbon::parse($asset->date)->format('d/m/y') }}</span>
                                    <span>Warranty: {{ $asset->warranty_months }}m</span>
                                    <span>Model: {{ $asset->model->name }}</span>
                                    <span>Serial: {{ $asset->serial }}</span>
                                    <span>Vendor: {{ $asset->supplier->name }}</span>
                                </div>
                            </td>
                            <td>{{ number_format($asset->price, 0, '.', ',') }}</td>
                            <td>{{ $asset->notes }}</td>
                            @if (isset($asset))
                                <td class="d-flex justify-content-between align-items-center">
                                    <a href="{{ route('assets.edit', $asset->id) }}"
                                        class="btn btn-sm btn-primary">view</a>
                                </td>
                            @endif
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

<!-- Import Locations Modal -->
<div class="modal fade" id="importModal" tabindex="-1" aria-labelledby="importModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="importModalLabel">Import Assets</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('assets.import_excel') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="importFile" class="form-label">Choose CSV or Excel file</label>
                        <input type="file" class="form-control" id="importFile" name="excel_file"
                            accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel"
                            required>
                    </div>
                    <button type="submit" class="btn btn-primary">Import</button>
                    <a class="btn btn-primary" href="{{ route('download_excel', ['file' => 'assets.xlsx']) }}">Download
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
