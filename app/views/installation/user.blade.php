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
			<h2>Configure Admin User</h2>

			<form method="POST" action="{{URL::to('/installation/user_configure')}}">
				<div class="form-group">
					<label for="email">User Name</label>
					<input type="text" name="email" id="email" 
					class="form-control" />
				</div>
				<div class="form-group">
					<label for="password">Password</label>
					<input type="password" name="password" id="password" 
					class="form-control" />
				</div>
				<div class="form-group">
					<label for="password_confirmation">
					Confirm Password</label>
					<input type="password" name="password_confirmation"
					id="password_confirmation" class="form-control" />
				</div>
				<button type="submit" class="btn btn-primary">
				Next</button>
			</form>
		</div>
	</div>
	<div class="col-lg-8 col-sm-12 col-lg-offset-2">
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
