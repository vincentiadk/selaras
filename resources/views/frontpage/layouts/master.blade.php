<!doctype html>
<!--[if IE 9]> <html class="no-js ie9 fixed-layout" lang="en"> <![endif]-->
<!--[if gt IE 9]><!--> <html class="no-js " lang="en"> <!--<![endif]-->
<head>

	<!-- Basic -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<!-- Mobile Meta -->
	<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

	<!-- Site Meta -->
	{!! SEOMeta::generate() !!}
	{!! OpenGraph::generate() !!}
	<meta name="keywords" content="">
	<meta name="description" content="">
	<meta name="author" content="">

	<!-- Site Icons -->
	<link rel="shortcut icon" href="{{url('/temp1/images/favicon2.ico')}}" type="image/x-icon" />
	<link rel="apple-touch-icon" href="{{url('/temp1/images/apple-touch-icon2.png')}}">
	<!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,600,700" rel="stylesheet"> 
	<link href="https://fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">

	<!-- Custom & Default Styles -->
	<link rel="stylesheet" href="{{url('/temp1/css/font-awesome.min.css')}}">
	<link rel="stylesheet" href="{{url('/temp1/css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{url('/temp1/css/animate.css')}}">
	<link rel="stylesheet" href="{{url('/temp1/css/carousel.css')}}">
	<link rel="stylesheet" href="{{url('/temp1/css/style.css')}}">

	<!--[if lt IE 9]>
		<script src="js/vendor/html5shiv.min.js"></script>
		<script src="js/vendor/respond.min.js"></script>
	<![endif]-->

</head>
<body>
	<div id="wrapper">
		<div class="topbar">
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-sm-6 hidden-xs">
						<nav class="topbar-menu">
							<ul class="list-inline">
								<li>Follow us: </li>
								<li><a href="#"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
								<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
							</ul><!-- end list -->
						</nav><!-- end menu -->
					</div><!-- end col -->

					<div class="col-md-6 col-sm-6">
						<nav class="topbar-menu">
							<ul class="list-inline text-right navbar-right">
								<li class="hidden-xs"><i class="fa fa-clock-o"></i> 08:00 - 17:00</li>
								<li><i class="fa fa-phone"></i> +62 813 2131 1453</li>
							</ul><!-- end list -->
						</nav><!-- end menu -->
					</div><!-- end col -->
				</div><!-- end row -->
			</div><!-- end container -->
		</div><!-- end topbar -->
		@include('frontpage.layouts.header')
		@include('partials.message')
		@yield('content')

		@include('frontpage.layouts.footer')
	</div><!-- end wrapper -->

	<!-- jQuery Files -->
	<script src="{{url('/temp1/js/jquery.min.js')}}"></script>
	<script src="{{url('/temp1/js/bootstrap.min.js')}}"></script>
	<script src="{{url('/temp1/js/parallax.js')}}"></script>
	<script src="{{url('/temp1/js/animate.js')}}"></script>
	<script src="{{url('/temp1/js/owl.carousel.js')}}"></script>
	<script src="{{url('/temp1/js/custom.js')}}"></script>
	@yield('script')
</body>
</html>