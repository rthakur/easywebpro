@extends('layouts.admin')

@section('extra_scripts')

<script src="{{URL::to('/assets/js/admin/portfolio.js')}}"></script>
<link rel="stylesheet" type="text/css" 
	href="{{URL::to('/assets/css/admin/portfolio.css')}}" />

@stop

@section('content')

          <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">
					{{$menu['portfolio']['display_name']}}
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
							<form action="{{URL::to('/admin/portfolio/put')}}" method="POST">
								<div class="form-group">
									<input type="text" name="title" 
									id="title" class="form-control" />
									<input type="hidden" id="url_get" 
									value="{{URL::to('/admin/portfolio/get')}}" />
									<button type="submit" class="form-control">Update</button>
								</div>
							</form>
						</div>
					</div>

                    <h3 class="section-subheading text-muted">
					{{$menu['portfolio']['description']}}
					<small class="h6">
						<a data-toggle="collapse"
						href="#collapse_description">
						Edit</a>
					</small>
					</h3>
					<div class="collapse" id="collapse_description">
						<div class="well">
							<form action="{{URL::to('/admin/portfolio/put')}}" method="POST">
								<div class="form-group">
									<input type="text" name="description" 
									id="description" class="form-control" />
									<input type="hidden" id="url_get" 
									value="{{URL::to('/admin/portfolio/get')}}" />
									<button type="submit" class="form-control">Update</button>
								</div>
							</form>
						</div>
					</div>
                </div>
            </div>
            <div class="row">
				@if (isset($portfolio))
				@foreach ($portfolio as $content)
                <div class="col-md-4 col-sm-6 portfolio-item padding">
                    <a href="#{{$content['url']}}" 
					class="portfolio-link" data-toggle="modal">
                        <!--<div class="portfolio-hover">
                            <div class="portfolio-hover-content">
                                <i class="fa fa-plus fa-3x"></i>
                            </div>
                        </div>-->
                        <img src="{{URL::to('/assets/'.$content['image'])}}" 
						class="img-responsive" alt="">
                    </a>
                    <div class="portfolio-caption">
                        <h4>{{$content['title']}}</h4>
                        <p class="text-muted">
						{{$content['category']}}</p>
                    </div>
					<div class="row">
						<div class="col-lg-6 col-sm-12">
							<a class="update btn btn-default btn-block"
							href="#updateDialog" data-toggle="modal"
							data-update-id="{{$content['id']}}"
							data-update-img="{{$content['image']}}"
							data-update-title="{{$content['title']}}"
							data-update-category="{{$content['category']}}"
							data-update-url="{{$content['url']}}">
							Update</a>
						</div>
						<div class="col-lg-6 col-sm-12">
							<form action="{{URL::to('/admin/portfolio/delete')}}"
								method="POST">
								<input type="hidden" name="delete_id"
									value="{{$content['id']}}" />
								<button type="submit" class="btn btn-default btn-block" >
								Delete</button>						
							</form>
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
					<h1>Insert a new portfolio</h1>
				</div>

				<div class="modal-body">
					<form action="{{URL::to('/admin/portfolio/add')}}"
					method="POST" enctype="multipart/form-data"
						id="insertForm">
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
							<label for="category">
							Description</label>
							<textarea name="category"
							id="category" class="form-control"></textarea>
						</div>
						<div class="form-group">
							<label for="title">Url</label>
							<input type="text" name="url" 
							id="url" class="form-control" />
						</div>
						<input type="hidden" name="valid" value="false" />
						<input type="hidden" name="validUrl" value="{{URL::to('/admin/portfolio/validate')}}">
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
					<h1>Update the portfolio</h1>
				</div>

				<div class="modal-body">
					<form action="{{URL::to('/admin/portfolio/update')}}"
					method="POST" enctype="multipart/form-data"
					id="updateForm">
						<div class="form-group">
							<label for="image">Image</label>
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
							<label for="category">
							Description</label>
							<textarea name="category"
							id="category" class="form-control"></textarea>
						</div>
						<div class="form-group">
							<label for="title">Url</label>
							<input type="text" name="url" 
							id="url" class="form-control" />
						</div>
						<input type="hidden" name="id" id="id" />
						<input type="hidden" name="default_img" />
						<input type="hidden" name="valid" value="false" />
						<input type="hidden" name="validUrl" value="{{URL::to('/admin/portfolio/validate_update')}}">
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
