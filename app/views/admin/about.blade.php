@extends('layouts.admin')

@section('extra_scripts')

<script src="/assets/js/admin/about.js"></script>

@stop

@section('content')

            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">
					{{$menu['about']['title']}}
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
					{{$menu['about']['description']}}
					<small class="h6"><a>Edit</a></small>
					</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <ul class="timeline">
						@if (isset($about))
						@foreach ($about as $content)
                        <li>
                            <div class="timeline-image">
                                <img class="img-circle img-responsive"
								src="/assets/{{$content['image']}}"
								alt="">
                            </div>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <h4>
							{{date("M Y",strtotime($content['to']))}} 

							@if( $content['from'] != "0000-00-00" )
							to {{date("M Y",strtotime($content['from']))}}
							@endif </h4>
                                    <h4 class="subheading">
									{{$content['title']}}</h4>
                                </div>
                                <div class="timeline-body">
                                    <p class="text-muted">
									{{$content['description']}}</p>
                                </div>
                            </div>
							<a class="btn btn-default update"
							href="#updateDialog" data-toggle="modal"
							data-update-id='{{$content['id']}}'
							data-update-img='{{$content['image']}}'
							data-update-title='{{$content['title']}}'
							data-update-description='{{$content['description']}}'
							data-update-to='{{$content['to']}}'
							data-update-from='{{$content['from']}}'>
							Update</a>
							<form action="/admin/about/delete"
								method="POST">
								<input type="hidden" name="delete_id"
									value="{{$content['id']}}" />
								<input type="submit" class="btn btn-default" 
									value="delete" />						
							</form>
                        </li>
						@endforeach
						@endif
						<li class="timeline-inverted">
                            <div class="timeline-image">
                                <h4>Be Part
                                    <br>Of Our
                                    <br>Story!</h4>
                            </div>
                        </li>
                    </ul>
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
					<h1>Insert a new timeline</h1>
				</div>

				<div class="modal-body">
					<form action="/admin/about/add"
					method="POST" enctype="multipart/form-data">
						<div class="form-group">
							<label for="icon">Image</label>
							<input type="file" name="image" 
							id="image" />
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
							id="description" class="form-control">
							</textarea>
						</div>
						<div class="form-group">
							<label for="from">From</label>
							<input name="from"
							id="from" class="form-control datepicker"/>
						</div>
						<div class="form-group">
							<label for="to">							To</label>
							<input name="to"
							id="to" class="form-control datepicker"/>
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
					<h1>Update the portfolio</h1>
				</div>

				<div class="modal-body">
					<form action="/admin/about/update"
					method="POST" enctype="multipart/form-data">
						<div class="form-group">
							<label for="icon">Image</label>
							<p id="displayPic"></p>
							<input type="file" name="image" 
							id="image" />
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
							id="description" class="form-control">
							</textarea>
						</div>
						<div class="form-group">
							<label for="from">From</label>
							<input name="from"
							id="from" class="form-control datepicker"/>
						</div>
						<div class="form-group">
							<label for="to">							To</label>
							<input name="to"
							id="to" class="form-control datepicker"/>
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
