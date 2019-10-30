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
			<h2>Blog Post</h2>
			<div class="clearfix"></div>
		</div>
		<div class="x_content">
			@include('admin.layouts.alerts')
			<form method="post" action='/admin/blog/submit/{{$id}}'>
				{{csrf_field()}}
				<div class="row form-group">
					<label class="control-label col-md-2 col-sm-2 ">Title</label>
					<div class="col-md-10 col-sm-10 ">
						<textarea class="resizable_textarea form-control" placeholder="Title" name="title">{{$model->title}}</textarea>
					</div>
				</div>
				<div class="form-group row">
					<label class="control-label col-md-2 col-sm-2 ">Blog Category</label>
					<div class="col-md-5 col-sm-5 ">
						<select class="select2_single form-control" tabindex="-1" name="blog_category_id">
							<option></option>
							@foreach($blogCat as $cat)

							<option value="{{$cat->id}}" @if($cat->id == $model->blog_category_id) selected @endif>{{$cat->name}}</option>
							@endforeach
						</select>
					</div>
				</div>
				<div class="clearfix"></div>

				<div class="btn-toolbar editor" data-role="editor-toolbar" data-target="#editor-one">
					<div class="btn-group">
						<a class="btn dropdown-toggle" data-toggle="dropdown" title="Font"><i class="fa fa-font"></i><b class="caret"></b></a>
						<ul class="dropdown-menu">
						</ul>
					</div>

					<div class="btn-group">
						<a class="btn dropdown-toggle" data-toggle="dropdown" title="Font Size"><i class="fa fa-text-height"></i>&nbsp;<b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li>
								<a data-edit="fontSize 5">
									<p style="font-size:17px">Huge</p>
								</a>
							</li>
							<li>
								<a data-edit="fontSize 3">
									<p style="font-size:14px">Normal</p>
								</a>
							</li>
							<li>
								<a data-edit="fontSize 1">
									<p style="font-size:11px">Small</p>
								</a>
							</li>
						</ul>
					</div>

					<div class="btn-group">
						<a class="btn" data-edit="bold" title="Bold (Ctrl/Cmd+B)"><i class="fa fa-bold"></i></a>
						<a class="btn" data-edit="italic" title="Italic (Ctrl/Cmd+I)"><i class="fa fa-italic"></i></a>
						<a class="btn" data-edit="strikethrough" title="Strikethrough"><i class="fa fa-strikethrough"></i></a>
						<a class="btn" data-edit="underline" title="Underline (Ctrl/Cmd+U)"><i class="fa fa-underline"></i></a>
					</div>

					<div class="btn-group">
						<a class="btn" data-edit="insertunorderedlist" title="Bullet list"><i class="fa fa-list-ul"></i></a>
						<a class="btn" data-edit="insertorderedlist" title="Number list"><i class="fa fa-list-ol"></i></a>
						<a class="btn" data-edit="outdent" title="Reduce indent (Shift+Tab)"><i class="fa fa-dedent"></i></a>
						<a class="btn" data-edit="indent" title="Indent (Tab)"><i class="fa fa-indent"></i></a>
					</div>

					<div class="btn-group">
						<a class="btn" data-edit="justifyleft" title="Align Left (Ctrl/Cmd+L)"><i class="fa fa-align-left"></i></a>
						<a class="btn" data-edit="justifycenter" title="Center (Ctrl/Cmd+E)"><i class="fa fa-align-center"></i></a>
						<a class="btn" data-edit="justifyright" title="Align Right (Ctrl/Cmd+R)"><i class="fa fa-align-right"></i></a>
						<a class="btn" data-edit="justifyfull" title="Justify (Ctrl/Cmd+J)"><i class="fa fa-align-justify"></i></a>
					</div>

					<div class="btn-group">
						<a class="btn dropdown-toggle" data-toggle="dropdown" title="Hyperlink"><i class="fa fa-link"></i></a>
						<div class="dropdown-menu input-append">
							<input class="span2" placeholder="URL" type="text" data-edit="createLink" />
							<button class="btn" type="button">Add</button>
						</div>
						<a class="btn" data-edit="unlink" title="Remove Hyperlink"><i class="fa fa-cut"></i></a>
					</div>

					<div class="btn-group">
						<a class="btn" title="Insert picture (or just drag & drop)" id="pictureBtn"><i class="fa fa-picture-o"></i></a>
						<input type="file" data-role="magic-overlay" data-target="#pictureBtn" data-edit="insertImage" />
					</div>

					<div class="btn-group">
						<a class="btn" data-edit="undo" title="Undo (Ctrl/Cmd+Z)"><i class="fa fa-undo"></i></a>
						<a class="btn" data-edit="redo" title="Redo (Ctrl/Cmd+Y)"><i class="fa fa-repeat"></i></a>
					</div>
				</div>

				<div id="editor-one" class="editor-wrapper"></div>

				<textarea name="body" id="body" style="display:none;">{{$model->body}}</textarea>

				<br />

				<div class="ln_solid"></div>

				<div class="row form-group">
					<label class="control-label col-md-3 col-sm-3 ">Abstract</label>
					<div class="col-md-9 col-sm-9 ">
						<textarea class="resizable_textarea form-control" placeholder="This text area automatically resizes its height as you fill in more text courtesy of autosize-master it out..." name="abstract">{{$model->abstract}}</textarea>
					</div>
				</div>

				<div class="clearfix"></div>
				<div class="row form-group">
					<label class="control-label col-md-3 col-sm-3 ">Tags</label>
					<div class="col-md-9 col-sm-9 ">
						<input id="tags_1" type="text" class="tags form-control" value="{{$model->tags}}" name="tags" />
						<div id="suggestions-container" style="position: relative; float: left; width: 250px; margin: 10px;"></div>
					</div>
				</div>

				<div class="form-group row">
					<div class="col-md-9 col-sm-9  offset-md-3">
						<input type="submit" class="btn btn-primary" value="Save as Draft" name="savedraft"/>
						<input type="submit" class="btn btn-success" value= "Save and Publish" name="savepub"/>
						<a class="btn btn-info" href='/admin/blog' target='_self'>Go To List Blog Posts</a>
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
	$('#editor-one').html($('#body').text());
	$('input[type="submit"]').click(function() {
		$('#body').val($('#editor-one').cleanHtml());
	});
</script>
@endsection