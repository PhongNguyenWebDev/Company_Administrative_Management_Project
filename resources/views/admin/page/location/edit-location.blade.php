@extends('layout.app')

@section('content')
    <section class="container-fluid position-relative">
        <div class="d-flex justify-content-center mb-3">
            <h2 class="text-center border-bottom">Edit Location</h2>
        </div>
        <section class="container">
            <form action="{{ route('locations.update', $location->id) }}" method="post" id="locationForm">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="location_name" class="form-label">Location Name</label>
                    <input type="text" class="form-control @error('location_name') is-invalid @enderror"
                        id="location_name" name="location_name" placeholder="Enter location name"
                        value="{{ old('location_name', $location->location_name) }}">
                    @error('location_name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="notes" class="form-label">Notes</label>
                    <textarea class="form-control @error('notes') is-invalid @enderror" id="notes" name="notes" rows="3"
                        placeholder="Enter notes">{{ old('notes', $location->notes) }}</textarea>
                    @error('notes')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <label for="floor" class="form-label">Floor</label>
                        <input type="number" class="form-control @error('floor') is-invalid @enderror" id="floor"
                            name="floor" value="{{ old('floor', $location->floor) }}">
                        @error('floor')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="unit" class="form-label">Unit</label>
                        <input type="number" class="form-control @error('unit') is-invalid @enderror" id="unit"
                            name="unit" value="{{ old('unit', $location->unit) }}">
                        @error('unit')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label for="building" class="form-label">Building</label>
                        <input type="text" class="form-control @error('building') is-invalid @enderror" id="building"
                            name="building" placeholder="Enter building" value="{{ old('building', $location->building) }}">
                        @error('building')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="department_id" class="form-label">Department</label>
                        <select class="form-control @error('department_id') is-invalid @enderror" name="department_id"
                            id="department_id">
                            <option value="">Choose Department</option>
                            @foreach ($departments as $department)
                                <option value="{{ $department->id }}"
                                    {{ old('department_id', $location->department_id) == $department->id ? 'selected' : '' }}>
                                    {{ $department->department_name }}
                                </option>
                            @endforeach
                        </select>
                        @error('department_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="mb-3">
                    <label for="street_address" class="form-label">Street Address</label>
                    <input type="text" class="form-control @error('street_address') is-invalid @enderror"
                        id="street_address" name="street_address" placeholder="Enter street address"
                        value="{{ old('street_address', $location->street_address) }}">
                    @error('street_address')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <label for="city" class="form-label">City</label>
                        <input type="text" class="form-control @error('city') is-invalid @enderror" id="city"
                            name="city" placeholder="Enter city" value="{{ old('city', $location->city) }}">
                        @error('city')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <label for="state" class="form-label">State</label>
                        <input type="text" class="form-control @error('state') is-invalid @enderror" id="state"
                            name="state" placeholder="Enter state" value="{{ old('state', $location->state) }}">
                        @error('state')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <label for="country" class="form-label">Country</label>
                        <input type="text" class="form-control @error('country') is-invalid @enderror" id="country"
                            name="country" placeholder="Enter country" value="{{ old('country', $location->country) }}">
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
        function clearForm() {
            document.getElementById("locationForm").reset();
        }
    </script>
@endsection
