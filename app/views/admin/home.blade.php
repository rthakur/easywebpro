@extends('layouts.admin')
@section('extra_scripts')
<script src="{{URL::to('/assets/js/jquery-ui.js')}}"></script>
<script src="{{URL::to('/assets/js/admin/home.js')}}"></script>
<link rel="stylesheet" type="text/css" href="{{URL::to('/assets/css/admin/home.css')}}" />
@stop
@section('content')
<div class="row">
	<div class="col-lg-12">
		<h1>Dashboard</h1>
	</div>
</div>
<div class="row text-center">
	<div class="col-lg-12">
		@if (isset($home))

		@if ($home['tile_image_active'])
		<img src="{{URL::to('/assets/'.$home['title_image'])}}" />
		@else
		<h3><em>{{$home['title']}}</em>
		@endif
		<small class="h6">
			<a data-toggle="collapse" href="#collapse_title">
			Edit</a>
		</small>
		</h3>

		<div class="collapse" id="collapse_title">
			<div class="well">
				<div class="row">
					<div class="col-lg-1">
						<p class="h5">Active</p>
					</div>
					<div class="col-lg-3">
						<input type="checkbox" class="switch form-control" data-toggle="toggle" data-width="100%"
						data-on="Image" data-off="Title" id="title_image" 
						data-post-url="{{URL::to('/admin/title/image')}}"
						@if ($home['tile_image_active']) checked="true" @endif/>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-1">
					Update Title
					</div>
					<div class="col-lg-5">
						<form action="{{URL::to('/admin/put')}}" method="POST">
							<div class="form-group">
								<input type="text" name="title" 
								id="title" class="form-control" />
								<input type="hidden" id="url_get" 
								value="{{URL::to('/admin/get')}}" />
								<button type="submit" class="form-control updatetitle">Update</button>
							</div>
						</form>
					</div>
					<div class="col-lg-1">
					Update Image
					</div>
					<div class="col-lg-5">
						<form action="{{URL::to('/admin/put')}}" method="POST" enctype="multipart/form-data">
							<div class="form-group">
								<p>@if (isset($home)) {{$home['title_image']}}  @endif</p>
								<input type="file" name="title_image" 
								id="title_image" />
								<input type="hidden" id="url_get" 
								value="{{URL::to('/admin/get')}}" />
								<button type="submit" class="form-control">Update</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		@endif
	</div>
</div>

