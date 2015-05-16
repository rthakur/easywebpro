@extends('layouts.admin')

@section('extra_scripts')

<script src="{{URL::to('/assets/js/admin/contact.js')}}"></script>

@stop

@section('content')

	<div class="row">
		<div class="col-lg-12 text-center">
			<h2 class="section-heading">
			{{$menu['contact']['display_name']}}
			<small class="h6">
				<a data-toggle="collapse"
				href="#collapse_title">
				Edit</a>
			</small>
			</h2>
			<div class="collapse" id="collapse_title">
				<div class="well">
					<form action="{{URL::to('/admin/contact/put')}}" method="POST">
						<div class="form-group">
							<input type="text" name="title" 
							id="title" class="form-control" />
							<input type="hidden" id="url_get" 
							value="{{URL::to('/admin/contact/get')}}" />
							<button type="submit" class="form-control">Update</button>
						</div>
					</form>
				</div>
			</div>
			<h3 class="section-subheading text-muted">
			{{$menu['contact']['description']}}
			<small class="h6">
				<a data-toggle="collapse"
				href="#collapse_description">
				Edit</a>
			</small>
			</h3>

			<div class="collapse" id="collapse_description">
				<div class="well">
					<form action="{{URL::to('/admin/contact/put')}}" method="POST">
						<div class="form-group">
							<input type="text" name="description" 
							id="description" class="form-control" />
							<input type="hidden" id="url_get" 
							value="{{URL::to('/admin/contact/get')}}" />
							<button type="submit" class="form-control">Update</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12">
			<table class="table table-bordered table-striped">
				<tr>
					<th>ID</th>
					<th>Name</th>
					<th>E-Mail</th>
					<th>Phone</th>
					<th>Message</th>
				</tr>
				@if (isset($contacts))
				@foreach ($contacts as $contact)
				<tr>
					<td>{{$contact['id']}}</td>
					<td>{{$contact['name']}}</td>
					<td>{{$contact['email']}}</td>
					<td>{{$contact['phone']}}</td>
					<td>{{$contact['message']}}</td>
				</tr>
				@endforeach
				@endif
			</table>
		</div>
	</div>
	

@stop
