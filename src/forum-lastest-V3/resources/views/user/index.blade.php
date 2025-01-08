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

<div class="trending-area fix">
    <div class="container">
        <div class="trending-main">
            <!-- Trending Tittle -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="trending-tittle">
                        <strong>Bài viết xu hướng</strong>
                        <!-- <p>Rem ipsum dolor sit amet, consectetur adipisicing elit.</p> -->
                        <div class="trending-animated">
                            <ul id="js-news" class="js-hidden">
                                <ul>
                                    <li class="news-item">Khám phá những giải pháp công nghệ đột phá từ Bangladesh, nơi khởi nguồn của sự đổi mới!</li>
                                    <li class="news-item">Spondon IT – Đồng hành cùng bạn trên hành trình chinh phục đỉnh cao công nghệ!</li>
                                    <li class="news-item">Rem Ipsum – Gắn kết công nghệ và cuộc sống, tạo nên những giá trị vượt thời gian!</li>
                                </ul>
                            </ul>
                        </div>
                        
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8">
                    <!-- Trending Top -->
                    <div class="trending-top mb-30">
                        <div class="trend-top-img">
                            <img src="{{ $top_9_news_trending[0]->mainImage }}" alt="">
                            <div class="trend-top-cap">
                                <span>{{ $top_9_news_trending[0]->nameCategory }}</span>
                                <h2><a href="/detail/{{ $top_9_news_trending[0]->id }}">{{ $top_9_news_trending[0]->namePost }}<br> {{ $top_9_news_trending[0]->descriptionPost }}</a></h2>
                            <h6 style="color: white">{{ $top_9_news_trending[0]->viewPost }} lượt xem</a></h6>
                            </div>
                        </div>
                    </div>
                    <!-- Trending Bottom -->
                    <div class="trending-bottom">
                        <div class="row">
                            @for ($i = 1; $i <= 3; $i++)
                            <div class="col-lg-4">
                                <div class="single-bottom mb-35">
                                    <div class="trend-bottom-img mb-30">
                                        <img src="{{ $top_9_news_trending[$i]->mainImage }}" alt="">
                                    </div>
                                    <div class="trend-bottom-cap">
                                        <span class="color1">{{ $top_9_news_trending[$i]->nameCategory }}</span>
                                        <h4><a href="/detail/{{ $top_9_news_trending[$i]->id }}">{{ $top_9_news_trending[$i]->namePost }}</a></h4>
                                        <h6>{{ $top_9_news_trending[$i]->viewPost }} lượt xem</a></h6>
                                    </div>
                                </div>
                                </div>
                            @endfor
                        </div>
                    </div>
                </div>
                <!-- Riht content -->
                <div class="col-lg-4">
                    @for ($i = 4; $i <= 8; $i++)
                    <div class="trand-right-single d-flex">
                        <div class="trand-right-img">
                            <img width="100px" src="{{ $top_9_news_trending[$i]->mainImage }}" alt="">
                        </div>
                        <div class="trand-right-cap">
                            <span class="color1">{{ $top_9_news_trending[$i]->nameCategory }}</span>
                            <h4><a href="/detail/{{ $top_9_news_trending[$i]->id }}">{{ $top_9_news_trending[$i]->namePost }}</a></h4>
                            <h6>{{ $top_9_news_trending[$i]->viewPost }} lượt xem</a></h6>
                        </div>
                    </div>
                    @endfor
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Trending Area End -->
<!--   Weekly-News start -->
<div class="weekly-news-area pt-50">
    <div class="container">
       <div class="weekly-wrapper">
            <!-- section Tittle -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-tittle mb-30">
                        <h3>Bài viết nhiều lượt thích nhất tuần</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="weekly-news-active dot-style d-flex dot-style">
                        @foreach ($top_4_news_most_like as $item)
                        <div class="weekly-single">
                            <div class="weekly-img">
                                <img src="{{ $item->mainImage }}" alt="">
                            </div>
                            <div class="weekly-caption">
                                <span class="color1">{{ $item->nameCategory }}</span>
                                <h4><a href="/detail/{{ $item->id }}">{{ $item->namePost }}</a></h4>
                                <h6>{{ $item->likePost }} lượt thích</a></h6>
                            </div>
                        </div> 
                        @endforeach
                    </div>
                </div>
            </div>
       </div>
    </div>