<div class="row">
	<div class="col-lg-12">
		@if (isset($home))
		<h3 class="text-center">
			<span class="heading" style="@if(isset($home->heading_size))font-size:{{$home->heading_size}}px !important;@endif @if(isset($home->heading_color))color:{{$home->heading_color}};@endif">{{$home['heading']}}</span>
			<small class="h6">
				<a class="aheading" data-toggle="collapse" href="#collapse_heading">
				Edit</a>
			</small>
		</h3>
		
		<div class="collapse" id="collapse_heading">
			<div class="well">
				<div class="row">
					<div class="col-lg-6">
						<form action="{{URL::to('/admin/put')}}" method="POST">
							<div class="form-group">
								<input type="text" name="heading" 
								id="heading" class="form-control" />
								<input type="hidden" id="url_get" 
								value="{{URL::to('/admin/get')}}" />
							</div>
					</div>
					<div class="col-lg-2">
							Size: <input type="number" class="spinEdit font" name="heading_size" style="width:100%;"
							@if (isset($home->heading_size))
								value="{{$home->heading_size}}"
							@else
								value=""
							@endif
							/>
					</div>
					<div class="col-lg-4">
							<div id="heading_color_picker" class="heading_colorpicker colorpicker demo demo-auto inl-bl" data-container="#heading_color_picker" data-inline="true"
							@if (isset($home->heading_color)))
								data-color="{{$home->heading_color}}"
							@else
								data-color="rgba(150,216,62,0.55)"
							@endif
								></div>
							<input type="hidden" value="" name="heading_color">
							<button type="submit">Update</button>
						</form>
					</div>
				</div>
			</div>
		</div>
		
		<h1 class="text-uppercase text-center">
			<strong><span class="subheading" style="@if(isset($home->sub_heading_size))font-size:{{$home->sub_heading_size}}px !important;@endif @if(isset($home->sub_heading_color))color:{{$home->sub_heading_color}};@endif">{{$home['sub_heading']}}</span></strong>
			<small class="h6">
				<a class="asubheading" data-toggle="collapse" href="#collapse_sub_heading">
				Edit</a>
			</small>
		</h1>
		<div class="collapse" id="collapse_sub_heading">
			<div class="well">
				<div class="row">
					<div class="col-lg-6">
						<form action="{{URL::to('/admin/put')}}" method="POST">
							<div class="form-group">
								<input type="text" name="sub_heading" 
								id="sub_heading" class="form-control" />
								<input type="hidden" id="url_get" 
								value="{{URL::to('/admin/get')}}" />
							</div>
					</div>
					<div class="col-lg-2">
						<form action="{{URL::to('/admin/put')}}" method="POST">
							Size: <input type="number" class="spinEdit font" name="sub_heading_size" style="width:100%;" 
							@if (isset($home->sub_heading_size))
								value="{{$home->sub_heading_size}}"
							@else
								value=""
							@endif
							/>
					</div>
					<div class="col-lg-4">
						<form action="{{URL::to('/admin/put')}}" method="POST">
							<div id="sub_heading_color_picker" class="sub_heading_colorpicker colorpicker demo demo-auto inl-bl" data-container="#sub_heading_color_picker" data-inline="true"
							@if (isset($home->sub_heading_color)))
								data-color="{{$home->sub_heading_color}}"
							@else
								data-color="rgba(150,216,62,0.55)"
							@endif
							></div>
							<input type="hidden" value="" name="sub_heading_color">
							<button type="submit">Update</button>
						</form>
					</div>
				</div>
			</div>
		</div>

		<div class="row text-left collapse" id="imgUpdate" >
			<div class="col-lg-12">
				<div class="well">
					<div class="row">
						<div class="col-lg-6">
							<form method="POST" enctype="multipart/form-data"
							action="{{URL::to('/admin/background/update')}}">
								<div class="form-group">
									<label for="image_path">Update Image</label>
									<p id="image_path">{{$home['image']}}</p>
									<input type="hidden" name="image_path" 
									id="image_path" value="{{$home['image']}}"/>
									<input type="file" name="new_image" />
								</div>
						</div>
						<div class="col-lg-6">
							Header Image Height: 
							<input type="number" name="header_image_height" value="@if(isset($home->header_image_height)){{$home->header_image_height}}@endif" />

							<button class="btn btn-default" type="submit">
								Update</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12 text-center">
				<a class="img-uo" href="#imgUpdate" data-toggle="collapse">
				<img src="{{URL::to('/assets/'.$home['image'])}}" 
					width="100%" height="300" id="bg_img" />
                 <div class="img-hover "><i class="fa fa-plus"></i></div> 
				</a>
			</div>
		</div>

		<div class="row padding">
			<div class="col-lg-6">
				<h3>Enable Sections</h3>
				<div class="well">
					@if (isset($menu))
					<form action="{{URL::to('/admin/sections/enable')}}" method="POST" id="update-sections">
					@foreach ($menu as $entry=>$x)
					<div class="row">
						<div class="col-lg-4 col-sm-12">
							<label>{{$entry}}</label>
						</div>
						<div class="col-lg-4 col-sm-12">
							<input type="checkbox" class="switch form-control" data-toggle="toggle" data-width="100%"
							name="ids[]" value="{{$x['id']}}" @if ($x['active'] == true) checked="true" @endif /><br />
						</div>
						@if($x['title']!=='about' && $x['title']!=='contact' && $x['title']!=='portfolio' && $x['title']!=='services' && $x['title']!=='team')
						<div class="delete_section" align="center">
							<a href="javascript:void(0)" class="deletesection" data-name="{{$x['title']}}" data-id="{{$x['id']}}"><i class="fa fa-times"></i></a>
						</div>
						@endif
					</div>
					@endforeach
					</form>
					@endif
				</div>
			</div>

			<div class="col-lg-6">
				<h3>Select Theme</h3>
				<div class="panel panel-default" id="skin-selector" data-url="{{URL::to('/admin/skin/set')}}"
					data-redir-url="{{URL::to('/admin')}}">
					<div class="panel-heading">
						Current Selection:
						@if (isset($cur_skin))
							<button type="button" class="btn btn-default" data-name={{$cur_skin['name']}} 
							style="background-color:{{$cur_skin['color']}}; color:white" id="cur_skin_btn">{{$cur_skin['name']}}</button>
						@else
							<button type="button" class="btn btn-default" id="cur_skin_btn">Default</button>
						@endif
					</div>
					<div class="panel-body">
						@if (isset($skins))
						<button type="button" class="btn btn-default skin-change" data-id="0" data-default="1">Default</button>
						@foreach ($skins as $skin)
							<button type="button" class="btn btn-default skin-change" data-id={{$skin['id']}} 
							style="background-color:{{$skin['color']}}; color:white">{{$skin['name']}}</button>
						@endforeach
						@endif
					</div>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-lg-6">
				<div class="well">
					<h2>Add New Section</h2>

					<form action="{{URL::to('/admin/section/add')}}" method="POST">
						<div class="form-group">
							<label>Create new Section</label>
							<input type="text" name="section" class="form-control"/>
						</div>
						<button class="btn btn-primary" type="submit"><i class="fa fa-plus"></i> Add</button>
					</form>
				</div>
			</div>

			<div class="col-lg-6">
				<h3>Manage Menu Order</h3>
				<div>
					<input type="hidden" value="{{URL::to('admin/menuorder')}}"  id="menuOrderPath"/>
					<ul id="sortable">
					@foreach ($menu as $entry)		
						<li data-menu-id="{{$entry->id}}" class="ui-state-default"><i class="fa fa-arrows-v"></i> {{$entry->title}}</li>
					@endforeach
					</ul>
				</div>
			</div>
		</div>

			<div class="row">
			<div class="col-lg-6">
				<div class="well">
					<h2>Setup  meta data </h2>
					<form  action="admin/updatemetatags" method="POST">
					@foreach(Option::all() as $meta)
						 <div class="form-group">
							<label>{{--*/ echo  ucfirst($meta->name); /*--}}</label>
							<textarea name="{{$meta->name}}" class="form-control" >{{$meta->value}}</textarea>
						</div>
					@endforeach
					<button class="btn btn-primary" type="submit"><i class="fa fa-plus"></i> Update </button>
					</form>
				</div>
			</div>
		</div>
	
	
	
		<div class="row padding">
            <div class="col-md-4">
                <ul class="list-inline social-buttons">
                    <li><a href="#collapse_social" data-toggle="collapse"><i class="fa fa-twitter fa-2x"></i></a>
                    </li>
                    <li><a href="#collapse_social" data-toggle="collapse"><i class="fa fa-facebook fa-2x"></i></a>
                    </li>
                    <li><a href="#collapse_social" data-toggle="collapse"><i class="fa fa-linkedin fa-2x"></i></a>
                    </li>
					<li><small class="h6"><a href="#collapse_social" data-toggle="collapse">Edit</a></small></li>
                </ul>
				<div class="collapse" id="collapse_social">
					<div class="well">
						<a name="collapse_social"></a>
						<form action="{{URL::to('/admin/put')}}" method="POST">
							<div class="form-group">
								<label for="facebook">Facebook</label>
								<input type="text" name="facebook" 
								id="facebook" class="form-control" />
							</div>
							<div class="form-group">
								<label for="twitter">Twitter</label>
								<input type="text" name="twitter" 
								id="twitter" class="form-control" />
							</div>
							<div class="form-group">
								<label for="linkedin">Linkedin</label>
								<input type="text" name="linkedin" 
								id="linkedin" class="form-control" />
							</div>
							<input type="hidden" id="url_get" 
							value="{{URL::to('/admin/get')}}" />
							<button type="submit" class="form-control">Update</button>
						</form>
					</div>
				</div>
            </div>
            <div class="col-md-4">
                <ul class="list-inline quicklinks">
                    <li>
						<a data-save-url="policy" href="{{URL::to('/admin/pages/visible')}}"
						class="html_page_save"
						@if (isset($html_pages['policy']) && $html_pages['policy']->active)
						data-visible="true"
						@else
						data-visible="false"
						@endif
						>
						@if (isset($html_pages['policy']) && $html_pages['policy']->active)
							<i class="fa fa-eye-slash"></i>
							@else
							<i class="fa fa-eye"></i>
						@endif
						</a>
						<a href="{{URL::to('/admin/pages/policy')}}">
							<i class="fa fa-pencil-square-o"></i>Privacy Policy
						</a>
                    </li>
                    <li>
						<a data-save-url="terms" href="{{URL::to('/admin/pages/visible')}}"
						class="html_page_save"
						@if (isset($html_pages['terms']) && $html_pages['terms']->active)
						data-visible="true"
						@else
						data-visible="false"
						@endif
						>
						@if (isset($html_pages['terms']) && $html_pages['terms']->active)
							<i class="fa fa-eye-slash"></i>
							@else
							<i class="fa fa-eye"></i>
						@endif
						</a>
						<a href="{{URL::to('/admin/pages/terms')}}"><i class="fa fa-pencil-square-o"></i>Terms of Use</a>
                    </li>
                </ul>
            </div>
        </div>

		@endif
	</div>
</div>

@stop
