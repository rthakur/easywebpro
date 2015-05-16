@extends('layouts.admin')

@section('extra_scripts')

<script src="{{URL::to('/assets/js/admin/about.js')}}"></script>
<link rel="stylesheet" type="text/css" 
	href="{{URL::to('/assets/css/admin/about.css')}}" />
<script type="text/javascript" src="{{URL::to('/assets/ckeditor/ckeditor.js')}}"></script>
<script type="text/javascript" src="{{URL::to('/assets/ckfinder/ckfinder.js')}}"></script>

<script type="text/javascript">
window.onload = function() {
  var editor = CKEDITOR.replace('body1', {customConfig: "../ckeditor_config.js"});
  CKFinder.SetupCKEditor( editor, '/assets/ckfinder/' );
};
</script>

@stop

@section('content')

            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">
					{{$menu['about']['display_name']}}
					<small class="h6">
						<a data-toggle="collapse"
						href="#collapse_title">
						Edit</a>
					</small>
					</h2>
					<div class="collapse" id="collapse_title">
						<div class="well">
							<form action="{{URL::to('/admin/about/put')}}" method="POST">
								<div class="form-group">
									<input type="text" name="title" 
									id="title" class="form-control" />
									<input type="hidden" id="url_get" 
									value="{{URL::to('/admin/about/get')}}" />
									<button type="submit" class="form-control">Update</button>
								</div>
							</form>
						</div>
					</div>

                    <h3 class="section-subheading text-muted">
					{{$menu['about']['description']}}
					<small class="h6">
						<a data-toggle="collapse"
						href="#collapse_description">
						Edit</a>
					</small>
					</h3>
					<div class="collapse" id="collapse_description">
						<div class="well">
							<form action="{{URL::to('/admin/about/put')}}" method="POST">
								<div class="form-group">
									<input type="text" name="description" 
									id="description" class="form-control" />
									<input type="hidden" id="url_get" 
									value="{{URL::to('/admin/about/get')}}" />
									<button type="submit" class="form-control">Update</button>
								</div>
							</form>
						</div>
					</div>
                </div>
            </div>

			<div class="row">
				<div class="col-lg-3">
					<div class="panel panel-default">
						<div class="panel-heading">
							Currently Active
						</div>
						<div class="panel-body">
							<input type="checkbox" id="toggleHtml" class="switch form-control" data-toggle="toggle" data-width="100%"
								data-on="Timeline" data-off="Make Your Own" data-url="{{URL::to('/admin/about/toggleHtmlActive')}}"
								@if (isset($active) && !$active) checked="true" @endif/>
						</div>
					</div>
				</div>
			</div>

			<div class="panel-body">
				<ul class="nav nav-tabs about_tabs" data-active="{{$active}}">
					<li class="active"><a href="#about_tab_timeline" data-toggle="tab">Timeline</a></li>
					<li><a href="#about_tab_make" data-toggle="tab">Design your own</a></li>
				</ul>

				<div class="tab-content">
					<div role="tabpanel" class="tab-pane fade in active" id="about_tab_timeline">
						<div class="row">
							<div class="col-lg-12 padding">
								<a class="btn btn-primary pull-right"
								href="#insertDialog" 
								data-toggle="modal">
									<span class="glyphicon glyphicon-plus-sign" 
									aria-hidden="true"></span>
									Add New
								</a>
							</div>
						</div>
						<ul class="timeline">
							{{--*/
								$count = 0;
							/*--}}

							@if (isset($about))
							@foreach ($about as $content)

							@if ($count % 2 == 0)
						    <li>
							@else
							<li class="timeline-inverted">
							@endif
						        <div class="timeline-badge">
						            <img class="img-circle img-responsive"
									src="{{URL::to('/assets/'.$content['image'])}}"
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

										<div class="row">
											<div class="col-lg-6 col-sm-12 padding">
												<a class="btn btn-default update btn-block"
												href="#updateDialog" data-toggle="modal"
												data-update-id="{{$content['id']}}"
												data-update-img="{{$content['image']}}"
												data-update-title="{{$content['title']}}"
												data-update-description="{{$content['description']}}"
												data-update-to="{{$content['to']}}"
												data-update-from="{{$content['from']}}">
												Update</a>
											</div>
											<div class="col-lg-6 col-sm-12 padding">
												<form action="{{URL::to('/admin/about/delete')}}"
													method="POST">
													<input type="hidden" name="delete_id"
														value="{{$content['id']}}" />
													<button type="submit" class="btn btn-default btn-block"> 
													Delete</button>						
												</form>
											</div>
										</div>

						            </div>
						        </div>
						    </li>

							{{--*/
								$count++;
							/*--}}

							@endforeach
							@endif
		
						</ul>
					</div>

					<div role="tabpanel" class="tab-pane fade in active" id="about_tab_make">
						<form method="post" action="{{URL::to('/admin/about/saveHtml')}}">
							<div class="row">
								<div class="col-lg-12 padding">
									<textarea name="html" rows="20" id="body1">
										@if (isset($html))
											{{$html}}
										@endif
									</textarea>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-12">
									<input type="hidden" name="url" value="{{$save_url}}">
									<input type="hidden" name="id" value="@if (isset($id)) {{$id}} @endif">
									<button type="submit" class="btn btn-default">Submit</button>
								</div>
							</div>
						</form>

						@if (isset($errors))
						<ul>
							@foreach ($errors as $error)
							<li>{{$error}}</li>
							@endforeach
						</ul>
						@endif
					</div>
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
					<form action="{{URL::to('/admin/about/add')}}"
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
							<label for="description">
							Description</label>
							<textarea name="description"
							id="description" class="form-control"></textarea>
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
						<input type="hidden" name="valid" value="false" />
						<input type="hidden" name="validUrl" value="{{URL::to('/admin/about/validate')}}">
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
					<form action="{{URL::to('/admin/about/update')}}"
					method="POST" enctype="multipart/form-data"
					id="updateForm">
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
							id="description" class="form-control"></textarea>
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
						<input type="hidden" name="valid" value="false" />
						<input type="hidden" name="validUrl" value="{{URL::to('/admin/about/validate_update')}}">
						<input type="hidden" name="id" id="id" />
						<input type="hidden" name="default_img" />
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
