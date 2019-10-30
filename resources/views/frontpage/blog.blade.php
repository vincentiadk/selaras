@extends('frontpage.layouts.master')
@section('content')
<section class="section transheader parallax" data-stellar-background-ratio="0.5" style="background-image:url('/storage/upload/blog.jpg'); background-size:cover">
	<div class="container" style="background-color: rgba(000,000,000,0.4);">
		<div class="row">	
			<div class="col-md-10 col-md-offset-1 col-sm-12 text-center">
				<h2>Blog & News</h2>
				<p class="lead">Latest news and activities of Selaras Consulting</p>
			</div><!-- end col -->
		</div><!-- end row -->
	</div><!-- end container -->
</section><!-- end section -->

<section class="section">
	<div class="container">
		<div class="row">
			<div class="content col-md-9">
				@foreach($data['blogs'] as $blog)
				<div class="blog-box clearfix row">
					<div class="media-box col-md-4">
						<a href="/blog/{{$blog->slug}}" title="{{$blog->title}}"><img src="/storage/upload/{{$blog->id}}.jpg" alt="{{$blog->title}}" class="img-responsive img-thumbnail lazy"></a>
					</div><!-- end media-box -->
					<div class="blog-desc col-md-8">
						<div class="blog-meta">
							<ul class="list-inline">
								<li><a href="/blog/category/{{$blog->category->slug}}"><i class="fa fa-folder-open-o"></i> {{$blog->category->name}}</a></li>
								<!--<li><a href="#"><i class="fa fa-comments-o"></i> 21 Comments</a></li>-->
							</ul>
						</div><!-- end meta -->
						<h3><a href="/blog/{{$blog->slug}}" title="{{$blog->title}}">{{$blog->title}}</a></h3>
						<p>{{$blog->abstract}}</p>
						<a class="readmore" href="/blog/{{$blog->slug}}">Read more</a>
					</div><!-- end blog-desc -->
				</div><!-- end blogbox -->
				@endforeach
				

				<div class="pagination-wrapper row">
					{{$data['blogs']->links()}}
					<!--ul class="pagination col-md-12">
						<li><a href="#">1</a></li>
						<li class="active"><a href="#">2</a></li>
						<li><a href="#">3</a></li>
						<li><a href="#">4</a></li>
						<li><a href="#">5</a></li>
					</ul-->
				</div><!-- ne dpagi -->
			</div><!-- end content -->

			<div class="sidebar col-md-3 col-sm-3">
				<div class="widget clearfix">
					<h4 class="widget-title">Subscribe</h4>
					<div class="newsletter-widget">
						<p>You can opt out of our newsletters at any time. See our privacy policy.</p>
						<form class="form-inline" role="search">
							<div class="form-1">
								<input type="text" class="form-control" placeholder="Enter email here..">
								<button type="submit" class="btn btn-primary"><i class="fa fa-envelope-o"></i></button>
							</div>
						</form>
					</div><!-- end newsletter -->
				</div><!-- end widget -->

				<div class="widget clearfix">
					<h4 class="widget-title">ADVERTISING</h4>
					<div class="category-widget">
						<img src="images/banner.gif" alt="" class="img-responsive img-thumbnail lazy">
					</div><!-- end category -->
				</div><!-- end widget -->

				<div class="widget clearfix">
					<h4 class="widget-title">Blog Categories</h4>
					<div class="category-widget">
						<ul>
							@foreach($data['blogcategories'] as $cat)
							<li><a href="/blog/category/{{$cat->slug}}">{{$cat->name}}</a></li>
							@endforeach
						</ul>
					</div><!-- end category -->
				</div><!-- end widget -->
			</div><!-- end col -->
		</div><!-- end row -->
	</div><!-- end container -->
</section><!-- end section -->

<section class="section ldp">
	<div class="container">
		<div class="row text-center">
			<div class="col-md-2 col-sm-2 col-xs-6">
				<div class="client-box">
					<a href="#"><img src="upload/client_01.png" alt="" class="img-responsive lazy"></a>
				</div>
			</div><!-- end col -->
			<div class="col-md-2 col-sm-2 col-xs-6">
				<div class="client-box">
					<a href="#"><img src="upload/client_02.png" alt="" class="img-responsive lazy"></a>
				</div>
			</div><!-- end col -->
			<div class="col-md-2 col-sm-2 col-xs-6">
				<div class="client-box">
					<a href="#"><img src="upload/client_03.png" alt="" class="img-responsive lazy"></a>
				</div>
			</div><!-- end col -->	
			<div class="col-md-2 col-sm-2 col-xs-6">
				<div class="client-box">
					<a href="#"><img src="upload/client_04.png" alt="" class="img-responsive lazy"></a>
				</div>
			</div><!-- end col -->
			<div class="col-md-2 col-sm-2 col-xs-6">
				<div class="client-box">
					<a href="#"><img src="upload/client_05.png" alt="" class="img-responsive lazy"></a>
				</div>
			</div><!-- end col -->
			<div class="col-md-2 col-sm-2 col-xs-6">
				<div class="client-box">
					<a href="#"><img src="upload/client_06.png" alt="" class="img-responsive lazy"></a>
				</div>
			</div><!-- end col -->	
		</div><!-- end row -->
	</div><!-- end container -->
</section><!-- end section -->
@endsection