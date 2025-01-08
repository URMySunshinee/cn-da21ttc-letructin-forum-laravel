@extends('user.main')
@section('title', 'Trang chủ')
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

<form class="container mt-5" method="POST" action="">
  @csrf
    <!-- Email input -->
    <div data-mdb-input-init class="  form-outline mb-4">
      <input type="password" id="form2Example1" class="form-control" name="password" :value="old('password')" required autofocus autocomplete="password" />
      <label class="form-label" for="form2Example1">Mật khẩu cũ</label>
    </div>
    {{-- @if(session('success'))
    <div class="alert w-50 mt-2 alert-success">
        {{ session('success') }}
    </div>
@endif --}}
@if(session('fail'))
    <div class="alert w-50 mt-2 alert-danger">
        {{ session('fail') }}
    </div>
@endif
    <!-- Password input -->
    <div data-mdb-input-init class="form-outline mb-4">
      <input type="password" id="form2Example2" class="form-control" name="new_password" :value="old('new_password')" required autofocus autocomplete="new_password" />
      <label class="form-label" for="form2Example2">Mật khẩu mới</label>
    </div>
    Quên mật khẩu? <a class="text-danger" href="/forgotpassword1">Nhấn đây !</a>
    <button  type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-block mb-4">Lưu</button>
  </form>
@endsection
