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
    <div data-mdb-input-init class="  form-outline mb-4">
      <input type="email" id="form2Example1" class="form-control" name="email" :value="old('email')" required autofocus autocomplete="email" />
      <label class="form-label" for="form2Example1">Địa chỉ email đã đăng ký</label>
    </div>
    <button  type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-block mb-4">Gửi Mã</button>
  </form>
@endsection
