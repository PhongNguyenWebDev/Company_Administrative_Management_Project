# 📋 **Company Administrative Management Project**

## 📜 **Giới thiệu**

**Company Administrative Management Project** là một hệ thống quản lý hành chính doanh nghiệp, được xây dựng nhằm hỗ trợ việc quản lý và tối ưu hóa các quy trình nội bộ. Với hệ thống cung cấp các tính năng như:  

- **Trang đăng ký, đăng nhập**: Đăng ký, đăng nhập, quên mật khẩu, xác thực mail mới đăng ký
- **Quản lý nhân viên**: Quản lý thông tin cá nhân phân quyền, phòng ban, và các chức năng liên quan.  
- **Quản lý phòng ban**: Dễ dàng thêm, sửa, xóa và theo dõi hoạt động của các phòng ban.    
- **Tạo mã QR phòng ban**: Thêm, sửa, xóa tạo QR theo template 4x4 , 8x8, 12x12.
Dự án được phát triển dựa trên **Laravel Framework**, kết hợp với **Docker** để triển khai nhanh chóng và dễ dàng trong các môi trường khác nhau.

---

## 🚀 **Cài đặt dự án Laravel**

### **Yêu cầu hệ thống**

- PHP >= 8.0
- MySQL >= 8.0
- Laravel >= 11.0 

---

### **Hướng dẫn cài đặt**

1. **Clone repository**

```bash
git clone https://github.com/PhongNguyenWebDev/Company_Administrative_Management_Project.git
cd Company_Administrative_Management_Project
```

### **2. Cài đặt các dependencies**

```bash
cd Patina_E-Commerce
composer install
```

### **3. Sao chép file .env.example và cấu hình thông tin cơ sở dữ liệu**
```bash
cp .env.example .env
```
**Mở file .env và cập nhật thông tin kết nối cơ sở dữ liệu:
```dotenv
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=patina1
DB_USERNAME=root
DB_PASSWORD=
```

### **4. Tạo key cho dự án**
```bash
php artisan key:generate
```

### **5. Chạy server**
```bash
php artisan serve
```
Mở trình duyệt và truy cập: http://localhost:8000

📧 **Thông tin liên hệ**
Nếu bạn cần hỗ trợ thêm, hãy gửi email cho tôi qua: 📧 phongtn302.work@gmail.com

Cảm ơn bạn đã ghé thăm dự án của tôi! 🚀
