<section class="container-fluid">
    <div class="d-flex justify-content-end my-3">
        <button id="next-button" class="btn btn-primary px-5">Next</button>
    </div>
    <table class="table">
        <thead class="table-active">
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Location</th>
                <th>Asset Code</th>
                <th>Vendor</th>
                <th>Model/Serial</th>
            </tr>
        </thead>
        <tbody id="add-asset">
            @foreach ($assets as $asset)
                @if ($asset->is_added)
                    <tr>
                        <th>{{ $loop->iteration }}</th>
                        <td>{{ $asset->name }}</td>
                        <td>{{ $asset->location->location_name }} <br> {{ $asset->location->departments->name }}</td>
                        <td>{{ $asset->id }}</td>
                        <td>{{ $asset->supplier->name }}</td>
                        <td>{{ $asset->model->name }}/{{ $asset->serial }}</td>
                    </tr>
                @endif
            @endforeach
        </tbody>
    </table>
    <div>
        <div class="col-md-6 my-3">
            <button class="btn btn-primary" id="toggleSearch">Toggle Search</button>
            <form id="search-form" class="form-inline mt-2 mt-md-0 mb-3" method="GET" action="">
                <input class="form-control me-sm-2" type="search" name="query" placeholder="Search"
                    aria-label="Search" value="{{ $query ?? '' }}">
                <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
        <table class="table">
            <thead class="table-active">
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Location</th>
                    <th>Asset Code</th>
                    <th>Vendor</th>
                    <th>Model/Serial</th>
                </tr>
            </thead>
            <tbody id="assets-table-body">
                @foreach ($assets as $asset)
                    <tr>
                        <th>{{ $loop->iteration }}</th>
                        <td>{{ $asset->name }}</td>
                        <td>{{ $asset->location->location_name }} <br> {{ $asset->location->departments->name }}</td>
                        <td>{{ $asset->id }}</td>
                        <td>{{ $asset->supplier->name }}</td>
                        <td>{{ $asset->model->name }}/{{ $asset->serial }}</td>
                        <td class="border-0 d-flex justify-content-center">
                            <form action="{{ route('select_asset', $asset->id) }}" method="POST" class="d-inline">
                                @csrf
                                <input type="checkbox" name="is_added" value="1"
                                    {{ $asset->is_added ? 'checked' : '' }} onchange="this.form.submit()">
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</section>

<script>
    $(document).ready(function() {
        $('input[name="is_added"]').on('change', function() {
            var assetId = $(this).closest('form').attr('action').split('/').pop();
            var url = '{{ route('select_asset', ':id') }}'.replace(':id', assetId);

            $.ajax({
                type: 'POST',
                url: url,
                data: {
                    _token: '{{ csrf_token() }}',
                    is_added: $(this).is(':checked') ? 1 : 0
                },
                success: function(data) {
                    $('#add-asset').html(data);
                },
                error: function(xhr) {
                    console.error('An error occurred:', xhr);
                }
            });
        });
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
    });
</script>
