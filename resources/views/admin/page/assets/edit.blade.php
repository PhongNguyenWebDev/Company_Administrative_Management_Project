@extends('layout.app')
@section('content')
    <div class="container">
        <section class="container-fluid position-relative">
            <div class="d-flex justify-content-center mb-3">
                <h2 class="text-center border-bottom">View Asset</h2>
            </div>
            <section class="container">
                <div class="row">
                    <div class="col-7">
                        <form action="{{ route('assets.update', $asset->id) }}" method="POST" id="userForm">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    id="name" name="name" placeholder="Enter name asset"
                                    value="{{ $asset->name }}">
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror`
                            </div>
                            <div>
                                <label for="category" class="form-label">Category</label>
                                <select class="form-control mb-3 @error('category_id') is-invalid @enderror"
                                    name="category_id" id="category">
                                    <option value="">Select a category</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}"
                                            {{ old('category_id', $asset->category_id) == $category->id ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3 col-12 d-flex justify-between">
                                <div class="col-6">
                                    <label for="location" class="form-label">Location</label>
                                    <select name="location_id" id="location"
                                        class="form-control @error('location_id') is-invalid @enderror">
                                        <option>Select a location</option>
                                        @foreach ($locations as $location)
                                            <option value="{{ $location->id }}"
                                                {{ old('location_id', $asset->location_id) == $location->id ? 'selected' : '' }}>
                                                {{ $location->location_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-6 text-start ms-5">
                                    <p id="location_info"></p>
                                </div>
                                @error('location_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="condition" class="form-label">Condition</label>
                                <select class="form-control @error('condition_id') is-invalid @enderror" name="condition_id"
                                    id="condition">
                                    <option value="">Select a Condition</option>
                                    @foreach ($conditions as $condition)
                                        <option value="{{ $condition->id }}"
                                            {{ old('condition_id', $asset->condition_id) == $condition->id ? 'selected' : '' }}>
                                            {{ $condition->name }}</option>
                                    @endforeach
                                </select>
                                @error('condition_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="notes" class="form-label">Notes</label>
                                <textarea class="form-control" name="notes" id="notes" placeholder="Write notes here">{{ $asset->notes }}</textarea>
                                @error('notes')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <h4 class="mt-5 mb-3">Purchase Information</h4>
                            <div class="mb-3">
                                <label for="manufacture_id" class="form-label">Manufacturer</label>
                                <select class="form-control @error('manufacture_id') is-invalid @enderror"
                                    name="manufacture_id" id="manufacture_id">
                                    <option value="">Select a Manufacture</option>
                                    @foreach ($manufacturers as $manufacture)
                                        <option value="{{ $manufacture->id }}"
                                            {{ old('manufacture_id', $asset->manufacture_id) == $manufacture->id ? 'selected' : '' }}>
                                            {{ $manufacture->name }}</option>
                                    @endforeach
                                </select>
                                @error('manufacture_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="model" class="form-label">Model</label>
                                <select class="form-control @error('model_id') is-invalid @enderror" name="model_id"
                                    id="model">
                                    <option value="">Select a Model</option>
                                    @foreach ($models as $model)
                                        <option value="{{ $model->id }}"
                                            {{ old('model_id', $asset->model_id) == $model->id ? 'selected' : '' }}>
                                            {{ $model->name }}</option>
                                    @endforeach
                                </select>
                                @error('model_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="serial" class="form-label">Serial</label>
                                <input class="form-control @error('serial') is-invalid @enderror" name="serial"
                                    id="serial" type="text" value="{{ $asset->serial }}">
                                @error('serial')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="row mb-3">
                                <div class="col-6">
                                    <label for="date" class="form-label">Date</label>
                                    <input class="form-control @error('date') is-invalid @enderror" name="date"
                                        id="date" type="datetime-local"
                                        value="{{ old('date', $asset->date ? \Carbon\Carbon::parse($asset->date)->format('Y-m-d\TH:i') : '') }}">

                                    @error('date')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-6">
                                    <label for="warranty_months" class="form-label">Warranty (months)</label>
                                    <input class="form-control @error('warranty_months') is-invalid @enderror"
                                        name="warranty_months" id="warranty_months" type="number"
                                        value="{{ $asset->warranty_months }}">
                                    @error('warranty_months')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="price" class="form-label">Price</label>
                                <input class="form-control @error('price') is-invalid @enderror" name="price"
                                    id="price" type="text" value="{{ $asset->price }}">
                                @error('price')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="supplier" class="form-label">Supplier</label>
                                <select class="form-control @error('supplier_id') is-invalid @enderror"
                                    name="supplier_id" id="supplier">
                                    <option value="">Select a Supplier</option>
                                    @foreach ($suppliers as $supplier)
                                        <option value="{{ $supplier->id }}"
                                            {{ old('supplier_id', $asset->supplier_id) == $supplier->id ? 'selected' : '' }}>
                                            {{ $supplier->name }}</option>
                                    @endforeach
                                </select>
                                @error('supplier_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            {{-- Upload Image --}}
                            <div class="mt-3">
                                <button type="submit" class="btn btn-primary me-2">Save Asset</button>
                                <a type="button" class="btn btn-danger" onclick="clearForm()">Cancel</a>
                            </div>
                        </form>
                    </div>
                    <div class="col-5">
                        <!-- Modal -->
                        @include('admin.page.assets.upload-image')
                    </div>
                </div>
            </section>
        </section>
    </div>
    <script>
        let currentIndex = 0;
        const images = @json($images); // Lấy dữ liệu hình ảnh từ server

        // Thay đổi hình ảnh chính
        function changePhoto(direction) {
            currentIndex = (currentIndex + direction + images.length) % images.length;
            updateMainPhoto();
            updatePhotoIndex();
        }

        function updateMainPhoto() {
            const mainPhoto = document.getElementById('mainPhoto');
            mainPhoto.src = `/storage/images/${images[currentIndex].file_name}`;
        }

        function updatePhotoIndex() {
            const photoIndex = document.getElementById('photoIndex');
            photoIndex.textContent = `${currentIndex + 1}/${images.length}`;
        }

        document.addEventListener('DOMContentLoaded', () => {
            updateMainPhoto();
            updatePhotoIndex();
        });
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            function loadDepartmentInfo(locationId) {
                if (locationId) {
                    $.ajax({
                        url: '{{ route('department.byLocation', ':id') }}'.replace(':id', locationId),
                        type: 'GET',
                        success: function(data) {
                            console.log('Received Data:', data); // Xem dữ liệu nhận được từ server

                            var departmentHtml = '';
                            if (data && typeof data === 'object') {
                                console.log('Department Data:', data);

                                departmentHtml += `
                                <strong>Department Name:</strong> ${data.department_name || 'N/A'}<br>
                                <strong>Floor:</strong> ${data.floor || 'N/A'}<br>
                                <strong>Unit:</strong> ${data.unit || 'N/A'}<br>
                                <strong>Building:</strong> ${data.building || 'N/A'}<br>
                                <strong>Zip Code:</strong> ${data.zip_code || 'N/A'}<br>
                                <strong>Street Address:</strong> ${data.street_address || 'N/A'}<br>
                                <strong>City:</strong> ${data.city || 'N/A'}<br>
                                <strong>State:</strong> ${data.state || 'N/A'}<br>
                                <strong>Country:</strong> ${data.country || 'N/A'}<br>
                            `;
                            } else {
                                departmentHtml = '<p>No departments found.</p>';
                            }

                            $('#location_info').html(departmentHtml);
                        },
                        error: function(xhr, status, error) {
                            console.error('AJAX Error:', status, error);
                            $('#location_info').html('<p>There was an error retrieving the data.</p>');
                        }
                    });
                } else {
                    $('#location_info').html('');
                }
            }

            // Load department info if there's a pre-selected location ID
            var preSelectedLocationId = '{{ old('location_id', $asset->location_id) }}';
            if (preSelectedLocationId) {
                loadDepartmentInfo(preSelectedLocationId);
            }

            $('#location').on('change', function() {
                var locationId = $(this).val();
                loadDepartmentInfo(locationId);
            });
        });
    </script>
@endsection
