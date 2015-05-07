@extends('layouts.admin')

@section('content')

<div class=="row">
	<div class="col-lg-12">
		<h1>Dashboard</h1>
	</div class="col-lg-12">
</div>

<div class="row">
	<div class="col-lg-12">
		<h2>Sections</h2>
	</div>
</div>
<div class="row">
	<div class="col-lg-12">
		<ul>
		@if (isset($menu))
		@foreach ($menu as $entry)
			<li>
				<a href="/admin/{{$entry['title']}}">
					<strong class="text-uppercase">
					{{$entry['title']}}</strong>
				</a>
				<p>{{$entry['description']}}</p>
			</li>
		@endforeach
		@endif
		</ul>
	</div>
</div>

@stop
