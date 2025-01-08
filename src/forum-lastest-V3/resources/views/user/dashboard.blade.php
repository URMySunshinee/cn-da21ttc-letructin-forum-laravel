@extends('user.main')
@section('title', 'Quản trị tác giả')
@section('content')
    <style>

.dashboard {
    width: 100%;
    margin: 30px auto;
    text-align: center;
}

h1 {
    color: #007bff;
}

.btn {
    background-color: #007bff;
    color: #fff;
    padding: 10px 15px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

.btn:hover {
    background-color: #0056b3;
}

.post-table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

.post-table th, .post-table td {
    border: 1px solid #ddd;
    padding: 10px;
    text-align: left;
}

.post-table th {
    background-color: #007bff;
    color: #fff;
}

.modal {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.5);
    justify-content: center;
    align-items: center;
}

.modal-content {
    background: #fff;
    padding: 20px;
    border-radius: 5px;
    width: 400px;
    text-align: left;
}

.close {
    float: right;
    font-size: 20px;
    cursor: pointer;
}

input, textarea {
    width: 100%;
    padding: 8px;
    margin: 10px 0;
    border: 1px solid #ddd;
    border-radius: 5px;
}
 option{
    width: 100%;
    padding: 8px;
    margin: 10px 0;
    border: 1px solid #ddd;
    border-radius: 5px;
}

#postForm{
    height: 500px;
    display: flex;
    flex-direction: column;
    align-items: left;
}
.custom-dropdown {
    position: relative;
    width: 200px; /* Chiều rộng của dropdown */
    border: 1px solid #ccc;
    border-radius: 4px;
    background-color: #fff;
    cursor: pointer;
}

.dropdown-header {
    padding: 10px;
    font-size: 14px;
}

.dropdown-list {
    position: absolute;
    top: 100%;
    left: 0;
    width: 100%;
    max-height: 200px; /* Giới hạn chiều cao */
    overflow-y: auto; /* Cuộn dọc khi vượt quá chiều cao */
    border: 1px solid #ccc;
    border-radius: 4px;
    background-color: #fff;
    z-index: 1000;
    display: none; /* Ẩn danh sách ban đầu */
}

.dropdown-item {
    padding: 10px;
    font-size: 14px;
    cursor: pointer;
}

.dropdown-item:hover {
    background-color: #f1f1f1;
}

    </style>
    <div class="dashboard">
        <h1>Quản Trị Bài Đăng</h1>
        <button id="addPostBtn" class="btn">Thêm Bài Đăng</button>

        <!-- Bảng quản lý bài viết -->
        <table class="post-table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Ảnh bìa</th>
                    <th>Tiêu Đề</th>
                    <th>Mô tả</th>
                    <th>Lượt xem</th>
                    <th>Lượt like</th>
                    <th>Lượt dislike</th>
                    <th>Danh mục</th>
                    <th>Trạng thái</th>
                    <th>Sửa</th>
                    <th>Ẩn</th>
                </tr>
            </thead>
            <tbody id="postTableBody">
                @foreach ($my_news as $index => $item)
                <tr>
                    <td>{{++$index}}</td>
                    <td><img src="{{$item->mainImage}}" alt="" srcset=""></td>
                    <td>{{$item->namePost}}</td>
                    <td>{{$item->descriptionPost}}</td>
                    <td>{{$item->viewPost}}</td>
                    <td>{{$item->likePost}}</td>
                    <td>{{$item->dislikePost}}</td>
                    <td>{{$item->nameCategory}}</td>
                    @if ($item->isAccepted==0)
                    <td style="color: green">Đã được phê duyệt</td>
                    @else
                    <td style="color: red">Chưa được phê duyệt</td>
                    @endif
                    <td><a style="color: black" href="/dashboard/mypost/{{$item->id}}">Sửa</a></td>
                    @if ($item->delPost==0)
                    <td><a style="color: red" href="/dashboard/lock/{{$item->id}}">Ẩn</dashboarda></td>
                    @else
                    <td><a style="color: green" href="/dashboard/unlock/{{$item->id}}">Bỏ ẩn</a></td>
                    @endif
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Form thêm/sửa bài đăng -->
    <div id="postModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2 id="modalTitle">Thêm Bài Đăng</h2>
            <form id="postForm" action="/dashboard/addpost" method="POST">
                @csrf
                <label for="namePost">Tên bài viết:</label>
                <input type="text" id="namePost" name="namePost" maxlength="255" required>
                
                <label for="descriptionPost">Mô tả:</label>
                <textarea id="descriptionPost" name="descriptionPost" maxlength="1000" required></textarea>

                <label for="">Link ảnh bìa:</label>
                <input type="text" id="" name="mainImage" maxlength="1000" required>

                <label for="a">Danh mục:</label>
<div class="custom-dropdown">
    <div class="dropdown-header" onclick="toggleDropdown()">Chọn danh mục</div>
    <ul class="dropdown-list" id="dropdownList">
        @foreach ($categories as $item)
        <li class="dropdown-item" data-value="{{ $item->id }}">{{ $item->nameCategory }}</li>
        @endforeach
    </ul>
</div>

<select class="d-none" name="category_id" id="a" required>
    @foreach ($categories as $item)
    <option value="{{ $item->id }}">{{ $item->nameCategory }}</option>
    @endforeach
</select>
                
                
                
                
                <button type="submit" style="height: 50px" class="btn mt-5">Thêm</button>
            </form>
        </div>
    </div>

    <script >
     // script.js
document.addEventListener("DOMContentLoaded", () => {
    const postTableBody = document.getElementById("postTableBody");
    const postModal = document.getElementById("postModal");
    const modalTitle = document.getElementById("modalTitle");
    const postForm = document.getElementById("postForm");
    const closeModal = document.querySelector(".close");
    const addPostBtn = document.getElementById("addPostBtn");

    let editingPostId = null;

    // Hiển thị modal
    const showModal = (isEditing = false, post = {}) => {
        postModal.style.display = "flex";
        modalTitle.textContent = isEditing ? "Sửa Bài Đăng" : "Thêm Bài Đăng";
        postForm.postTitle.value = post.title || "";
        postForm.postContent.value = post.content || "";
        editingPostId = isEditing ? post.id : null;
    };

    // Đóng modal
    const hideModal = () => {
        postModal.style.display = "none";
        editingPostId = null;
    };

    addPostBtn.addEventListener("click", () => showModal());

    closeModal.addEventListener("click", hideModal);

   

});
function toggleDropdown() {
    const dropdownList = document.getElementById('dropdownList');
    dropdownList.style.display = dropdownList.style.display === 'block' ? 'none' : 'block';
}

// Lắng nghe sự kiện click vào item
document.querySelectorAll('.dropdown-item').forEach(item => {
    item.addEventListener('click', function () {
        const selectedValue = this.getAttribute('data-value');
        const dropdownHeader = document.querySelector('.dropdown-header');
        const selectElement = document.getElementById('a');

        // Cập nhật header hiển thị
        dropdownHeader.innerHTML = this.innerHTML;

        // Đồng bộ giá trị với <select> ẩn
        selectElement.value = selectedValue;

        // Ẩn danh sách sau khi chọn
        document.getElementById('dropdownList').style.display = 'none';

        console.log('Selected value:', selectedValue); // Kiểm tra giá trị được chọn
    });
});


    </script>
@endsection
