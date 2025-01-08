<header>
    <!-- Header Start -->
   <div class="header-area">
        <div class="main-header ">
            <div class="header-top black-bg d-none d-md-block">
               <div class="container">
                   <div class="col-xl-12">
                        <div class="row d-flex justify-content-between align-items-center">
                            <div class="header-info-left">
                                <ul>     
                                    <li><img src="{{ asset('assets/img/icon/header_icon1.png')}}" alt="">{{ date("Y-m-d");}}</li>
                                </ul>
                            </div>
                            <div class="header-info-right">
                                <ul class="header-social">    
                                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                   <li> <a href="#"><i class="fab fa-pinterest-p"></i></a></li>
                                </ul>
                            </div>
                        </div>
                   </div>
               </div>
            </div>
            <div class="header-mid d-none d-md-block">
               <div class="container">
                    <div class="row d-flex align-items-center">
                        <!-- Logo -->
                        <div class="col-xl-3 col-lg-3 col-md-3">
                            <div class="logo">
                                <a href="/"><img src="{{ asset('assets/img/logo/logo.png')}}" alt=""></a>
                            </div>
                        </div>
                        <div class="col-xl-9 col-lg-9 col-md-9">
                            <div class="header-banner f-right ">
                                <img src="{{ asset('assets/img/hero/header_card.jpg')}}" alt="">
                            </div>
                        </div>
                    </div>
               </div>
            </div>
           <div class="header-bottom header-sticky">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-xl-8 col-lg-10 col-md-12 header-flex">
                            <!-- sticky -->
                                <div class="sticky-logo">
                                    <a href="/"><img src="{{ asset('assets/img/logo/logo.png')}}" alt=""></a>
                                </div>
                            <!-- Main-menu -->
                            <div class="main-menu d-none d-md-block">
                                <nav style="display: flex; align-items:center">                  
                                    <ul id="navigation" style="margin-right: 200px ">    
                                        <li><a href="/">Trang chủ</a></li>
                                        <li><a href="/category">Danh mục</a></li>
                                        <li><a href="/about">Giới thiệu</a></li>
                                    </ul>
                                    <div class="header-right-btn f-right d-none d-lg-block">
                                        <i id="search-btn" class="fas fa-search special-tag"></i>
                                        <div class="search-box">
                                            <form id="search-form" action="/search" method="POST">
                                                @csrf
                                                <input type="text" placeholder="Search" name="searchText" required>
                                            </form>
                                        </div>
                                    </div>
                                </nav>
                            </div>
                        </div>             
                        <div class="col-xl-4 col-lg-2 col-md-4">
                            <div class="main-menu d-none d-md-block">
                                <nav>                  
                                    <ul id="navigation">    
                                        @if(Auth::check())
                                        <li><a >Xin chào: {{Auth::user()->name}}</a>
                                            <ul class="submenu">
                                                <li><a href="/profile">Cập nhật thông tin</a></li>
                                                <li><a href="/dashboard">Trang quản trị</a></li>
                                                <li><a href="/changepass">Đổi mật khẩu</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="/logout">Đăng xuất</a></li>
                                        @else
                                        <li><a href="/auth">Đăng nhập</a></li>
                                        @endif
                                       
                                    </ul>
                                </nav>
                            </div>
                            
                        </div>
                        <!-- Mobile Menu -->
                        <div class="col-12">
                            <div class="mobile_menu d-block d-md-none"></div>
                        </div>
                    </div>
                </div>
           </div>
        </div>
   </div>
    <!-- Header End -->
</header>
<script>
    document.getElementById('search-btn').addEventListener('click', function() {
    document.getElementById('search-form').submit();
});

</script>