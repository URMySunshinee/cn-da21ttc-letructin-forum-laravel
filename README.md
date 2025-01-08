# ĐỒ ÁN CHUYÊN NGÀNH 
## XÂY DỰNG DIỄN ĐÀN TIN HỌC TRỰC TUYẾN

| GVHD           | Sinh viên thực hiện|
| :--------------| :------------------| 
| Th.S Đoàn Phước Miền | Lê Trực Tín        | 

## 📌 Giới thiệu
Hệ thống diễn đàn trực tuyến là một nền tảng cho phép người dùng đăng bài viết, thảo luận và chia sẻ kiến thức trong cộng đồng. Trang web cung cấp môi trường giao tiếp mở, nơi các thành viên có thể trao đổi thông tin, đặt câu hỏi và tham gia các cuộc thảo luận thuộc nhiều lĩnh vực khác nhau.

## 🚀 Tính năng chính
### Đối với người dùng:
- **Đăng ký/Đăng nhập**: Tạo tài khoản và đăng nhập dễ dàng với xác thực thông tin.  
- **Quản lý hồ sơ**: Cập nhật thông tin cá nhân, thay đổi ảnh đại diện và mật khẩu.  
- **Tạo và đăng bài viết**: Cho phép đăng tải bài viết mới với hình ảnh và phân loại theo danh mục.  
- **Bình luận và phản hồi**: Tương tác với bài viết thông qua bình luận, thích hoặc không thích.  
- **Tìm kiếm bài viết**: Tìm kiếm bài viết theo từ khóa, danh mục hoặc tác giả.  

### Đối với quản trị viên:
- **Duyệt bài viết**: Quản trị viên kiểm duyệt bài viết trước khi được đăng công khai.  
- **Ẩn bài viết vi phạm**: Quản trị viên có thể ẩn bài viết không phù hợp hoặc nhận được báo cáo từ người dùng.  
- **Quản lý người dùng**: Tạo, chỉnh sửa và phân quyền cho người dùng, đảm bảo diễn đàn hoạt động hiệu quả.  
- **Quản lý danh mục**: Tổ chức và chỉnh sửa các danh mục bài viết.  

## 🛠️ Công nghệ sử dụng
- **Backend**: Laravel (PHP)  
- **Frontend**: Blade Template, HTML/CSS, JavaScript  
- **Cơ sở dữ liệu**: MySQL  
- **Thư viện và công cụ khác**: Bootstrap, jQuery  

## ⚙️ Cài đặt và triển khai
### Yêu cầu hệ thống:
- Laragon hoặc XAMPP
- Laravel
- PHP 8.2 hoặc cao hơn  
- Composer  
- Node.js và NPM  
- MySQL  

### Hướng dẫn cài đặt:
1. **Clone project**:  
    ```bash
   git clone https://github.com/URMySunshinee/cn-da21ttc-letructin-forum-laravel.git
   cd src
   cd forum-lastest-V3
2. **Cài đặt các thư viện PHP bằng Composer**:
   ```bash
   composer install
3. **Cấu hình file .env**:
    ```bash
    cp .env.example .env
    php artisan key:generate
4. **Cài đặt cơ sở dữ liệu**:
    ```bash
    php artisan migrate
5. **Khởi chạy server**:
    ```bash
    php artisan serve
Truy cập website tại http://localhost:8000 để trải nghiệm hệ thống.

## 📈 Hướng phát triển
- **Bình luận lồng nhau (Nested Comments)**: Cho phép phản hồi trực tiếp vào từng bình luận.
- **Hệ thống thông báo đẩy**: Thông báo khi có bài viết mới hoặc bình luận mới.
- **Chia sẻ mạng xã hội**: Tích hợp chia sẻ bài viết lên Facebook, X.
- **Xác thực hai lớp (2FA)**: Tăng cường bảo mật cho người dùng.

## Thông tin tác giả:
Lê Trực Tín <br>
Email: 110121137@st.tvu.edu.vn <br>
SĐT: 0949062229