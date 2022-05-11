@extends('frontpage.layouts.master')
@section('content')
<section class="section bt">
	<div class="container">
		<div class="section-title text-center">
			<h3>{{$data['category']['name']}} </h3>
		</div>
	</div>
</section>
{!!$data['category']['body']!!}

@if($data['category']->services()->count() > 0)
<section class="section bt" id="services">
	<div class="container">
		<div class="section-title text-center">
			<h4>Our {{$data['category']['name']}} Services </h4>
			<hr>
			<p class="lead">{{$data['category']['brief_description']}}</p>
		</div><!-- end section-title -->
		@if($data['category']->services->count() > 0)
		<div class="row custom-features">
			@foreach($data['category']->services as $service)
			<div class="col-md-4">
				<a href="/service/{{$data['category']->slug}}/{{$service->slug}}">
					<div class="feature-seo">
						<h4>{{$service->title}}</h4>
						<p>{!!$service->description!!}</p>
					</div><!-- end feature-seo -->
				</a>
			</div><!-- end col -->
			@endforeach
		</div><!-- end row -->
		@endif
	</div><!-- end container -->
</section><!-- end section -->
@endif
@endsection