</div>           
<!-- End Weekly-News -->
<!-- Whats New Start -->
<section class="whats-news-area pt-50 pb-20">
    <div class="container">
        <div class="row">
        <div class="col-lg-8">
            <div class="row d-flex justify-content-between">
                <div class="col-lg-3 col-md-3">
                    <div class="section-tittle mb-30">
                        <h3>Có tin gì mới !</h3>
                    </div>
                </div>
                <div class="col-lg-9 col-md-9">
                    <div class="properties__button">
                        <!--Nav Button  -->                                            
                        <nav>                                                                     
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                @foreach ($categories as $index => $item)
                                    @if ($index==0)
                                    <a class="nav-item nav-link active" id="nav-{{$item->id}}-tab" data-toggle="tab" href="#nav-{{$item->id}}" role="tab" aria-controls="nav-{{$item->id}}" aria-selected="true">{{$item->nameCategory}}</a>
                                    @else
                                    <a class="nav-item nav-link" id="nav-{{$item->id}}-tab" data-toggle="tab" href="#nav-{{$item->id}}" role="tab" aria-controls="nav-{{$item->id}}" aria-selected="false">{{$item->nameCategory}}</a>
                                    @endif
                                @endforeach
                            </div>
                        </nav>
                        <!--End Nav Button  -->
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <!-- Nav Card -->
                    <div class="tab-content" id="nav-tabContent">
                        @foreach ($categories as $index => $item)
                        @if ($index==0)
                        <div class="tab-pane fade show active" id="nav-{{$item->id}}" role="tabpanel" aria-labelledby="nav-{{$item->id}}-tab">           
                            <div class="whats-news-caption">
                                <div class="row">
                                    @foreach ($top_4_news_recent_by_category as $item1)
                                        @if ($item1->category_id==$item->id)
                                        <div class="col-lg-6 col-md-6">
                                            <div class="single-what-news mb-100">
                                                <div class="what-img">
                                                    <img src="{{ $item1->mainImage}}" alt="">
                                                </div>
                                                <div class="what-cap">
                                                    <span class="color1">{{ $item1->nameCategory}}</span>
                                                    <h4><a href="/detail/{{ $item1->id}}">{{ $item1->namePost}}</a></h4>
                                                    <h6>{{ $item1->likePost }} lượt thích</a></h6>
                                                </div>
                                            </div>
                                        </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        @else
                        <div class="tab-pane fade show " id="nav-{{$item->id}}" role="tabpanel" aria-labelledby="nav-{{$item->id}}-tab">           
                            <div class="whats-news-caption">
                                <div class="row">
                                    @foreach ($top_4_news_recent_by_category as $item1)
                                        @if ($item1->category_id==$item->id)
                                        <div class="col-lg-6 col-md-6">
                                            <div class="single-what-news mb-100">
                                                <div class="what-img">
                                                    <img src="{{ $item1->mainImage}}" alt="">
                                                </div>
                                                <div class="what-cap">
                                                    <span class="color1">{{ $item1->nameCategory}}</span>
                                                    <h4><a href="/detail/{{ $item1->id}}">{{ $item1->namePost}}</a></h4>
                                                    <h6>{{ $item1->likePost }} lượt thích</a></h6>
                                                </div>
                                            </div>
                                        </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                         @endif
                        @endforeach
                    </div>
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
                <div class="single-box">
                    <div class="follow-us d-flex align-items-center">
                        <div class="follow-social">
                            <a href="#"><img src="{{ asset('assets/img/news/icon-fb.png')}}" alt=""></a>
                        </div>
                        <div class="follow-count">  
                            <span>8,045</span>
                            <p>Fans</p>
                        </div>
                    </div> 
                    <div class="follow-us d-flex align-items-center">
                        <div class="follow-social">
                            <a href="#"><img src="{{ asset('assets/img/news/icon-tw.png')}}" alt=""></a>
                        </div>
                        <div class="follow-count">
                            <span>8,045</span>
                            <p>Fans</p>
                        </div>
                    </div>
                        <div class="follow-us d-flex align-items-center">
                        <div class="follow-social">
                            <a href="#"><img src="{{ asset('assets/img/news/icon-ins.png')}}" alt=""></a>
                        </div>
                        <div class="follow-count">
                            <span>8,045</span>
                            <p>Fans</p>
                        </div>
                    </div>
                    <div class="follow-us d-flex align-items-center">
                        <div class="follow-social">
                            <a href="#"><img src="{{ asset('assets/img/news/icon-yo.png')}}" alt=""></a>
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
                <img src="{{ asset('assets/img/news/news_card.jpg')}}" alt="">
            </div>
        </div>
        </div>
    </div>
</section>
<!-- Whats New End -->
@endsection
   