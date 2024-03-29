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
			<h2>Blog Category</h2>
			<div class="clearfix"></div>
		</div>
		<div class="x_content">
			@include('admin.layouts.alerts')
			<form method="post" action='/admin/blog-categories/submit/{{$id}}' data-parsley-validate id="demo-form">
				{{csrf_field()}}
				<div class="row form-group">
					<label class="control-label col-md-2 col-sm-2 ">Category Name</label>
					<div class="col-md-10 col-sm-10 ">
						<input type="text" placeholder="Category name" name="name" class="form-control" required>
					</div>
				</div>
				
				<div class="row form-group">
					<label class="control-label col-md-2 col-sm-2 ">Description</label>
					<div class="col-md-10 col-sm-10 ">
						<textarea class="resizable_textarea form-control" placeholder="Describe blog category here. This text area automatically resizes its height as you fill in more text courtesy of autosize-master it out..." name="description"></textarea>
					</div>
				</div>

				<div class="form-group row">
					<div class="col-md-9 col-sm-9  offset-md-3">
						<input type="submit" class="btn btn-success" value= "Save" name="savepub"/>
						<button class="btn btn-info" onclick="window.open('/admin/blog-categories','_self')">Go To List Blog Categories</button>
					</div>
				</div>

			</form>
		</div>
	</div>
</div>
@endsection
@section('script')

<script src="{{ asset('/tempadmin/assets/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js') }}""></script>
<script src="{{ asset('/tempadmin/assets/jquery.hotkeys/jquery.hotkeys.js') }}""></script>
<script src="{{ asset('/tempadmin/assets/google-code-prettify/src/prettify.js') }}""></script>
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
<!-- starrr -->
<script src="{{ asset('/tempadmin/assets/starrr/dist/starrr.js') }}"></script>
<script src="/tempadmin/js/custom.min.js"></script>
<script>
	$('input[type="submit"]').click(function() {
		$('#body').val($('#editor-one').cleanHtml());
	});
</script>
@endsection