@extends('layouts.admin')

@section('extra_scripts')

<script type="text/javascript" src="{{URL::to('/assets/ckeditor/ckeditor.js')}}"></script>
<script type="text/javascript" src="{{URL::to('/assets/ckfinder/ckfinder.js')}}"></script>

<script type="text/javascript">
window.onload = function() {
  var editor = CKEDITOR.replace('body1', {customConfig: "../ckeditor_config.js"});
  CKFinder.SetupCKEditor( editor, '/assets/ckfinder/');
  
};

</script>

@stop

@section('content')

<div class="row text-center">
	<div class="col-lg-12">
		@if (isset($section->display_name))
		<h2>{{$section->display_name}}</h2>
		@endif
	</div>
</div>

<div class="row text-center">
	<div class="col-lg-12">
		@if (isset($section->description))
		<h2>{{$section->description}}</h2>
		@endif
	</div>
</div>

<div class="row">
	<div class="col-lg-12">
		<form method="post" action="{{URL::to('/admin/section/'.$menu_id.'/save')}}">
			<div class="row">
				<div class="col-lg-12">
					<textarea name="html" rows="15" id="body1">
						@if (isset($section))
							{{$section->html}}
						@endif
					</textarea>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12">
					<input type="hidden" name="menu_id" value="@if (isset($menu_id)) {{$menu_id}} @endif">
					<input type="hidden" name="id" value="@if (isset($id)) {{$id}} @endif">
					<button type="submit" class="btn btn-default">Submit</button>
				</div>
			</div>
		</form>
	</div>
</div>

<div class="row">
	<div class="col-lg-12">
		@if (isset($errors))
		<ul>
			@foreach ($errors as $error)
			<li>{{$error}}</li>
			@endforeach
		</ul>
		@endif
	</div>
</div>

@stop
