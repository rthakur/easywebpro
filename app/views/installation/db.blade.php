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
			<h2>Configure Database</h2>

			<form method="POST" action="{{URL::to('/installation/db_configure')}}">
				<div class="form-group">
					<label for="db_name">Database Name</label>
					<input type="text" name="db_name" id="db_name" 
					class="form-control" />
				</div>
				<div class="form-group">
					<label for="db_user">Database User</label>
					<input type="text" name="db_user" id="db_user" 
					class="form-control" />
				</div>
				<div class="form-group">
					<label for="db_name">Database Password</label>
					<input type="password" name="db_password"
					id="db_password" class="form-control" />
				</div>
				<div class="form-group">
					<label for="db_host">Host</label>
					<input type="text" name="db_host" id="db_host" 
					class="form-control" placeholder="localhost" />
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
