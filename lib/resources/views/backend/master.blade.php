<!DOCTYPE html>
<html>
<head>
<base href="{{ asset('public/layout/backend')}}/">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>@yield('title') | Thegioisua</title>
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/datepicker3.css" rel="stylesheet">
<link href="css/styles.css" rel="stylesheet">
<script type="text/javascript" src="../../editor/ckeditor/ckeditor.js"></script>
<script src="js/lumino.glyphs.js"></script>
</head>
<body>
	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<a class="navbar-brand" href="{{ asset('admin/home') }}">Thegioisua Admin</a>
				<ul class="user-menu">
					<li class="dropdown pull-right">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> {{ Auth::user()->email }} <span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							<li><a href="{{ asset('logout') }}"><svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg> Logout</a></li>
						</ul>
					</li>
				</ul>
			</div>
							
		</div><!-- /.container-fluid -->
	</nav>
		
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<ul class="nav menu">
			<li role="presentation" class="divider"></li>
			<li class="home-btn"><a href="{{ asset('admin/home') }}"><svg class="glyph stroked dashboard-dial"><use xlink:href="#stroked-dashboard-dial"></use></svg> Trang chủ</a></li>
			<li class="product-btn"><a href="{{ asset('admin/product') }}"><svg class="glyph stroked calendar"><use xlink:href="#stroked-calendar"></use></svg> Sản phẩm</a></li>
			<li class="category-btn"><a href="{{ asset('admin/category') }}"><svg class="glyph stroked line-graph"><use xlink:href="#stroked-line-graph"></use></svg> Danh mục</a></li>
			<li class="statistical-btn"><a href="{{ asset('admin/statistic') }}"><svg class="glyph stroked line-graph"><use xlink:href="#stroked-line-graph"></use></svg> Thống kê</a></li>
			<li role="presentation" class="divider"></li>
		</ul>
		
	</div><!--/.sidebar-->

    <!--/Main-->
    @yield('main')

	<script>
		let home = document.querySelector('.home-btn');
		let product = document.querySelector('.product-btn');
		let category = document.querySelector('.category-btn');
		let statistical = document.querySelector('.statistical-btn');
	
		home.addEventListener('click', function() {
			home.classList.add('active');
		});
		product.addEventListener('click', function() {
			product.classList.add('active');
		});
		category.addEventListener('click', function() {
			category.classList.add('active');
		});
		statistical.addEventListener('click', function() {
			statistical.classList.add('active');
		});
	</script>
    <script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/chart.min.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script>
		$('#calendar').datepicker({
		});

		!function ($) {
		    $(document).on("click","ul.nav li.parent > a > span.icon", function(){          
		        $(this).find('em:first').toggleClass("glyphicon-minus");      
		    }); 
		    $(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
		}(window.jQuery);

		$(window).on('resize', function () {
		  if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
		})
		$(window).on('resize', function () {
		  if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
		})
	</script>	
</body>

</html>
