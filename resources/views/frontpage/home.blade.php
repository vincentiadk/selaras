@extends('frontpage.layouts.master')
@section('content')
<style>
	.feature-list li {
		position: relative;
		padding: 5px 15px 0px 50px;
		font-size: 18px;
	}
	.spotlight.style1 .content {
		padding: 1rem 3rem 1rem 3rem;
	}
</style>
<section class="section transheader homepage parallax" data-stellar-background-ratio="0.5" style="background-image:url('{{Storage::url('upload/home3.jpg')}}');">
	<div class="container">
		<div class="row">	
			<div class="col-md-10 col-md-offset-1 col-sm-12 text-center">
				<h2>Turn Your Vision Into Performance</h2>
				<p class="lead">We create the future with you!!</p>
				<a class="btn btn-primary" href="#services">Show More</a>
			</div><!-- end col -->
		</div><!-- end row -->

	</div><!-- end container -->
</section><!-- end section -->
<section class="section nopad">
	<div class="container-fluid">
		<div class="row text-center">
			<div class="col-md-4 col-sm-6 nopad first">
				<div class="home-service c4">
					<i class="flaticon-target"></i>
					<p>STRATEGY</p>
					<p>Define your problem to us and we will give our strategy to serve you</p>
				</div><!-- end home-service -->
			</div><!-- end col -->

			<div class="col-md-4 col-sm-6 nopad">
				<div class="home-service c2">
					<i class="flaticon-handshake"></i>
					<p>EXECUTION</p>
					<p>Implement our strategy to building a powerfull system</p>
				</div><!-- end home-service -->
			</div><!-- end col -->

			<div class="col-md-4 col-sm-6 nopad">
				<div class="home-service c3">
					<i class="flaticon-presentation-1"></i>
					<p>RESULTS</p>
					<p>We are ready to present you with the best product ever</p>
				</div><!-- end home-service -->
			</div><!-- end col -->
		</div><!-- end row -->
	</div><!-- end container -->
</section><!-- end section -->
<section class="section overfree bt">
	<div class="icon-center"><i class="fa fa-anchor"></i></div>
	<div class="container">
		<div class="section-title text-center">
			<small>Welcome to the best consultant service</small>
			<h3>Outstanding Services</h3>
			<hr>
			<p class="lead">Selaras is a professional team who provide high-quality service for create the best solution for you.</p>
		</div><!-- end section-title -->
		<div class="owl-carousel owl-theme lightcasestudies withhover">
			<div class="item-carousel">
				<div class="case-box">
					<img src="{{Storage::url('upload/management-consulting.jpg')}}" alt="Management Consulting of Selaras Services" class="img-responsive lazy">
					<h4 class="text-center">Management Consulting</h4>
					<div class="magnifier">
						<a href="/service/management-consulting"><i class="fa fa-link"></i></a> 
					</div>
				</div><!-- end case-box -->
			</div><!-- end col -->

			<div class="item-carousel">
				<div class="case-box">
					<img src="{{Storage::url('upload/ITconsulting.jpeg')}}" alt="IT Consulting of Selaras Services" class="img-responsive lazy">
					<h4  class="text-center">IT Consulting</h4>
					<div class="magnifier">
						<a href="/service/it-consulting"><i class="fa fa-link"></i></a> 
					</div>
				</div><!-- end case-box -->
			</div><!-- end col -->

			<div class="item-carousel">
				<div class="case-box">
					<img src="{{Storage::url('upload/energyoptimizer.jpg')}}" alt="Management Consulting of Selaras Services" class="img-responsive lazy">
					<h4  class="text-center">Energy Optimizer</h4>
					<div class="magnifier">
						<a href="/service/energy-optimizer"><i class="fa fa-link"></i></a> 
					</div>
				</div><!-- end case-box -->
			</div><!-- end col -->

			<div class="item-carousel">
				<div class="case-box">
					<img src="{{Storage::url('upload/market-research.jpg')}}" alt="Management Consulting of Selaras Services" class="img-responsive lazy">
					<h4  class="text-center">Market Research</h4>
					<div class="magnifier">
						<a href="/service/market-research"><i class="fa fa-link"></i></a> 
					</div>
				</div><!-- end case-box -->
			</div><!-- end col -->
		</div>
		<div class="section-button clearfix text-center">
			<p class="lead">If you are looking one of our service for your company please get a quote!</p>
			<a href="#" class="btn btn-transparent">GET A QUOTE</a>
		</div><!-- end section-button -->
	</div><!-- end container -->
</section><!-- end section -->
<section class="section blue-background">
	<div class="container">
		<div class="row col-md-9">
			<div class="col-md-12">
				<h2>Why Choose <strong>Selaras</strong></h2>
			</div>
			<div class="col-md-12" style="margin-right:0px">
				<div class="feature-widget  wow fadeInLeft">
					<p><strong>Flexibility to serve you better.</strong> We employ a small core staff of senior-level consultants, and draw from our pool of subject matter experts when their expertise can help us serve you better. The result? A highly nimble, more efficient approach to giving you the services you need, when you need them.</p>
					<p><strong>Personal service from senior-level consultants.</strong>You appreciate it when deadlines are met, phone calls are returned and your challenges are given in-depth, out-of-the-box thinking. While a large firm may assign your business to junior-level people, we’re small enough to offer very personal service from senior-level consultants.</p>
					<p><strong>We care about your business.</strong>
						At Selaras Consulting we don’t just get to know your business, we take a sincere interest in it and genuinely want to help your company reach its potential. We personally invest ourselves in each and every project we work on. Our programs will provide your business with a clear road map to increase productivity, efficiency, overall communication and employee morale.
					</p>
				</div><!-- end about-widget -->	
			</div><!-- end col -->
		</div>
		<div class="row col-md-3" style="margin-left:0px" id="why-choose-us">
			<div class="feature-img">
				<img src="{{url('/temp1/images/why-choose-us.png')}}" alt="Why Choose Selaras" class="img-responsive wow fadeInLeft lazy">
			</div>
		</div><!-- end row -->
	</div><!-- end container -->
