
@extends('user.main')
@section('title', 'Danh mục')
@section('content')   <!-- Whats New Start -->
    <section class="whats-news-area pt-50 pb-20">
        <div class="container">
            <div class="row">
            <div class="col-lg-8">
                <div class="row d-flex justify-content-between">
                    <div class="col-lg-3 col-md-3">
                        <div class="section-tittle mb-30">
                            <h3>Danh mục</h3>
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
                                        @foreach ($all_news as $item1)
                                            @if ($item1->category_id==$item->id)
                                            <div class="col-lg-6 col-md-6">
                                                <div class="single-what-news mb-100">
                                                    <div class="what-img">
                                                        <img src="{{ $item1->mainImage}}" alt="">
                                                    </div>
                                                    <div class="what-cap">
                                                        <span class="color1">{{ $item1->nameCategory}}</span>
                                                        <h4><a href="/detail/{{ $item1->id}}">{{ $item1->namePost}}</a></h4>
                                                        <h6 style="color: red">{{ $item1->likePost }} lượt thích</a></h6>
                                                        <h6 style="color: red">{{ $item1->viewPost }} lượt xem</a></h6>
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
                                        @foreach ($all_news as $item1)
                                            @if ($item1->category_id==$item->id)
                                            <div class="col-lg-6 col-md-6">
                                                <div class="single-what-news mb-100">
                                                    <div class="what-img">
                                                        <img src="{{ $item1->mainImage}}" alt="">
                                                    </div>
                                                    <div class="what-cap">
                                                        <span class="color1">{{ $item1->nameCategory}}</span>
                                                        <h4><a href="/detail/{{ $item1->id}}">{{ $item1->namePost}}</a></h4>
                                                        <h6 style="color: red">{{ $item1->likePost }} lượt thích</a></h6>
                                                        <h6 style="color: red">{{ $item1->viewPost }} lượt xem</a></h6>
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
    </section>
    <!-- Whats New End -->
    
  @endsection  
  