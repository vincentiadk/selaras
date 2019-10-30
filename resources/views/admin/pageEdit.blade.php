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
			<h2>Page Detail</h2>
			<div class="clearfix"></div>
		</div>
		<div class="x_content">
			@include('admin.layouts.alerts')
			<form method="post" action='/admin/service/submit/{{$id}}' data-parsley-validate id="demo-form">
				{{csrf_field()}}
				<div class="row form-group">
					<label class="control-label col-md-2 col-sm-2 ">Page Title</label>
					<div class="col-md-10 col-sm-10 ">
						<input type="text" placeholder="Page title" name="title" class="form-control" required value="{{$model->title}}">
					</div>
				</div>
			
				<div class="row form-group">
					<label class="control-label col-md-2 col-sm-2 ">Content</label>
					<div class="col-md-10 col-sm-10 ">
						<textarea class="resizable_textarea form-control" name="body">{{$model->body}}</textarea>
					</div>
				</div>
				<div class="form-group row">
					<div class="col-md-9 col-sm-9  offset-md-3">
						<input type="submit" class="btn btn-success" value= "Save" name="savepub"/>
						<button class="btn btn-info" onclick="window.open('/admin/page','_self')">Go To List Pages</button>
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