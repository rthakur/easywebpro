@extends('layouts.main')

@section('extra_scripts')

<script src="{{URL::to('/assets/js/home/home.js')}}"></script>

@if (isset($skin_path))
<link rel="stylesheet" type="text/css" href="{{URL::to($skin_path)}}" />
@endif

@stop

@section('content')

<section>
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				@if (isset($html))
				{{$html}}
				@endif
			</div>
		</div>
	</div>
</section>

@stop
