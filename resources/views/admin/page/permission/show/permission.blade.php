@extends('layout.app')

@section('content')
    <section class="container">
        <div class="product-detail-tab wow fadeInUp" data-wow-delay="0.4s">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12 pt-3">
                        <!-- Nav tabs -->
                        <x-nav-permission />
                        <!-- Tab panes -->
                        <div class="tab-content">
                            @yield('content-permission')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        function copyLocation(locationId) {
            // Implement the copy functionality here
        }
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
    </script>
@endsection
