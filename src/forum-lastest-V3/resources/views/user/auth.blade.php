@extends('user.main')
@section('title', 'Đăng nhập, đăng ký')
@section('content')

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if (session('fail'))
    <div class="alert alert-danger">
        {{ session('fail') }}
    </div>
@endif

@if (session('info'))
    <div class="alert alert-info">
        {{ session('info') }}
    </div>
@endif

<style>
        .form-container {
            width: 100%;
            max-width: 400px;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .form-header {
            background-color: #007BFF;
            color: #fff;
            text-align: center;
            padding: 20px;
            font-size: 1.5rem;
        }

        .form-body {
            padding: 20px;
        }

        .form-body input {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .form-body button {
            width: 100%;
            padding: 10px;
            background-color: #007BFF;
            color: #ffffff;
            border: none;
            border-radius: 5px;
            font-size: 1rem;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .form-body button:hover {
            background-color: #0056b3;
        }

        .form-footer {
            text-align: center;
            padding: 15px;
            background-color: #f9f9f9;
        }

        .form-footer a {
            color: #007BFF;
            text-decoration: none;
        }

        .form-footer a:hover {
            text-decoration: underline;
        }
    </style>
    <div class="container d-flex justify-content-center mt-5 mb-5">
        <div class="form-container" id="loginForm">
            <div class="form-header">Đăng Nhập</div>
            <form method="POST" action="/login" class="form-body">
                @csrf
                <input name="email" type="email" placeholder="Email" required>
                <input name="password" type="password" placeholder="Mật khẩu" required>
                <button type="submit" >Đăng Nhập</button>
            </form>
            <div class="form-footer">
                Chưa có tài khoản? <a href="#" onclick="toggleForm('registerForm')">Đăng ký</a>
            </div>
            <div class="form-footer">
                Quên mật khẩu? <a href="/forgotpassword">Nhấn đây !</a>
            </div>
        </div>
    
        <div class="form-container" id="registerForm" style="display: none;">
            <div class="form-header">Đăng Ký</div>
            <form method="POST" action="/register" class="form-body">
                @csrf
                <input name="name" type="text" placeholder="Họ và Tên" required>
                <input name="email" type="email" placeholder="Email" required>
                <input name="password" type="password" minlength="8" placeholder="Mật khẩu" required>
                <input name="phone" type="text" maxlength="10" placeholder="Số điện thoại" required>
                <input name="address" type="text" placeholder="Địa chỉ" required>
                <input name="avatar" type="text" placeholder="Avatar" >
                <button type="submit">Đăng Ký</button>
            </form>
            <div class="form-footer">
                Đã có tài khoản? <a href="#" onclick="toggleForm('loginForm')">Đăng nhập</a>
            </div>
        </div>
    </div>
    <script>
        function toggleForm(formId) {
            document.getElementById('loginForm').style.display = 'none';
            document.getElementById('registerForm').style.display = 'none';
            document.getElementById(formId).style.display = 'block';
        }
    </script>
@endsection
