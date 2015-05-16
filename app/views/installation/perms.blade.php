@extends('layouts.admin_layout')

@section('main_content')

<div class="row">
	<div class="col-lg-12">
		<h1>
			<span class="glyphicon glyphicon-cog" aria-hidden="true">
			</span>
			<strong class="text-uppercase">Configuration</strong>
		</h1>
	</div>
</div>

<div class="row">
	<div class="col-lg-8 col-sm-12 col-lg-offset-2">
		<div class="well text-center">
			<h2>File System Permissions</h2>

			@if (isset($errors))
			<p>To run the application, web server needs to read/write on the locations mentioned below. So provide the appropriate permissions to the web server.</p>

			<table class="table text-left">
				<tr>
					<th>Location</th>
					<th>Permission</th>
				</tr>
				@foreach ($errors as $key=>$value)
				<tr>
					<td>{{$value[0]}}</td>
					<td>{{$value[1]}}</td>
				</tr>
				@endforeach
			</table>
			@endif
		</div>
	</div>
</div>

@stop
