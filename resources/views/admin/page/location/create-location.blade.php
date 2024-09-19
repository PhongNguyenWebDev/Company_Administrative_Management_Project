@extends('layout.app')

@section('content')
    <section class="container-fluid position-relative">
        <div class="d-flex justify-content-center mb-3">
            <h2 class="text-center border-bottom">New Location</h2>
        </div>
        <section class="container">
            <form action="{{ route('locations.store') }}" method="post" id="locationForm">
                @csrf
                <div class="mb-3">
                    <label for="location_name" class="form-label">Location Name</label>
                    <input type="text" class="form-control @error('location_name') is-invalid @enderror"
                        id="location_name" name="location_name" placeholder="Enter location name"
                        value="{{ old('location_name') }}">
                    @error('location_name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="notes" class="form-label">Notes</label>
                    <textarea class="form-control @error('notes') is-invalid @enderror" id="notes" name="notes" rows="3"
                        placeholder="Enter notes">{{ old('notes') }}</textarea>
                    @error('notes')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="department" class="form-label">Department</label>
                    <select class="form-control @error('department_id') is-invalid @enderror" name="department_id"
                        id="department" onchange="fillAddress()">
                        <option value="">Choose Department</option>
                        @foreach ($departments as $department)
                            <option value="{{ $department->id }}"
                                {{ old('department_id') == $department->id ? 'selected' : '' }}>
                                {{ $department->department_name }}
                            </option>
                        @endforeach
                    </select>
                    @error('department_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <label for="floor" class="form-label">Floor</label>
                        <input type="number" class="form-control @error('floor') is-invalid @enderror" id="floor"
                            name="floor" value="{{ old('floor') }}">
                        @error('floor')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <label for="unit" class="form-label">Unit</label>
                        <input type="number" class="form-control @error('unit') is-invalid @enderror" id="unit"
                            name="unit" value="{{ old('unit') }}">
                        @error('unit')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <label for="zip_code" class="form-label">Zip code</label>
                        <input type="number" class="form-control @error('zip_code') is-invalid @enderror" id="zip_code"
                            name="zip_code" value="{{ old('zip_code') }}">
                        @error('zip_code')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <label for="building" class="form-label">Building</label>
                        <input type="text" class="form-control @error('building') is-invalid @enderror" id="building"
                            name="building" placeholder="Enter building" value="{{ old('building') }}">
                        @error('building')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="street_address" class="form-label">Street Address</label>
                        <input type="text" class="form-control @error('street_address') is-invalid @enderror"
                            id="street_address" name="street_address" placeholder="Enter street address"
                            value="{{ old('street_address') }}">
                        @error('street_address')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <label for="city" class="form-label">City</label>
                        <input type="text" class="form-control @error('city') is-invalid @enderror" id="city"
                            name="city" placeholder="Enter city" value="{{ old('city') }}">
                        @error('city')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <label for="state" class="form-label">State</label>
                        <input type="text" class="form-control @error('state') is-invalid @enderror" id="state"
                            name="state" placeholder="Enter state" value="{{ old('state') }}">
                        @error('state')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <label for="country" class="form-label">Country</label>
                        <input type="text" class="form-control @error('country') is-invalid @enderror" id="country"
                            name="country" placeholder="Enter country" value="{{ old('country') }}">
                        @error('country')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="mt-3">
                    <button type="submit" class="btn btn-primary me-2">Save Location</button>
                    <button type="button" class="btn btn-danger" onclick="clearForm()">Cancel</button>
                </div>
            </form>
        </section>
    </section>

    <script>
        var departmentData = @json($departmentData); // Convert PHP array to JavaScript object

        function fillAddress() {
            var departmentId = document.getElementById('department').value;

            if (departmentId && departmentData.hasOwnProperty(departmentId)) {
                var data = departmentData[departmentId];
                document.getElementById('floor').value = data.floor;
                document.getElementById('unit').value = data.unit;
                document.getElementById('building').value = data.building;
                document.getElementById('zip_code').value = data.zip_code;
                document.getElementById('street_address').value = data.street_address;
                document.getElementById('city').value = data.city;
                document.getElementById('state').value = data.state;
                document.getElementById('country').value = data.country;

                // Enable fields if needed
                document.getElementById('floor').removeAttribute('disabled');
                document.getElementById('unit').removeAttribute('disabled');
                document.getElementById('building').removeAttribute('disabled');
                document.getElementById('zip_code').removeAttribute('disabled');
                document.getElementById('street_address').removeAttribute('disabled');
                document.getElementById('city').removeAttribute('disabled');
                document.getElementById('state').removeAttribute('disabled');
                document.getElementById('country').removeAttribute('disabled');
            } else {
                // Clear and disable fields
                document.getElementById('floor').value = '';
                document.getElementById('unit').value = '';
                document.getElementById('building').value = '';
                document.getElementById('zip_code').value = '';
                document.getElementById('street_address').value = '';
                document.getElementById('city').value = '';
                document.getElementById('state').value = '';
                document.getElementById('country').value = '';

                document.getElementById('floor').setAttribute('disabled', 'disabled');
                document.getElementById('unit').setAttribute('disabled', 'disabled');
                document.getElementById('building').setAttribute('disabled', 'disabled');
                document.getElementById('zip_code').setAttribute('disabled', 'disabled');
                document.getElementById('street_address').setAttribute('disabled', 'disabled');
                document.getElementById('city').setAttribute('disabled', 'disabled');
                document.getElementById('state').setAttribute('disabled', 'disabled');
                document.getElementById('country').setAttribute('disabled', 'disabled');
            }
        }

        function clearForm() {
            document.getElementById("locationForm").reset();
            document.getElementById('floor').setAttribute('disabled', 'disabled');
            document.getElementById('unit').setAttribute('disabled', 'disabled');
            document.getElementById('building').setAttribute('disabled', 'disabled');
            document.getElementById('zip_code').setAttribute('disabled', 'disabled');
            document.getElementById('street_address').setAttribute('disabled', 'disabled');
            document.getElementById('city').setAttribute('disabled', 'disabled');
            document.getElementById('state').setAttribute('disabled', 'disabled');
            document.getElementById('country').setAttribute('disabled', 'disabled');
        }

        // Initial call to set initial state
        fillAddress();
    </script>
@endsection
