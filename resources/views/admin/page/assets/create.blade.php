@extends('layout.app')
@section('content')
    <div class="container">
        <section class="container-fluid position-relative">
            <div class="d-flex justify-content-center mb-3">
                <h2 class="text-center border-bottom">New Asset</h2>
            </div>
            <section class="container">
                <form action="{{ route('assets.store') }}" method="post" id="userForm">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                            name="name" placeholder="Enter name asset" value="{{ old('name') }}">
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div>
                        <label for="category" class="form-label">Category</label>
                        <select class="form-control mb-3 @error('category_id') is-invalid @enderror" name="category_id"
                            id="category">
                            <option value="">Choose Category</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3 col-6 d-flex justify-between">
                        <div class="col-6">
                            <label for="location" class="form-label">Location</label>
                            <select name="location_id" id="location"
                                class="form-control @error('location_id') is-invalid @enderror" onchange="fillAddress()">
                                <option value="">Choose Location</option>
                                @foreach ($locations as $location)
                                    <option value="{{ $location->id }}">{{ $location->location_name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-6 w-100 ms-5">
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
                            <option value="">Choose Condition</option>
                            @foreach ($conditions as $condition)
                                <option value="{{ $condition->id }}">{{ $condition->name }}</option>
                            @endforeach
                        </select>
                        @error('condition_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="notes" class="form-label">Notes</label>
                        <textarea class="form-control" name="notes" id="notes" placeholder="Write notes here">{{ old('notes') }}</textarea>
                        @error('notes')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <h4 class="mt-5 mb-3">Purchase Information</h4>
                    <div class="mb-3">
                        <label for="manufacture_id" class="form-label">Manufacturer</label>
                        <select class="form-control @error('manufacture_id') is-invalid @enderror" name="manufacture_id"
                            id="manufacture_id">
                            <option value="">Choose Manufacturer</option>
                            @foreach ($manufacturers as $manufacture)
                                <option value="{{ $manufacture->id }}">{{ $manufacture->name }}</option>
                            @endforeach
                        </select>
                        @error('manufacture_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="model" class="form-label">Model</label>
                        <select class="form-control @error('model_id') is-invalid @enderror" name="model_id" id="model">
                            <option value="">Choose Model</option>
                            @foreach ($models as $model)
                                <option value="{{ $model->id }}">{{ $model->name }}</option>
                            @endforeach
                        </select>
                        @error('model_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="serial" class="form-label">Serial</label>
                        <input class="form-control @error('serial') is-invalid @enderror" name="serial" id="serial"
                            type="text" value="{{ old('serial') }}">
                        @error('serial')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="row mb-3">
                        <div class="col-6">
                            <label for="date" class="form-label">Date</label>
                            <input class="form-control @error('date') is-invalid @enderror" name="date" id="date"
                                type="datetime-local" value="{{ old('date') }}">
                            @error('date')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-6">
                            <label for="warranty_months" class="form-label">Warranty (months)</label>
                            <input class="form-control @error('warranty_months') is-invalid @enderror"
                                name="warranty_months" id="warranty_months" type="number"
                                value="{{ old('warranty_months') }}">
                            @error('warranty_months')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">Price</label>
                        <input class="form-control @error('price') is-invalid @enderror" name="price" id="price"
                            type="text" value="{{ old('price') }}">
                        @error('price')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="supplier" class="form-label">Supplier</label>
                        <select class="form-control @error('supplier_id') is-invalid @enderror" name="supplier_id"
                            id="supplier">
                            <option value="">Choose Supplier</option>
                            @foreach ($suppliers as $supplier)
                                <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                            @endforeach
                        </select>
                        @error('supplier_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mt-3">
                        <button type="submit" class="btn btn-primary me-2">Save Asset</button>
                        <a type="button" class="btn btn-danger" onclick="clearForm()">Cancel</a>
                    </div>
                </form>
            </section>
        </section>
    </div>
    <script>
        var locationData = @json($locationData); // Convert PHP array to JavaScript object

        function fillAddress() {
            var locationId = document.getElementById('location').value;
            var locationInfo = document.getElementById('location_info');

            if (locationId && locationData.hasOwnProperty(locationId)) {
                var data = locationData[locationId];
                locationInfo.innerHTML = `
                    <strong>Department Name:</strong> ${data.department_name || ''},
                    <strong>Floor:</strong> ${data.floor || ''},
                    <strong>Unit:</strong> ${data.unit || ''},
                    <strong>Building:</strong> ${data.building || ''},
                    <strong>Zip Code:</strong> ${data.zip_code || ''},
                    <strong>Street Address:</strong> ${data.street_address || ''},
                    <strong>City:</strong> ${data.city || ''},
                    <strong>State:</strong> ${data.state || ''},
                    <strong>Country:</strong> ${data.country || ''}
                `;
            } else {
                // Clear the field if no data
                locationInfo.innerHTML = '';
            }
        }

        function clearForm() {
            document.getElementById('userForm').reset();
            document.getElementById('location_info').innerHTML = '';
        }
    </script>
@endsection
