<!DOCTYPE html>
<html>
<head>
	<base href="{{ asset('public/layout/frontend') }}/"
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<title>Thế giới sữa - @yield('title')</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/home.css">
	<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.6/umd/popper.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script type="text/javascript">
		$(function() {
			var pull        = $('#pull');
			menu        = $('nav ul');
			menuHeight  = menu.height();

			$(pull).on('click', function(e) {
				e.preventDefault();
				menu.slideToggle();
			});
		});

		$(window).resize(function(){
			var w = $(window).width();
			if(w > 320 && menu.is(':hidden')) {
				menu.removeAttr('style');
			}
		});
	</script>
    <style>
        .logout-btn {
            position: absolute;
            right: 107px;
            top: 15px;
            font-size: 17px;
            color: aliceblue;
        }
        .logout-btn  a{
            font-size: 17px;
            color: aliceblue;
            text-decoration: none;
        }
    </style>
</head>
<body>
	<!-- header -->
	<header id="header">
		<div class="container">
			<div style="flex-wrap: unset !important;" class="row">
                <div class="logout-btn">
					<i class="fa fa-arrow-right"></i>
                    <a href="{{ asset('logout') }}">Đăng xuất</a></li>
                </div>
				<div id="logo" class="col-md-3 col-sm-12 col-xs-12">
					<h1>
						<a style="text-decoration: none" href="{{ asset('/homepage') }}">Thế giới sữa</a>
						<nav><a id="pull" class="btn btn-danger" href="#">
							<i class="fa fa-bars"></i>
						</a></nav>
					</h1>
				</div>
				<div id="search" class="col-md-6 col-sm-12 col-xs-12">
					<form action="{{ asset('search/')}}" method="get">
						<input type="text" name="result" placeholder="Nhập tên sản phẩm ...">
						<input type="submit" name="submit" value="Tìm Kiếm">
					</form>
				</div>
				<div id="cart" class="col-md-2 col-sm-12 col-xs-12">
					<a class="display" href="{{ asset('cart/show') }}">Giỏ hàng</a>
					<a href="{{ asset('cart/show') }}">{{ Cart::count() }}</a>
				</div>
			</div>
		</div>
	</header><!-- /header -->
	<!-- endheader -->

	<!-- main -->
	<section id="body">
		<div class="container">
			<div class="row">
				<div id="sidebar" class="col-md-3">
					<nav id="menu">
						<ul>
							<li class="menu-item">Danh mục sản phẩm</li>
							@foreach($categories as $category)
							<li class="menu-item"><a style="text-decoration: none;" href="{{ asset('category/' . $category->cate_id) }}">{{ $category->cate_name }}</a></li>
							@endforeach
						</ul>
						<!-- <a href="#" id="pull">Danh mục</a> -->
					</nav>

					<div id="banner-l" class="text-center">
						<div class="banner-l-item">
							<img src="img/home/qc1.jpg" alt="" class="img-thumbnail">
						</div>
						<div class="banner-l-item">
							<img src="img/home/qc2.jpg" alt="" class="img-thumbnail">
						</div>
						<div class="banner-l-item">
							<img src="img/home/qc3.jpg" alt="" class="img-thumbnail">
						</div>
						<div class="banner-l-item">
							<img src="img/home/qc4.jpg" alt="" class="img-thumbnail">
						</div>
						<div class="banner-l-item">
							<img src="img/home/qc5.jpg" alt="" class="img-thumbnail">
						</div>
						<div class="banner-l-item">
							<img src="img/home/slide2.jpg" alt="" class="img-thumbnail">
						</div>
						<div class="banner-l-item">
							<img src="img/home/slide3.jpg" alt="" class="img-thumbnail">
						</div>
						<div class="banner-l-item">
							<img src="img/home/slide4.jpg" alt="" class="img-thumbnail">
						</div>
						<div class="banner-l-item">
							<img src="img/home/slide5.jpg" alt="" class="img-thumbnail">
						</div>
					</div>
				</div>

				<div id="main" class="col-md-9">
					<!-- main -->
					<!-- phan slide la cac hieu ung chuyen dong su dung jquey -->
					<div id="slider">
						<div id="demo" class="carousel slide" data-ride="carousel">

							<!-- Indicators -->
							<ul class="carousel-indicators">
								<li data-target="#demo" data-slide-to="0" class="active"></li>
								<li data-target="#demo" data-slide-to="1"></li>
								<li data-target="#demo" data-slide-to="2"></li>
							</ul>

							<!-- The slideshow -->
							<div class="carousel-inner">
								<div class="carousel-item active">
									<img src="img/home/slide2.jpg" alt="Chicago">
								</div>
								<div class="carousel-item">
									<img src="img/home/slide3.jpg" alt="New York" >
								</div>
								<div class="carousel-item">
									<img src="img/home/slide4.jpg" alt="New York" >
								</div>
								<div class="carousel-item">
									<img src="img/home/slide5.jpg" alt="New York" >
								</div>
							</div>

							<!-- Left and right controls -->
							<a class="carousel-control-prev" href="#demo" data-slide="prev">
								<span class="carousel-control-prev-icon"></span>
							</a>
							<a class="carousel-control-next" href="#demo" data-slide="next">
								<span class="carousel-control-next-icon"></span>
							</a>
						</div>
					</div>

					<div id="banner-t" class="text-center">
						<div class="row">
							<div class="banner-t-item col-md-6 col-sm-12 col-xs-12">
								<img src="img/home/underslide1.jpg" alt="" class="img-thumbnail">
							</div>
							<div class="banner-t-item col-md-6 col-sm-12 col-xs-12">
								<img src="img/home/underslide2.jpg" alt="" class="img-thumbnail">
							</div>
						</div>
					</div>

                    @yield('main')

                    </div>
                </div>
            </div>
        </section>
        <!-- endmain -->

        <!-- footer -->
        <footer id="footer">
            <div id="footer-t">
                <div class="container">
                    <div class="row">
                        <div id="logo-f" class="col-md-3 col-sm-12 col-xs-12 text-center">
                            <a style="text-decoration: none; font-size: 30px;" href="{{ asset('/homepage') }}">Thế giới sữa</a>
                        </div>
                        <div id="about" class="col-md-3 col-sm-12 col-xs-12">
                            <h3>Về chúng tôi</h3>
                            <p class="text-justify">Thegioisua thành lập năm 2023. Chúng tôi là nhà cung cấp các sản phẩm về sữa hàng đầu Việt Nam cũng như trên toàn thế giới.</p>
                        </div>
                        <div id="hotline" class="col-md-3 col-sm-12 col-xs-12">
                            <h3>Liên hệ</h3>
                            <p>Phone1: (+84) 628332948</p>
                            <p>Phone2: (+84) 973927635</p>
                            <p>Email: thainguyen@gmail.com</p>
                        </div>
                        <div id="contact" class="col-md-3 col-sm-12 col-xs-12">
                            <h3>Địa chỉ</h3>
                            <p>Địa chỉ 1: Số 102 Phố Thái Thịnh - Đống Đa- Hà Nội</p>
                            <p>Địa chỉ 2: Số 29 Phố Định Công - Hoàng Mai - Hà Nội</p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- endfooter -->
    </body>
    </html>
