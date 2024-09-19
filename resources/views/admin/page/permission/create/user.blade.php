@extends('admin.page.permission.create.create-permission')
@section('content-create-permission')
    <div class="container">
        <section class="container-fluid position-relative">
            <div class="d-flex justify-content-center mb-3">
                <h2 class="text-center border-bottom">New User</h2>
            </div>
            <section class="container">
                <form action="{{ route('user.store') }}" method="post" id="userForm">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">User Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                            name="name" placeholder="Enter user name" value="{{ old('name') }}">
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                            name="email" placeholder="Enter email" value="{{ old('email') }}">
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <label for="phone" class="form-label">Phone Number</label>
                            <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone"
                                name="phone" value="{{ old('phone') }}">
                            @error('phone')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="role" class="form-label">role</label>
                            <select class="form-control @error('role') is-invalid @enderror" name="role" id="role">
                                @foreach ($roles as $role)
                                    <option value="{{ $role->name }}">{{ $role->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <input type="hidden" name="password" value="123456789">
                    <div class="mb-3">
                        <label for="location" class="form-label">Location</label>
                        <select class="form-control @error('location') is-invalid @enderror" name="location" id="location"
                            onchange="fillAddress()">
                            <option value="">Choose Department</option>
                            @foreach ($locations as $location)
                                <option value="{{ $location->id }}">
                                    {{ $location->location_name }} -
                                    @if ($location->departments)
                                        {{ $location->departments->department_name }}: Department
                                    @else
                                        No Department
                                    @endif
                                </option>
                            @endforeach
                        </select>
                        @error('location')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="department_name" class="form-label">Department</label>
                        <input class="form-control @error('department_name') is-invalid @enderror" type="text"
                            id="department_name" name="department_name" value="{{ old('department_name') }}">
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
                            <input type="number" class="form-control @error('zip_code') is-invalid @enderror"
                                id="zip_code" name="zip_code" value="{{ old('zip_code') }}">
                            @error('zip_code')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <label for="building" class="form-label">Building</label>
                            <input type="text" class="form-control @error('building') is-invalid @enderror"
                                id="building" name="building" placeholder="Enter building"
                                value="{{ old('building') }}">
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
                            <input type="text" class="form-control @error('city') is-invalid @enderror"
                                id="city" name="city" placeholder="Enter city" value="{{ old('city') }}">
                            @error('city')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label for="state" class="form-label">State</label>
                            <input type="text" class="form-control @error('state') is-invalid @enderror"
                                id="state" name="state" placeholder="Enter state" value="{{ old('state') }}">
                            @error('state')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label for="country" class="form-label">Country</label>
                            <input type="text" class="form-control @error('country') is-invalid @enderror"
                                id="country" name="country" placeholder="Enter country" value="{{ old('country') }}">
                            @error('country')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="company" class="form-label">Company</label>
                        <input type="text" class="form-control @error('company') is-invalid @enderror" id="company"
                            name="company" placeholder="Enter your company">
                    </div>
                    <div class="mt-3">
                        <button type="submit" class="btn btn-primary me-2">Save
                            User</button>
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

            if (locationId && locationData.hasOwnProperty(locationId)) {
                var data = locationData[locationId];
                document.getElementById('department_name').value = data.department_name;
                document.getElementById('floor').value = data.floor;
                document.getElementById('unit').value = data.unit;
                document.getElementById('building').value = data.building;
                document.getElementById('zip_code').value = data.zip_code;
                document.getElementById('street_address').value = data.street_address;
                document.getElementById('city').value = data.city;
                document.getElementById('state').value = data.state;
                document.getElementById('country').value = data.country;

                // Enable fields if needed
                document.getElementById('department_name').removeAttribute('disabled');
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
                document.getElementById('department_name').value = '';
                document.getElementById('floor').value = '';
                document.getElementById('unit').value = '';
                document.getElementById('building').value = '';
                document.getElementById('zip_code').value = '';
                document.getElementById('street_address').value = '';
                document.getElementById('city').value = '';
                document.getElementById('state').value = '';
                document.getElementById('country').value = '';

                document.getElementById('department_name').setAttribute('disabled', 'disabled');
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
    </script>
@endsection
