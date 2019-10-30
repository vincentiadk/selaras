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
			<h2>User Detail</h2>
			<div class="clearfix"></div>
		</div>
		<div class="x_content">
			@include('admin.layouts.alerts')
			<form method="post" action='/admin/user/submit/{{$id}}' data-parsley-validate id="demo-form">
				{{csrf_field()}}
				<div class="row form-group">
					<label class="control-label col-md-3 col-sm-3 ">Username</label>
					<div class="col-md-9 col-sm-9 ">
						<input type="text" placeholder="username" name="username" class="form-control" required>
					</div>
				</div>
				<div class="row form-group">
					<label class="control-label col-md-3 col-sm-3 ">Full Name</label>
					<div class="col-md-9 col-sm-9 ">
						<input type="text" placeholder="Full name" name="name" class="form-control" required>
					</div>
				</div>
				<div class="row form-group">
					<label class="control-label col-md-3 col-sm-3 ">Email</label>
					<div class="col-md-9 col-sm-9 ">
						<input type="email" placeholder="Email" name="email" class="form-control" required>
					</div>
				</div>
				<div class="row form-group">
					<label class="control-label col-md-3 col-sm-3 ">Password (*)</label>
					<div class="col-md-9 col-sm-9 ">
						<input type="password" placeholder="password" name="password" class="form-control">
					</div>
				</div>
				<div class="row form-group">
					<label class="control-label col-md-3 col-sm-3 ">Password Confirmation (**)</label>
					<div class="col-md-9 col-sm-9 ">
						<input type="password" placeholder="Password confirmation" name="passwordconfirm" class="form-control">
					</div>
				</div>
				<div class="row form-group">
					<label class="control-label col-md-3 col-sm-3 ">Biografi</label>
					<div class="col-md-9 col-sm-9 ">
						<textarea class="resizable_textarea form-control" placeholder="Explain yourself here" name="bio"></textarea>
					</div>
				</div>

				<div class="form-group row">
					<div class="col-md-9 col-sm-9  offset-md-3">
						<input type="submit" class="btn btn-success" value= "Save" name="savepub"/>
						<button class="btn btn-info" onclick="window.open('/admin/user','_self')">Go To List User</button>
					</div>
				</div>

			</form>
			* Jika user baru tidak isi password, maka password default = username <br>
			* Jika user lama ingin ganti password, password wajib diisi <br>
			** Diisi untuk konfirmasi password bagi user lama<br>
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