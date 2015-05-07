@extends('layouts.admin')

@section('extra_scripts')

<script src="/assets/js/admin/portfolio.js"></script>

@stop

@section('content')

          <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">
					{{$menu['portfolio']['display_name']}}
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
					{{$menu['portfolio']['description']}}
					<small class="h6"><a>Edit</a></small>
					</h3>
                </div>
            </div>
            <div class="row">
				@if (isset($portfolio))
				@foreach ($portfolio as $content)
                <div class="col-md-4 col-sm-6 portfolio-item">
                    <a href="#{{$content['url']}}" 
					class="portfolio-link" data-toggle="modal">
                        <div class="portfolio-hover">
                            <div class="portfolio-hover-content">
                                <i class="fa fa-plus fa-3x"></i>
                            </div>
                        </div>
                        <img src="/assets/{{$content['image']}}" 
						class="img-responsive" alt="">
                    </a>
                    <div class="portfolio-caption">
                        <h4>{{$content['title']}}</h4>
                        <p class="text-muted">
						{{$content['category']}}</p>
                    </div>
					<a class="btn btn-default update"
					href="#updateDialog" data-toggle="modal"
					data-update-id='{{$content['id']}}'
					data-update-img='{{$content['image']}}'
					data-update-title='{{$content['title']}}'
					data-update-category='{{$content['category']}}'>
					Update</a>
					<form action="/admin/portfolio/delete"
						method="POST">
						<input type="hidden" name="delete_id"
							value="{{$content['id']}}" />
						<input type="submit" class="btn btn-default" 
							value="delete" />						
					</form>
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
					<form action="/admin/portfolio/add"
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
							<label for="category">
							Description</label>
							<textarea name="category"
							id="category" class="form-control">
							</textarea>
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
					<form action="/admin/portfolio/update"
					method="POST" enctype="multipart/form-data">
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
							id="category" class="form-control">
							</textarea>
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

<script>

/*
$('.update').click(function(){

	var updateId= $(this).attr('data-update-id');

	$.ajax({

		url : '/admin/getportfolio',
		data:'id='+updateId,
		success: function(data){
		

$('#title').val(data['title'])

			}
		});

});

*/
</script>
@stop


