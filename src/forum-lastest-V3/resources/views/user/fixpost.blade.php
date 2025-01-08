@extends('user.main')
@section('title', 'sửa bài viết')
@section('content')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/summernote/dist/summernote-lite.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote/dist/summernote-lite.js"></script>
<style>
        /* styles.css */




h1 {
    text-align: center;
    color: #007bff;
}

form {
    display: flex;
    flex-direction: column;
}

label {
    margin: 10px 0 5px;
    font-weight: bold;
}

input, textarea, select {
    padding: 10px;
    margin-bottom: 20px;
    border: 1px solid #ddd;
    border-radius: 5px;
    width: 100%;
}

textarea {
    resize: vertical;
    height: 150px;
}

button {
    background-color: #007bff;
    color: #fff;
    padding: 10px 15px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

button:hover {
    background-color: #0056b3;
}


    </style>
    <div class="container mt-5 mb-5">
        <h1>Sửa Bài Viết</h1>
        <form id="editPostForm" action="" method="POST">
            @csrf
            <input type="hidden"  name="id" value="{{$post_by_id->id}}" required>
            
            <label for="">Tên bài viết:</label>
            <input type="text" id="" name="namePost" value="{{$post_by_id->namePost}}" required>

            <label for="">Mô tả:</label>
            <textarea id="" name="descriptionPost" required>{{$post_by_id->descriptionPost}}</textarea>

            <label for="">Ảnh bìa:</label>
            <img width="20%" src="{{$post_by_id->mainImage}}" alt="">
            <input type="text" id="" name="mainImage" value="{{$post_by_id->mainImage}}" required>

            <label for="">Danh Mục:</label>
            <select id="" name="category_id" required>
                @foreach ($categories as $item)
                    @if ($item->id==$post_by_id->category_id)
                <option value="{{$item->id}}" selected>{{$item->nameCategory}}</option>
                    @else
                <option value="{{$item->id}}">{{$item->nameCategory}}</option>
                    @endif
                @endforeach
            </select>

            <button type="submit" class="btn mt-5">Cập Nhật</button>
        </form>
    </div>

    <script src="script.js">
        // script.js
document.addEventListener("DOMContentLoaded", () => {
    const editPostForm = document.getElementById("editPostForm");

    // Lấy dữ liệu bài viết cũ và điền vào form (thực tế sẽ lấy từ API hoặc cơ sở dữ liệu)
    const postId = document.getElementById("postId").value;
    const postTitle = document.getElementById("postTitle");
    const postContent = document.getElementById("postContent");
    const postCategory = document.getElementById("postCategory");

    // Giả sử đây là dữ liệu bài viết cũ
    const oldPostData = {
        title: "Tiêu đề bài viết cũ",
        content: "Đây là nội dung bài viết cũ.",
        category: "1"  // Danh mục là "Công Nghệ"
    };

    // Điền dữ liệu vào form
    postTitle.value = oldPostData.title;
    postContent.value = oldPostData.content;
    postCategory.value = oldPostData.category;

    // Xử lý submit form
    editPostForm.addEventListener("submit", (e) => {
        e.preventDefault();

        const updatedPost = {
            id: postId,
            title: postTitle.value,
            content: postContent.value,
            category: postCategory.value,
        };

        // Gửi dữ liệu đã cập nhật (có thể gửi qua API)
        console.log("Dữ liệu bài viết đã cập nhật:", updatedPost);

        // Hiển thị thông báo thành công hoặc thực hiện hành động khác
        alert("Bài viết đã được cập nhật thành công!");
    });
});
    </script>


<style>
    /* styles.css */
.comment-table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

.comment-table th, .comment-table td {
    border: 1px solid #ddd;
    padding: 10px;
    text-align: left;
}

.comment-table th {
    background-color: #007bff;
    color: #fff;
}

button {
    background-color: #ff3333;
    color: #fff;
    padding: 5px 10px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

button:hover {
    background-color: #cc0000;
}

</style>

<div class="container">
    <h1>Danh Sách Nội Dung Con</h1>
<form action="/dashboard/productdetail/add/{{$post_by_id->id}}" method="post">
    @csrf
    <label for="">Thêm nội dung con: </label>
    <input type="text" value="" name="title" placeholder="Tiêu đề" required>
    <input type="text" value="" name="content" placeholder="Nội dung" required>
    <button style="background-color: #007bff" type="submit">Thêm</button>
</form>
    <table class="comment-table mb-5 mt-5">
        <thead>
            <tr>
                <th>#</th>
                <th class="col-2">Tiêu đề</th>
                <th class="col-6">Nội dung</th>
                <th>Đổi vị trí</th>
                <th>Lưu</th>
                <th>Xóa</th>
            </tr>
        </thead>
        <tbody id="commentTableBody">
            @foreach ($post_details as $index => $item)
            <form id="save-detail" action="/dashboard/productdetail/update/{{$item->id}}" method="post">
                @csrf
                <tr>
                    <td>{{++$index}}</td>
                    <td><textarea name="title" id="" cols="30" rows="10" required>{{$item->title}}</textarea></td>
                    <td><textarea name="content" id="editor-{{$item->id}}" cols="30" rows="10" required>{{$item->content}}</textarea></td>
                    <td style="gap:10px">
                        @switch($index)
                            @case(1)
                            <a style="background-color: green" class="nam-btn" href="/dashboard/productdetail/down/{{$item->id}}">Xuống</a></td>
                                @break
                            @case(count($post_details))
                            <a style="background-color: #007bff" class="nam-btn" href="/dashboard/productdetail/up/{{$item->id}}">Lên</a> 
                                @break
                            @default
                            <a style="background-color: #007bff" class="nam-btn" href="/dashboard/productdetail/up/{{$item->id}}">Lên</a> 
                            <a style="background-color: green" class="nam-btn" href="/dashboard/productdetail/down/{{$item->id}}">Xuống</a> 
                        @endswitch
                        </td>
                        <td><a class="nam-btn" id="save-detail-btn" style="background-color: #007bff;color:white" >Lưu</a></td>
                    <td><a style="background-color:red;"  class="nam-btn" href="/dashboard/productdetail/delete/{{$item->id}}">Xóa</a></td>
                </tr>
            </form>
            <script>
                $('#editor-{{$item->id}}').summernote({
                  height: 200,
                });
              
              </script>
            @endforeach
        </tbody>
    </table>
</div>

    <div class="container">
        <h1>Danh Sách Bình Luận</h1>
        <table class="comment-table mb-5 mt-5">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Tên Người Dùng</th>
                    <th>Nội Dung Bình Luận</th>
                    <th>Hành Động</th>
                </tr>
            </thead>
            <tbody id="commentTableBody">
                @foreach ($comment as $index => $item)
                    <tr>
                        <td>{{++$index}}</td>
                        <td>{{$item->name}}</td>
                        <td>{{$item->content}}</td>
                        <td><a style="background-color:red;"  class="nam-btn" href="/dashboard/comment/delete/{{$item->id}}">Xóa</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

<script>
    document.getElementById('save-detail-btn').addEventListener('click', function() {
    document.getElementById('save-detail').submit();
});

</script>



@endsection