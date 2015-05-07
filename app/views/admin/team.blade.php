@extends('layouts.admin')

@section('extra_scripts')

<script src="/assets/js/admin/team.js"></script>

@stop

@section('content')

            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">
					{{$menu['team']['title']}}
					<small class="h6"><a>Edit</a></small>
					<a class="btn btn-primary pull-right"
					href="#insertDialog" 
					data-toggle="modal">
						<span class="glyphicon glyphicon-plus-sign" 
						aria-hidden="true"></span>
						Add New
					</a>
					</h2>
                    <h3 class="section-subheading text-muted">
					{{$menu['team']['description']}}
					<small class="h6"><a>Edit</a></small>
					</h3>
                </div>
            </div>
            <div class="row">
				@if (isset($team))
				@foreach ($team as $content)
                <div class="col-sm-4">
                    <div class="team-member">
                        <img src="/assets/{{$content['image']}}"
 						class="img-responsive img-circle" alt="">
                        <h4>{{$content['name']}}</h4>
                        <p class="text-muted">
						{{$content['designation']}}</p>
                        <ul class="list-inline social-buttons">
                            <li><a href="#"><i class="fa fa-twitter">
							</i></a>
                            </li>
                            <li><a href="#">
							<i class="fa fa-facebook"></i></a>
                            </li>
                            <li><a href="#">
							<i class="fa fa-linkedin"></i></a>
                            </li>
                        </ul>
					<a class="btn btn-default update"
					href="#updateDialog" data-toggle="modal"
					data-update-id='{{$content['id']}}'
					data-update-img='{{$content['image']}}'
					data-update-name='{{$content['name']}}'
					data-update-designation='{{$content['designation']}}'>
					Update</a>
					<form action="/admin/team/delete" method="POST">
						<input type="hidden" name="delete_id"
							value="{{$content['id']}}" />
						<input type="submit" class="btn btn-default" 
							value="delete" />						
					</form>
                    </div>
                </div>
				@endforeach
				@endif
				<!--
				<div class="col-sm-4">
					<a href="#insertDialog" data-toggle="modal">
                    <div class="team-member">
                        <img src="/assets/img/team/blank_user.jpg"
 						class="img-responsive img-circle" alt="">
                        <h4>Create New</h4>
                    </div>
					</a>
                </div>
				-->
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 text-center">
                    <p class="large text-muted">
					{{$menu['team']['footnote']}}
					<small class="h6"><a>Edit</a></small>
					</p>
                </div>
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
					<h1>Insert a new team member</h1>
				</div>

				<div class="modal-body">
					<form action="/admin/team/add"
					method="POST" enctype="multipart/form-data">
						<div class="form-group">
							<label for="icon">Image</label>
							<input type="file" name="image" 
							id="image" />
						</div>
						<div class="form-group">
							<label for="name">Name</label>
							<input type="text" name="name" 
							id="name" class="form-control" />
						</div>
						<div class="form-group">
							<label for="designation">
							Designation</label>
							<input type="text" name="designation"
							id="designation" class="form-control" />
						</div>
						<button type="submit" class="btn btn-default">
						Insert</button>
					</form>
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
					<h1>Update Team Member</h1>
				</div>

				<div class="modal-body">
					<form action="/admin/team/update"
					method="POST" enctype="multipart/form-data">
						<div class="form-group">
							<label for="image">Image</label>
							<p id="displayPic"></p>
							<input type="file" name="image" 
							id="image" />
						</div>
						<div class="form-group">
							<label for="title">Name</label>
							<input type="text" name="name" 
							id="name" class="form-control" />
						</div>
						<div class="form-group">
							<label for="designation">
							Designation</label>
							<input type="text" name="designation"
							id="designation" class="form-control" />
						</div>
						<input type="hidden" name="id" />
						<input type="hidden" name="default_img" />
						<button type="submit" class="btn btn-default">
						Update</button>
					</form>
				</div>

				<div class="modal-footer">
					<button type="button" class="btn btn-default" 
					data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>

@stop
