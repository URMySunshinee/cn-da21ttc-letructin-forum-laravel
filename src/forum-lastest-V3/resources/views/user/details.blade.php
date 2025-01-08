@extends('user.main')
@section('title', 'Chi tiết')
@section('content')
<style>
    #like-dislike-container {
    display: flex;
    gap: 10px;
    margin: 20px 0;
}

#like-dislike-container button {
    padding: 10px 20px;
    font-size: 16px;
    border: 1px solid #ccc;
    border-radius: 5px;
    cursor: pointer;
    background-color: rgb(67, 65, 64);
    transition: background-color 0.3s ease;
}

#like-dislike-container button:hover {
    background-color: blue;
}


#like-count, #dislike-count {
    font-weight: bold;
    margin-left: 5px;
}

</style>
        <!-- About US Start -->
        <div class="about-area">
            <div class="container">
                    <!-- Hot Aimated News Tittle-->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="trending-tittle">
                                <h1>{{$get_post_by_id->namePost}}</h1>
                                
                                <!-- <p>Rem ipsum dolor sit amet, consectetur adipisicing elit.</p> -->
                            </div>
                                <p>Ngày đăng: {{$get_post_by_id->datePost}}</p>
                                <p>Tác giả: {{$get_post_by_id->name}}</p>
                                <p>Thể loại: {{$get_post_by_id->nameCategory}}</p>
                        </div>
                    </div>
                   <div class="row">
                        <div class="col-lg-8">
                            <!-- Trending Tittle -->
                            <div class="about-right mb-90">
                                <div class="about-img">
                                    <img src="{{$get_post_by_id->mainImage}}" alt="">
                                </div>
                                @foreach ($get_post_detail as $index => $item)
                                    @if ($index==0)
                                    <div class="section-tittle mb-30 pt-30">
                                        <h3>{{$item->title}}</h3>
                                    </div>
                                    <div class="about-prea">
                                        <p class="about-pera1 mb-25">
                                            {!! $item->content !!}</p>
                                    </div> 
                                    @else
                                    <div class="section-tittle ">
                                        <h3>{{$item->title}}</h3>
                                    </div>
                                    <div class="about-prea">
                                        <p class="about-pera1 mb-25">
                                            {!! $item->content !!}</p>
                                    </div> 
                                    @endif
                                @endforeach
                                <div class="social-share pt-30">
                                    <div class="section-tittle">
                                        <h3 class="mr-20">Share:</h3>
                                        <ul>
                                            <li><a href="#"><img src="assets/img/news/icon-ins.png" alt=""></a></li>
                                            <li><a href="#"><img src="assets/img/news/icon-fb.png" alt=""></a></li>
                                            <li><a href="#"><img src="assets/img/news/icon-tw.png" alt=""></a></li>
                                            <li><a href="#"><img src="assets/img/news/icon-yo.png" alt=""></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- From -->
                            <div class="container mt-5 mb-5">
                                <h3 class="mb-4">Danh sách bình luận</h3>
                                <ul class="list-group">
                                    @if (isset($all_comment) && count($all_comment)>0)
                                        @foreach ($all_comment as $item)
                                        <li class="list-group-item mt-4" style="border-radius:10px">
                                            <div class="d-flex justify-content-between">
                                                <div>
                                                    <img style="width: 50px;height: 50px;border-radius: 50%; /* Làm ảnh thành hình tròn */object-fit: cover;" src="{{$item->avatar}}" alt="" srcset="">
                                                    <h5 class="mb-1">{{$item->name}}</h5>
                                                    <p class="mb-1">{{$item->content}}</p>
                                                    <a style="width:200px;height:50px"   class="button button-contactForm boxed-btn " onclick="toggleReply({{$item->id}})">Trả lời</a>
                                                    <form id="reply-form-{{$item->id}}" class="reply-form mt-3 " action="/comment/{{$get_post_by_id->id}}" method="POST" style="display: none;">
                                                        @csrf
                                                        <textarea class="form-control mb-2" rows="2" name="content" placeholder="Nhập trả lời..."></textarea>
                                                        <input type="number" value="{{$item->id}}" name="comment_id" required hidden>
                                                        <button style="width:200px;height:50px" type="submit" class="button button-contactForm boxed-btn">Gửi</button>
                                                    </form>
                                                    <ul class="list-group mt-3">
                                                        @if (isset($all_reply) && count($all_reply) > 0)
                                                            @foreach ($all_reply as $reply)
                                                            @if ($reply->comment_id==$item->id)
                                                            <li class="list-group-item">
                                                                <div class="d-flex justify-content-between">
                                                                    <div>
                                                                        <img style="width: 25px;height: 25px;border-radius: 50%; object-fit: cover;" src="{{$reply->avatar}}" alt="" srcset="">
                                                                        <h6 class="mb-1">{{$reply->name}}</h6>
                                                                        <p class="mb-1">{{$reply->content}}</p>
                                                                    </div>
                                                                    <div class="comment-right">
                                                                        @if(Auth::check())
                                                                        @if (Auth::user()->id==$reply->user_id)
                                                                    <small class="text-muted">{{$reply->dateComment}}</small>
                                                                    <br>
                                                                    <br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                            <a style="color: red" href="/comment/delete/{{$reply->id}}">Xóa bình luận</a>
                                                                        @endif
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            @endif
                                                            @endforeach
                                                        @else
                                                            <li class="list-group-item">
                                                                <p class="mb-1 text-muted">Chưa có trả lời nào.</p>
                                                            </li>
                                                        @endif
                                                    </ul>
                                                </div>
                                                <div class="comment-right">
                                                    @if(Auth::check())
                                                    @if (Auth::user()->id==$item->user_id)
                                                <small class="text-muted">{{$item->dateComment}}</small>
                                                <br>
                                                <br>
                                                        <a style="color: red" href="/comment/delete/{{$item->id}}">Xóa bình luận</a>
                                                    @endif
                                                    @endif
                                                </div>
                                            </div>
                                        </li>
                                        @endforeach
                                    @else
                                        <h5 style="color: red">Hãy là người đầu tiên đánh giá !</h5>
                                    @endif
                                </ul>
                            </div>
                            
                            <script>
                                function toggleReply(commentId) {
                                    const replyForm = document.getElementById(`reply-form-${commentId}`);
                                    if (replyForm.style.display === 'none') {
                                        replyForm.style.display = 'block';
                                    } else {
                                        replyForm.style.display = 'none';
                                    }
                                }
                            </script>
                            
                            <div class="row">
                                <div class="col-lg-8">
                                    <form class="form-contact contact_form mb-80" action="/comment/{{$get_post_by_id->id}}" method="post">
                                        @csrf
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <textarea class="form-control w-100 error" name="content" id="message" cols="30" rows="9" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Message'" placeholder="Enter Message" required></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group mt-3">
                                            @if(Auth::check())
                                            <button type="submit" class="button button-contactForm boxed-btn">Send</button>
                                            @else
                                            <a href="/auth" class="button button-contactForm boxed-btn">Đăng nhập để bình luận</a>
                                            @endif
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <!-- Section Tittle -->
                            <div class="section-tittle mb-40">
                                <h3>Follow Us</h3>
                            </div>
                            <!-- Flow Socail -->
                            <div class="single-follow mb-45">
                                <h6>Bài viết này đã có {{$get_post_by_id->viewPost}} lượt xem</h6>
                                <div id="like-dislike-container">
                                    @if (Auth::check())
                                    @if ($isReact)
                                        @if ($isReact->type==0)
                                        <a ><button style="background-color: rgb(15, 15, 142)"  id="like-btn">👍 Like <span id="like-count">{{$get_post_by_id->likePost}}</span></button></a>
                                        <a href="/detail/dislike/{{$get_post_by_id->id}}"><button id="dislike-btn">👎 Dislike <span id="dislike-count">{{$get_post_by_id->dislikePost}}</span></button></a>
                                        @endif
                                        @if ($isReact->type==1)
                                        <a href="/detail/like/{{$get_post_by_id->id}}"><button  id="like-btn">👍 Like <span id="like-count">{{$get_post_by_id->likePost}}</span></button></a>
                                        <a ><button style="background-color: rgb(15, 15, 142)" id="dislike-btn">👎 Dislike <span id="dislike-count">{{$get_post_by_id->dislikePost}}</span></button></a>
                                        @endif
                                    @else
                                    <a href="/detail/like/{{$get_post_by_id->id}}"><button  id="like-btn">👍 Like <span id="like-count">{{$get_post_by_id->likePost}}</span></button></a>
                                    <a href="/detail/dislike/{{$get_post_by_id->id}}"><button id="dislike-btn">👎 Dislike <span id="dislike-count">{{$get_post_by_id->dislikePost}}</span></button></a>
                                    @endif
                                    @else
                                    <a><button disabled id="like-btn">👍 Like <span id="like-count">{{$get_post_by_id->likePost}}</span></button></a>
                                    <a><button disabled id="dislike-btn">👎 Dislike <span id="dislike-count">{{$get_post_by_id->dislikePost}}</span></button></a>
                                    @endif
                                    
                                </div>
                                <div class="single-box">
                                    <div class="follow-us d-flex align-items-center">
                                        <div class="follow-social">
                                            <a href="#"><img src="assets/img/news/icon-fb.png" alt=""></a>
                                        </div>
                                        <div class="follow-count">  
                                            <span>8,045</span>
                                            <p>Fans</p>
                                        </div>
                                    </div> 
                                    <div class="follow-us d-flex align-items-center">
                                        <div class="follow-social">
                                            <a href="#"><img src="assets/img/news/icon-tw.png" alt=""></a>
                                        </div>
                                        <div class="follow-count">
                                            <span>8,045</span>
                                            <p>Fans</p>
                                        </div>
                                    </div>
                                        <div class="follow-us d-flex align-items-center">
                                        <div class="follow-social">
                                            <a href="#"><img src="assets/img/news/icon-ins.png" alt=""></a>
                                        </div>
                                        <div class="follow-count">
                                            <span>8,045</span>
                                            <p>Fans</p>
                                        </div>
                                    </div>
                                    <div class="follow-us d-flex align-items-center">
                                        <div class="follow-social">
                                            <a href="#"><img src="assets/img/news/icon-yo.png" alt=""></a>
                                        </div>
                                        <div class="follow-count">
                                            <span>8,045</span>
                                            <p>Fans</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- New Poster -->
                            <div class="news-poster d-none d-lg-block">
                                <img src="assets/img/news/news_card.jpg" alt="">
                            </div>
                        </div>
                   </div>
            </div>
        </div>
        <!-- About US End -->
  @endsection