</section><!-- end section -->	
<section class="section overfree" id="services">
	<div class="container">
		<div class="section-title text-center">
			<h3>Our Philosophy</h3>
			<hr>
			<!--<p class="lead"> We create the future with you </p>-->
		</div><!-- end section-title -->

		<div class="row service-list text-center">
			<div class="col-md-4 col-sm-12 col-xs-12 first">
				<div class="service-wrapper wow fadeIn">	
					<i class="flaticon-competition"></i>
					<div class="service-details">
						<h4><a href="" title="">Our Destination</a></h4>
						<p>To be trusted partner in leadership and management development that give an outstanding results for customers.</p>
					</div>
				</div><!-- end service-wrapper -->
			</div><!-- end col -->

			<div class="col-md-4 col-sm-12 col-xs-12">
				<div class="service-wrapper wow fadeIn">	
					<i class="flaticon-content"></i>
					<div class="service-details">
						<h4><a href="" title="">Our Purpose</a></h4>
						<p>We - together with customer - build the system of our customer to turn their advantages become superior capability in their industry.</p>
					</div>
				</div><!-- end service-wrapper -->
			</div><!-- end col -->

			<div class="col-md-4 col-sm-12 col-xs-12 last">
				<div class="service-wrapper wow fadeIn">	
					<i class="flaticon-html"></i>
					<div class="service-details">
						<h4><a href="" title="">Our Driven</a></h4>
						<p>We Create the Future with You with your compliments</p>
					</div>
				</div><!-- end service-wrapper -->
			</div><!-- end col -->
		</div><!-- end row -->
	</div>
	<!-- end container -->
</section><!-- end section -->

<section class="section lb nopad spotlight style1">
	<div class="image col-md-4 hidden-sm hidden-xs">
		<img src="{{Storage::url('upload/future.jpg')}}" alt="" class="lazy" />
	</div>
	<div class="content">
		<h2>We create the future with you!!</h2>
		<div class="feature-list">
			<ul>
				<li>We Assess Your Current Performance.</li>
				<li>We Create Your Strategy with You.</li>
				<li>We Map Your Strategy & Performance.</li>
				<li>We Align Your Strategy with Your People & Performance.</li>
				<li>We Integrate Performance</li>
				<li>We Review & Assess Performance</li>
				<li>We Develop Your System and Your People</li>
			</ul>
		</div>
		<a href="/page/about" class="btn btn-info">Learn More</a>
	</div>
</section>


<section class="section bt">
	<div class="container">
		<div class="section-title text-center">
			<h3>Our Happy Client</h3>
		</div><!-- end section-title -->

		<div class="owl-carousel owl-theme lightcasestudies withhover">
			<div class="item-carousel">
				<div class="case-box">
					<img src="{{Storage::url('client/indoprima-1.png')}}" alt="Indo Prima Group" class="img-responsive lazy">
					<div class="magnifier">
						<a href="case-studies-single.html"><i class="fa fa-link"></i></a> 
					</div>
				</div><!-- end case-box -->
			</div><!-- end col -->

			<div class="item-carousel">
				<div class="case-box">
					<img src="{{Storage::url('client/dirgaputraekapratama.png')}}" alt="PT. Dirgaputra Ekapratama" class="img-responsive lazy">
					<div class="magnifier">
						<a href="case-studies-single.html"><i class="fa fa-link"></i></a> 
					</div>
				</div><!-- end case-box -->
			</div><!-- end col -->

			<div class="item-carousel">
				<div class="case-box">
					<img src="{{Storage::url('client/Kompindo.png')}}" alt="PT. Kompindo Wiratama" class="img-responsive lazy">
					<div class="magnifier">
						<a href="case-studies-single.html"><i class="fa fa-link"></i></a> 
					</div>
				</div><!-- end case-box -->
			</div><!-- end col -->

			<div class="item-carousel">
				<div class="case-box">
					<img src="{{Storage::url('client/rekayasaindustri.png')}}" alt="PT. Rekayasa Industri" class="img-responsive lazy">
					<div class="magnifier">
						<a href="case-studies-single.html"><i class="fa fa-link"></i></a> 
					</div>
				</div><!-- end case-box -->
			</div><!-- end col -->

			<div class="item-carousel">
				<div class="case-box">
					<img src="{{Storage::url('client/perpusnas.png')}}" alt="Perpustakaan Nasional RI" class="img-responsive lazy">
					<div class="magnifier">
						<a href="case-studies-single.html"><i class="fa fa-link"></i></a> 
					</div>
				</div><!-- end case-box -->
			</div><!-- end col -->
		</div>
	</div>
</section>
<!-- end section -->
@endsection

@section('script')
<script type='text/javascript'>
	$(document).ready(function(){
	});

</script>
@endsection