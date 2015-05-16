@extends('layouts.admin')

@section('extra_scripts')

<script type="text/javascript" src="{{URL::to('/assets/ckeditor/ckeditor.js')}}"></script>
<script type="text/javascript" src="{{URL::to('/assets/ckfinder/ckfinder.js')}}"></script>

<script type="text/javascript">
window.onload = function() {
  var editor = CKEDITOR.replace('body1', {customConfig: "../ckeditor_config.js"});
  CKFinder.SetupCKEditor( editor, '/assets/ckfinder/' );
};

</script>

@stop

@section('content')

<!-- Place this in the body of the page content -->
<form method="post" action="{{URL::to('/admin/pages/save')}}">
	<div class="row">
		<div class="col-lg-12">
    		<textarea name="html" rows="30" id="body1">
				@if (isset($html))
					{{$html}}
				@endif
			</textarea>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12 pull-right">
			<input type="hidden" name="url" value="{{$save_url}}">
			<input type="hidden" name="id" value="@if (isset($id)) {{$id}} @endif">
			<button type="submit" class="btn btn-primary">Save</button>
		</div>
	</div>
</form>

@if (isset($errors))
<ul>
	@foreach ($errors as $error)
	<li>{{$error}}</li>
	@endforeach
</ul>
@endif

@stop
