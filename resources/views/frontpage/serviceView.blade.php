@extends('frontpage.layouts.master')
@section('content')
<section class="section bt">
    <div class="container">
        <div class="section-title text-center">
            <h3>{{$data['service']->service_category->name }}</h3>
            <h4>{{$data['service']['title']}} </h4>
        </div>
    </div>
</section>
<section class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                {!!$data['service']['body']!!}
            </div>
        </div>
    </div>
</section>
@endsection