@extends('layout.app')

@section('content')
    <section class="container">
        <div class="product-detail-tab wow fadeInUp" data-wow-delay="0.4s">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12 pt-3">
                        <!-- Nav tabs -->
                        <x-nav-asset-qrcode />

                        <!-- Tab panes -->
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="asset" role="tabpanel" aria-labelledby="asset-tab">
                                @include('admin.page.assets.list')
                            </div>
                            <div class="tab-pane fade" id="qr-code" role="tabpanel" aria-labelledby="qr-code-tab">
                                <!-- Nội dung của tab QR Code -->
                                @include('admin.page.qrcode.qrcode')
                            </div>
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
