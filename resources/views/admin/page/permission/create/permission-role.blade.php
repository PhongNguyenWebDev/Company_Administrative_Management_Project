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
                                class="permission-radio">
                        </td>
                        <td>
                            <input type="radio" name="permission_{{ $module }}" value="full"
                                class="permission-radio">
                        </td>
                        <td>
                            <input type="radio" name="permission_{{ $module }}" value="select"
                                class="permission-radio">
                        </td>
                        @php
                            $count = 0; // Initialize counter for permissions
                        @endphp
                        @foreach ($permissions as $permission)
                            @if ($count < 4 && Str::contains($permission->name, $module))
                                <td>
                                    <input type="checkbox" id="permission_{{ $permission->id }}"
                                        name="permissions[{{ $module }}][permissions][]"
                                        value="{{ $permission->id }}">
                                    <label for="permission_{{ $permission->id }}">{{ $permission->name }}</label>
                                </td>
                                @php
                                    $count++;
                                @endphp
                            @endif
                        @endforeach
                        {{-- Fill in empty cells if less than 4 permissions --}}
                        @for ($i = $count; $i < 4; $i++)
                            <td></td>
                        @endfor
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
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
    });
</script>
