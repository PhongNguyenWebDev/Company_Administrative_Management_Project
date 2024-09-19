<div class="container">
    @if (isset($assets))
        <tr>
            <td>{{ $assets->category->name ?? 'N/A' }}</td>
            <td>{{ $assets->name }}</td>
            <td>{{ $assets->location->location_name ?? 'N/A' }} <br>
                @if (isset($assets->location->departments))
                    {{ $assets->location->departments->department_name }}
                @else
                    <span class="badge bg-secondary text-light">Other Department</span>
                @endif
            </td>
            <td>{{ $assets->condition->name ?? 'N/A' }}</td>
            <td>
                <div class="d-flex flex-column">
                    <span>Date: {{ \Carbon\Carbon::parse($assets->date)->format('d/m/y') }}</span>
                    <span>Warranty: {{ $assets->warranty_months }}m</span>
                    <span>Model: {{ $assets->model->name ?? 'N/A' }}</span>
                    <span>Serial: {{ $assets->serial ?? 'N/A' }}</span>
                    <span>Vendor: {{ $assets->supplier->name ?? 'N/A' }}</span>
                </div>
            </td>
            <td>{{ number_format($assets->price, 0, '.', ',') }}</td>
            <td>{{ $assets->notes }}</td>
        </tr>
    @endif
</div>
