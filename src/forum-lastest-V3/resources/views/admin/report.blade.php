@extends('admin.main')
@section('title', 'Báo cáo thống kê')
@section('content')
<style>
    .main-content {
        margin-left: 250px; 
        padding: 20px;
    }
    .table-custom {
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }
    .table-custom th {
        background-color: #0d6efd;
        color: white;
        text-align: center;
    }
    .table-custom td {
        text-align: center;
        vertical-align: middle;
    }
    .table-custom tbody tr:hover {
        background-color: #f9f9f9;
    }
    .stat-cards {
        display: flex;
        gap: 20px;
        margin-bottom: 20px;
        justify-content: space-between;
    }
    .stat-card {
        flex: 1;
        padding: 15px;
        border-radius: 10px;
        color: white;
        text-align: center;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }
    .stat-card h5 {
        margin-bottom: 5px;
        font-size: 1rem;
    }
    .stat-card p {
        font-size: 1.5rem;
        font-weight: bold;
    }
    .bg-primary { background-color: #0d6efd; }
    .bg-danger { background-color: #dc3545; }
    .bg-success { background-color: #198754; }
    .bg-warning { background-color: #ffc107; color: #212529; }
</style>

<div class="main-content mt-5">
    <div class="container mt-5">
        <h2 class="mb-4 text-center">Thống kê trang web</h2>

        <!-- Thẻ thống kê nhanh -->
        <div class="stat-cards">
            <div class="stat-card bg-primary">
                <h5>Người dùng hoạt động</h5>
                <p>{{ count($user_active) }}</p>
            </div>
            <div class="stat-card bg-danger">
                <h5>Người dùng bị khóa</h5>
                <p>{{ count($user_unactive) }}</p>
            </div>
            <div class="stat-card bg-success">
                <h5>Bài viết được phê duyệt</h5>
                <p>{{ count($post_accepted) }}</p>
            </div>
            <div class="stat-card bg-warning">
                <h5>Bài viết chưa phê duyệt</h5>
                <p>{{ count($post_unaccepted) }}</p>
            </div>
        </div>

        <!-- Bảng chi tiết -->
        <table class="table table-bordered table-striped table-custom">
            <thead>
                <tr>
                    <th>Tên dữ liệu</th>
                    <th>Giá trị</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Người dùng hoạt động</td>
                    <td>{{ count($user_active) }}</td>
                </tr>
                <tr>
                    <td>Người dùng bị khóa</td>
                    <td>{{ count($user_unactive) }}</td>
                </tr>
                <tr>
                    <td>Bài viết được phê duyệt</td>
                    <td>{{ count($post_accepted) }}</td>
                </tr>
                <tr>
                    <td>Bài viết chưa phê duyệt</td>
                    <td>{{ count($post_unaccepted) }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection
