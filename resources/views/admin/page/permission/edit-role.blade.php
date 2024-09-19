@extends('layout.app')

@section('content')
    <div class="container">
        <section class="container-fluid position-relative">
            <div class="d-flex justify-content-center mb-3">
                <h2 class="text-center border-bottom">Update Role</h2>
            </div>
            <section class="container">
                <form action="{{ route('role.update', $role->id) }}" method="post" id="roleForm">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                            name="name" placeholder="Enter role name" value="{{ old('name', $role->name) }}">
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description"
                            rows="3" placeholder="Enter description">{{ old('description', $role->description) }}</textarea>
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col" class="text-muted table-active">MODULE</th>
                                        <th scope="col" class="text-muted table-active">NONE</th>
                                        <th scope="col" class="text-muted table-active">FULL</th>
                                        <th scope="col" class="text-muted table-active">SELECT</th>
                                        <th scope="col" class="text-muted table-active">VIEW</th>
                                        <th scope="col" class="text-muted table-active">CREATE</th>
                                        <th scope="col" class="text-muted table-active">EDIT</th>
                                        <th scope="col" class="text-muted table-active">DELETE</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($modules as $module)
                                        <tr>
                                            <th scope="row">{{ $module }}</th>
                                            <td>
                                                <input type="radio" name="permission_{{ $module }}" value="none"
                                                    class="permission-radio"
                                                    @if ($role->permissions->where('module', $module)->isEmpty()) checked @endif>
                                            </td>
                                            <td>
                                                <input type="radio" name="permission_{{ $module }}" value="full"
                                                    class="permission-radio"
                                                    @if ($role->permissions->where('module', $module)->count() === 4) checked @endif>
                                            </td>
                                            <td>
                                                <input type="radio" name="permission_{{ $module }}" value="select"
                                                    class="permission-radio"
                                                    @if (
                                                        $role->permissions->where('module', $module)->count() > 0 &&
                                                            $role->permissions->where('module', $module)->count() < 4) checked @endif>
                                            </td>
                                            @php
                                                $count = 0;
                                            @endphp
                                            @foreach ($permissions as $permission)
                                                @if ($count < 4 && Str::contains($permission->name, $module))
                                                    <td>
                                                        <input type="checkbox" id="permission_{{ $permission->id }}"
                                                            name="permissions[{{ $module }}][]"
                                                            value="{{ $permission->id }}"
                                                            @if ($role->permissions->contains($permission->id)) checked @endif>
                                                        <label
                                                            for="permission_{{ $permission->id }}">{{ $permission->name }}</label>
                                                    </td>
                                                    @php
                                                        $count++;
                                                    @endphp
                                                @endif
                                            @endforeach
                                            @for ($i = $count; $i < 4; $i++)
                                                <td></td>
                                            @endfor
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="row">
                        <div class="mt-3">
                            <button type="submit" class="btn btn-primary me-2">Save Role</button>
                            <a type="button" class="btn btn-danger" href="{{ route('role.index') }}">Cancel</a>
                        </div>
                    </div>
                </form>
            </section>
        </section>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const radios = document.querySelectorAll('.permission-radio');
            const checkboxes = document.querySelectorAll('input[type="checkbox"]');

            // Function to disable all checkboxes
            function disableCheckboxes() {
                checkboxes.forEach((checkbox) => {
                    checkbox.disabled = true;
                });
            }

            // Function to enable all checkboxes
            function enableCheckboxes() {
                checkboxes.forEach((checkbox) => {
                    checkbox.disabled = false;
                });
            }

            // Function to uncheck all checkboxes
            function uncheckCheckboxes() {
                checkboxes.forEach((checkbox) => {
                    checkbox.checked = false;
                });
            }

            // Event listener for "NONE" radio button
            radios.forEach((radio) => {
                radio.addEventListener('change', function() {
                    if (this.value === 'none') {
                        disableCheckboxes();
                        uncheckCheckboxes();
                    } else if (this.value === 'full') {
                        enableCheckboxes();
                        checkboxes.forEach((checkbox) => {
                            checkbox.checked = true;
                        });
                    } else if (this.value === 'select') {
                        enableCheckboxes();
                    }
                });
            });

            // Initialize checkboxes based on selected radio button
            radios.forEach((radio) => {
                if (radio.checked) {
                    radio.dispatchEvent(new Event('change'));
                }
            });
        });
    </script>
@endsection
