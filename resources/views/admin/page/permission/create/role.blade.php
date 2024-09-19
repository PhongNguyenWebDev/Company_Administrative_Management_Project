@extends('admin.page.permission.create.create-permission')
@section('content-create-permission')
    <!-- Roles Content -->
    <div class="container">
        <section class="container-fluid position-relative">
            <div class="d-flex justify-content-center mb-3">
                <h2 class="text-center border-bottom">New Role</h2>
            </div>
            <section class="container">
                <form action="{{ route('role.store') }}" method="post" id="roleForm">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                            name="name" placeholder="Enter role name" value="{{ old('name') }}">
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description"
                            rows="3" placeholder="Enter description">{{ old('description') }}</textarea>
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    @include('admin.page.permission.create.permission-role')
                    <div class="row">
                        <div class="mt-3">
                            <button type="submit" class="btn btn-primary me-2">Save Role</button>
                            <a type="button" class="btn btn-danger" onclick="clearForm()">Cancel</a>
                        </div>
                    </div>
                </form>
            </section>
        </section>
    </div>
@endsection
