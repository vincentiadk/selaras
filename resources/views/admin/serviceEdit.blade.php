@extends('admin.layouts.master')
@section('content')
@php 
if($model->id == ""){
$id = "new";
}  else {
$id = $model->id;
}
@endphp
<div class="col-md-12 col-sm-12 ">
	<div class="x_panel">
		<div class="x_title">
			<h2>Service Detail</h2>
			<div class="clearfix"></div>
		</div>
		<div class="x_content">
			@include('admin.layouts.alerts')
			<form method="post" action='/admin/service/submit/{{$id}}' data-parsley-validate id="demo-form">
				{{csrf_field()}}
				<div class="row form-group">
					<label class="control-label col-md-2 col-sm-2 ">Service Title</label>
					<div class="col-md-10 col-sm-10 ">
						<input type="text" placeholder="Category name" name="title" class="form-control" required value="{{$model->title}}">
					</div>
				</div>
				
				<div class="row form-group">
					<label class="control-label col-md-2 col-sm-2 ">Description</label>
					<div class="col-md-10 col-sm-10 ">
						<textarea class="resizable_textarea form-control" name="description">{{$model->brief_description}}</textarea>
					</div>
				</div>
				<div class="row form-group">
					<label class="control-label col-md-2 col-sm-2 ">Content</label>
					<div class="col-md-10 col-sm-10 ">
						<textarea class="resizable_textarea form-control" name="body">{{$model->body}}</textarea>
					</div>
				</div>
				<div class="form-group row">
					<label class="control-label col-md-2 col-sm-2 ">Service Category</label>
					<div class="col-md-5 col-sm-5 ">
						<select class="select2_single form-control" tabindex="-1" name="category_id">
							<option></option>
							@foreach($serviceCat as $cat)

							<option value="{{$cat->id}}" @if($cat->id == $model->service_category_id) selected @endif>{{$cat->name}}</option>
							@endforeach
						</select>
					</div>
				</div>
				<div class="form-group row">
					<div class="col-md-9 col-sm-9  offset-md-3">
						<input type="submit" class="btn btn-success" value= "Save" name="savepub"/>
						<button class="btn btn-info" onclick="window.open('/admin/service','_self')">Go To List Services</button>
					</div>
				</div>

			</form>
		</div>
	</div>
</div>
@endsection
@section('script')
<script src="{{ asset('/tempadmin/assets/jquery.tagsinput/src/jquery.tagsinput.js') }}"></script>
<!-- Switchery -->
<script src="{{ asset('/tempadmin/assets/switchery/dist/switchery.min.js') }}"></script>
<!-- Select2 -->
<script src="{{ asset('/tempadmin/assets/select2/dist/js/select2.full.min.js') }}"></script>
<!-- Parsley -->
<script src="{{ asset('/tempadmin/assets/parsleyjs/dist/parsley.min.js') }}"></script>
<!-- Autosize -->
<script src="{{ asset('/tempadmin/assets/autosize/dist/autosize.min.js') }}"></script>
<!-- jQuery autocomplete -->
<script src="{{ asset('/tempadmin/assets/devbridge-autocomplete/dist/jquery.autocomplete.min.js') }}"></script>
@endsection