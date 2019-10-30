@if (Session::has('errors'))
<div class="alert alert-danger alert-dismissible "" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
    <ul class="list-unstyled">
        @foreach (Session::get('errors')->all() as $error)
        <li>{!! $error !!}</li>
        @endforeach
    </ul>
</div>
@endif
@if (Session::has('error'))
<div class="alert alert-danger alert-dismissible "" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span></button>
    {!!Session::get('error')!!}
</div>
@endif
@if (!empty($errorMsg))
<div class="alert alert-danger alert-dismissible "" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
    {!!$errorMsg!!}
</div>
@endif

@if ($warning=Session::has('warning') || $warning = !empty($warningMsg))
<div class="alert alert-warning alert-dismissible "" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button> 
    @if($warning==1)
    {!!Session::get('warning')!!}
    @else
    {!!$warning!!}
    @endif
</div>
@endif


@if ($info=Session::get('info') || $info = !empty($infoMsg))
<div class="alert alert-info alert-dismissible "" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
    @if($info==1)
    {!!Session::get('info')!!}
    @else
    {!!$info!!}
    @endif
</div>
@endif


@if ($success = Session::get('success') || $success= !empty($successMsg))
<div class="alert alert-success alert-dismissible "" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
    @if($success==1)
    {!!Session::get('success')!!}
    @else
    {!!$success!!}
    @endif
</div>
@endif