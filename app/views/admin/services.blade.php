@extends('layouts.admin')

@section('extra_scripts')

<script src="{{URL::to('/assets/js/admin/services.js')}}"></script>
<link rel="stylesheet" type="text/css" 
	href="{{URL::to('/assets/css/admin/services.css')}}" />

@stop

@section('content')

            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">
					{{$menu['services']['display_name']}}
					<small class="h6">
						<a data-toggle="collapse"
						href="#collapse_title">
						Edit</a>
					</small>
					<a class="btn btn-primary pull-right"
					href="#insertDialog" 
					data-toggle="modal">
						<span class="glyphicon glyphicon-plus-sign" 
						aria-hidden="true"></span>
						Add New
					</a>
					</h2>
					<div class="collapse" id="collapse_title">
						<div class="well">
							<form action="{{URL::to('/admin/services/put')}}" method="POST">
								<div class="form-group">
									<input type="text" name="title" 
									id="title" class="form-control" />
									<input type="hidden" id="url_get" 
									value="{{URL::to('/admin/services/get')}}" />
									<button type="submit" class="form-control">Update</button>
								</div>
							</form>
						</div>
					</div>

                    <h3 class="section-subheading text-muted">
					{{$menu['services']['description']}}
					<small class="h6">
						<a data-toggle="collapse"
						href="#collapse_description">
						Edit</a>
					</small>
					</h3>
					<div class="collapse" id="collapse_description">
						<div class="well">
							<form action="{{URL::to('/admin/services/put')}}" method="POST">
								<div class="form-group">
									<input type="text" name="description" 
									id="description" class="form-control" />
									<input type="hidden" id="url_get" 
									value="{{URL::to('/admin/services/get')}}" />
									<button type="submit" class="form-control">Update</button>
								</div>
							</form>
						</div>
					</div>

                </div>
				<div class="clearfix visible-xs-block"></div>
            </div>
            <div class="row text-center">
				@if (isset($services))
				@foreach ($services as $content)
                <div class="col-md-4 padding">
                    <span class="fa-stack fa-4x">
                        <i class="fa fa-circle fa-stack-2x text-primary"></i>
                        <i class="fa {{$content['image']}} fa-stack-1x fa-inverse"></i>
                    </span>
                    <h4 class="service-heading">
					{{$content['title']}}</h4>
                    <p class="text-muted">
					{{$content['description']}}</p>

					<div class="row">
						<div class="col-lg-6 col-sm-12">
							<form action="{{URL::to('/admin/services/delete')}}"
								method="POST">
								<input type="hidden" name="delete_id"
									value="{{$content['id']}}" />
								<button type="submit" class="btn btn-default btn-block"> 
								Delete</button>						
							</form>
						</div>
						<div class="col-lg-6 col-sm-12">
							<a class="btn btn-default update btn-block"
							href="#updateDialog" data-toggle="modal"
							data-update-id="{{$content['id']}}"
							data-update-img="{{$content['image']}}"
							data-update-title="{{$content['title']}}"
							data-update-description="{{$content['description']}}">
							Update</a>
						</div>
					</div>
					
					
                </div>
				@endforeach
				@endif

            </div>

	<div class="modal fade" id="insertDialog" tabindex="-1"
	role="dialog" aria-labelledby="insertDialogLabel" 
	aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" 
					data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					<h1>Insert a new service</h1>
				</div>

				<div class="modal-body">
					<form action="{{URL::to('/admin/services/add')}}"
					method="POST"
					id="insertForm">
						<div class="form-group">
							<label for="icon">Image</label>
							<input type="text" name="icon" id="icon"
							placeholder="fa fa-laptop" 
							class="form-control" />
						</div>
						<div class="form-group">
							<label for="title">Title</label>
							<input type="text" name="title" 
							id="title" class="form-control" />
						</div>
						<div class="form-group">
							<label for="description">
							Description</label>
							<textarea name="description"
							id="description" class="form-control"></textarea>
						</div>
						<input type="hidden" name="valid" value="false" />
						<input type="hidden" name="validUrl" value="{{URL::to('/admin/services/validate')}}">
						<button type="submit" class="btn btn-default">
						Insert</button>
					</form>

					<div class="errors">
						<ul></ul>
					</div>
				</div>

				<div class="modal-footer">
					<button type="button" class="btn btn-default" 
					data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>

	<div class="modal fade" id="updateDialog" tabindex="-1"
	role="dialog" aria-labelledby="insertDialogLabel" 
	aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" 
					data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					<h1>Update the service</h1>
				</div>

				<div class="modal-body">
					<form action="{{URL::to('/admin/services/update')}}"
					method="POST" enctype="multipart/form-data"
					id="updateForm">
						<div class="form-group">
							<label for="image">Image</label>
							<input type="text" name="icon" id="icon"
							placeholder="fa fa-laptop" 
							class="form-control" />
						</div>
						<div class="form-group">
							<label for="title">Title</label>
							<input type="text" name="title" 
							id="title" class="form-control" />
						</div>
						<div class="form-group">
							<label for="description">
							Description</label>
							<textarea name="description"
							id="description" class="form-control"></textarea>
						</div>
						<input type="hidden" name="id" id="id"/>
						<input type="hidden" name="default_img" />
						<input type="hidden" name="valid" value="false" />
						<input type="hidden" name="validUrl" value="{{URL::to('/admin/services/validate_update')}}">
						<button type="submit" class="btn btn-default">
						Update</button>
					</form>

					<div class="errors">
						<ul></ul>
					</div>
				</div>

				<div class="modal-footer">
					<button type="button" class="btn btn-default" 
					data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>

@stop
