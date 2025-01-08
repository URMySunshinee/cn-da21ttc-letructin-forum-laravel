@extends('user.main')
@section('title', 'Chi tiết')
@section('content')
<style>
.profile-container {
    width: 100%;
    max-width: 600px;
    margin: 30px auto;
    background: #fff;
    border-radius: 10px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    overflow: hidden;
}

.profile-header {
    text-align: center;
    padding: 20px;
    background: #007bff;
    color: #fff;
}

.profile-avatar {
    width: 100px;
    height: 100px;
    border-radius: 50%;
    margin-bottom: 10px;
    object-fit: cover;
    border: 3px solid #fff;
}

.profile-name {
    margin: 0;
    font-size: 1.8rem;
    font-weight: bold;
}

.profile-title {
    margin: 5px 0;
    font-size: 1.2rem;
    font-style: italic;
}

.profile-content {
    padding: 20px;
}

.profile-content h2 {
    margin-top: 0;
    color: #007bff;
}

.profile-content p {
    margin: 5px 0;
}

.profile-content ul {
    list-style-type: square;
    margin: 10px 0 0 20px;
    padding: 0;
}

.social-link {
    text-decoration: none;
    color: #007bff;
}

.social-link:hover {
    text-decoration: underline;
}

</style>
<form class="form-body" action="/profile" method="post">
    @csrf
    <div class="profile-container">
        <div class="profile-header">
            <img src="{{Auth::user()->avatar}}" alt="Avatar" class="profile-avatar">
            <h1 class="profile-name"><input type="text" name="name" value="{{Auth::user()->name}}" required></h1>
        </div>
        <div class="profile-content">
            <h2>Thông Tin Cá Nhân</h2>
            <p><strong>Email:</strong> <input type="text" name="email" value="{{Auth::user()->email}}" required> </p>
            <p><strong>Số điện thoại:</strong> <input type="text" name="phone" value="{{Auth::user()->phone}}" required></p>
            <p><strong>Địa chỉ:</strong> <input type="text" name="address" value="{{Auth::user()->address}}" required></p>
            <p><strong>Link ảnh avatar:</strong> <input type="text" name="avatar" value="{{Auth::user()->avatar}}" required></p>
            <p><button type="submit" class="btn btn-primary mt-5">Lưu</button></p>
        </div>
    </div>
</form>
@endsection
