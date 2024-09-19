@extends('layout.app')

@section('content')
    <section class="container">
        <div class="product-detail-tab wow fadeInUp" data-wow-delay="0.4s">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12 pt-3">
                        <!-- Nav tabs -->
                        <x-nav-print-template />

                        <!-- Tab panes -->
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="select-asset" role="tabpanel"
                                aria-labelledby="asset-tab">
                                @include('admin.page.qrcode.print-templates.select-asset')
                            </div>
                            <div class="tab-pane fade" id="print-template" role="tabpanel"
                                aria-labelledby="print-template-tab">
                                <!-- Nội dung của tab QR Code -->
                                @include('admin.page.qrcode.print-templates.print-template')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
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
        document.getElementById('next-button').addEventListener('click', function() {
            var triggerEl = document.querySelector('#print-template-tab');
            var tab = new bootstrap.Tab(triggerEl);
            tab.show();
        });
    </script>
@endsection
