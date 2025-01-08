
@extends('admin.main')
@section('title', 'Bài viết')
@section('content')
<style>
    .table-custom {
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }
    .table-custom th {
        background-color: #007bff;
        color: white;
        text-align: center;
    }
    .table-custom td {
        text-align: center;
    }
    </style>
    <!-- Main Content -->
    <div class="main-content mt-5">
        <div class="container mt-5">
            <h2 class="mb-4">Quản lý bài viết</h2>
        
            <!-- Tabs -->
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="tab-0-tab" data-bs-toggle="tab" data-bs-target="#tab-0" type="button" role="tab" aria-controls="tab-0" aria-selected="true">
                            Được phê duyệt
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="tab-1-tab" data-bs-toggle="tab" data-bs-target="#tab-1" type="button" role="tab" aria-controls="tab-1" aria-selected="false">
                            Chờ phê duyệt
                        </button>
                    </li>
            </ul>
        
            <!-- Tab Content -->
            <div class="tab-content mt-4" id="myTabContent">
                <!-- Tab 1 -->
            @for ($i = 0; $i <= 1; $i++)
                @if ($i==0)
                <div class="tab-pane fade show active" id="tab-{{$i}}" role="tabpanel" aria-labelledby="tab-{{$i}}-tab">
                    <h4>Được phê duyệt</h4>
                        @csrf
                    <table class="table table-bordered table-striped table-custom">
                        <thead>
                            <tr>
                                <th>Ảnh bài viết</th>
                                <th>Tên bài viết</th>
                                <th>Mô tả</th>
                                <th>Danh mục</th>
                                <th>Tác giả</th>
                                <th>Lượt xem</th>
                                <th>Lượt like</th>
                                <th>Lượt dislike</th>
                                <th>Xem bài viết</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($all_news as $item1)
                            @if ($item1->isAccepted==$i)
                            <tr>
                                <td><img width="20%" src="{{$item1->mainImage}}" alt=""></td>
                                <td>{{$item1->namePost}}</td>
                                <td>{{$item1->descriptionPost}}</td>
                                <td>{{$item1->nameCategory}}</td>
                                <td>{{$item1->name}}</td>
                                <td>{{$item1->viewPost}}</td>
                                <td>{{$item1->likePost}}</td>
                                <td>{{$item1->dislikePost}}</td>
                                <td><a href="/admin/post/{{$item1->id}}">Xem</a></td>
                                <td><a href="/admin/post/unaccepted/{{$item1->id}}">Bỏ phê duyệt</a></td>
                            </tr>
                            @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @else
                <div class="tab-pane fade show" id="tab-{{$i}}" role="tabpanel" aria-labelledby="tab-{{$i}}-tab">
                    <h4>Chưa phê duyệt</h4>
                        @csrf
                    <table class="table table-bordered table-striped table-custom">
                        <thead>
                            <tr>
                                <th>Ảnh bài viết</th>
                                <th>Tên bài viết</th>
                                <th>Mô tả</th>
                                <th>Danh mục</th>
                                <th>Tác giả</th>
                                <th>Lượt xem</th>
                                <th>Lượt like</th>
                                <th>Lượt dislike</th>
                                <th>Xem bài viết</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($all_news as $item1)
                            @if ($item1->isAccepted==$i)
                            <tr>
                                <td><img width="20%" src="{{$item1->mainImage}}" alt=""></td>
                                <td>{{$item1->namePost}}</td>
                                <td>{{$item1->descriptionPost}}</td>
                                <td>{{$item1->nameCategory}}</td>
                                <td>{{$item1->name}}</td>
                                <td>{{$item1->viewPost}}</td>
                                <td>{{$item1->likePost}}</td>
                                <td>{{$item1->dislikePost}}</td>
                                <td><a href="/admin/post/{{$item1->id}}">Xem</a></td>
                                <td><a href="/admin/post/accepted/{{$item1->id}}">Phê duyệt</a></td>
                            </tr>
                            @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @endif
@endfor
            </div>
        </div>
    </div>
    @endsection
  
