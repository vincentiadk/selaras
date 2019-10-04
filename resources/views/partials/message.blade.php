@if (Session::has('errors'))
<div class="alert alert-danger" role="alert">
    <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
    <ul class="list-unstyled">
        @foreach (Session::get('errors')->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
@if (Session::has('error'))
<div class="alert alert-danger" role="alert">
    <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
    {{Session::get('error')}}
</div>
@endif
@if (!empty($errorMsg))
<div class="alert alert-danger" role="alert">
    <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
    {{$errorMsg}}
</div>
@endif

@if ($warning=Session::has('warning') || $warning = !empty($warningMsg))
<div class="alert alert-warning" role="alert">
    <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button> 
    @if($warning==1)
    {{Session::get('warning')}}
    @else
    {{$warning}}
    @endif
</div>
@endif


@if ($info=Session::get('info') || $info = !empty($infoMsg))
<div class="alert alert-info" role="alert">
    <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
    @if($info==1)
    {{Session::get('info')}}
    @else
    {{$info}}
    @endif
</div>
@endif


@if ($success = Session::get('success') || $success= !empty($successMsg))
<div class="alert alert-success" role="alert">
    <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
    @if($success==1)
    {{Session::get('success')}}
    @else
    {{$success}}
    @endif
</div>
@endif