@extends('layout.app')

@section('content')
    <section class="container">
        <div class="product-detail-tab wow fadeInUp" data-wow-delay="0.4s">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12 pt-3">
                        <!-- Nav tabs -->
                        @include('components.nav-create-permission')
                        <!-- Tab panes -->
                        <div class="tab-content">
                            @yield('content-create-permission')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Xử lý hiển thị thông báo thành công nếu có
            @if (session('success'))
                Swal.fire({
                    icon: 'success',
                    title: 'Success!',
                    text: '{{ session('success') }}',
                    showConfirmButton: false,
                    timer: 3000 // Thời gian hiển thị thông báo
                });
            @endif

            // Lắng nghe sự kiện thay đổi của các radio button permissions
            const radios = document.querySelectorAll('input[type="radio"][name^="permissions"]');
            radios.forEach(radio => {
                radio.addEventListener('change', function() {
                    const module = this.name.split('[')[1].split(']')[
                        0]; // Lấy tên module từ tên name của radio button

                    // Tìm các checkbox tương ứng với module
                    const checkboxes = document.querySelectorAll(
                        `input[type="checkbox"][name^="permissions[${module}][]"]`);

                    // Xử lý theo giá trị của radio button được chọn
                    if (this.value === 'none') {
                        checkboxes.forEach(checkbox => {
                            checkbox.checked = false;
                            checkbox.disabled = true;
                        });
                    } else if (this.value === 'full') {
                        checkboxes.forEach(checkbox => {
                            checkbox.checked = true;
                            checkbox.disabled = true;
                        });
                    } else if (this.value === 'select') {
                        checkboxes.forEach(checkbox => {
                            checkbox.disabled = false;
                        });
                    }
                });
            });
        });

        function clearForm() {
            // Xóa dữ liệu trong form và làm mới trạng thái các checkbox
            document.getElementById('userForm').reset();
            document.getElementById('roleForm').reset();
            const checkboxes = document.querySelectorAll('.permission-checkbox');
            checkboxes.forEach(checkbox => {
                checkbox.checked = false;
                checkbox.disabled = false;
            });
        }
    </script>
@endsection
