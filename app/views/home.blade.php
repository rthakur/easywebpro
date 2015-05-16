@extends('layouts.main')

@section('extra_scripts')

<script src="{{URL::to('/assets/js/home/home.js')}}"></script>

@if (isset($skin_path))
<link rel="stylesheet" type="text/css" href="{{URL::to($skin_path)}}" />
@endif

@stop

@section('content')

	<!-- Header -->
    <header data-img-path="{{URL::to('/assets/'.$home['image'])}}" style="@if(isset($home->header_image_height))height:{{$home->header_image_height}}px !important; overflow:hidden;@endif">
        <div class="container">
            <div class="intro-text">
                <div class="intro-lead-in" style="@if(isset($home->heading_size))font-size:{{$home->heading_size}}px !important;@endif @if(isset($home->heading_color))color:{{$home->heading_color}};@endif">{{$home['heading']}}</div>
                <div class="intro-heading" style="@if(isset($home->sub_heading_size))font-size:{{$home->sub_heading_size}}px !important;@endif @if(isset($home->sub_heading_color))color:{{$home->sub_heading_color}};@endif">{{$home['sub_heading']}}
				</div>
            </div>
        </div>

	</header>
    
	<!-- Section Services -->

	@if (isset($menu))

		@foreach($menu as $get)
			@if(isset($get->title))
				@if ($get->user_created)
					{{--*/
						$section = SectionModel::where('menu_id', '=', $get->id)->get();
						$data = array();

						if (count($section) > 0)
						{	$section = $section[0];

							if (isset($section->html))
								$data['html'] = $section->html;
						}

						$data['title'] = $get->title;
						$data['display_name'] = $get->display_name;
						$data['description'] = $get->description;
						echo View::make('sections.flat_page', $data);
					/*--}}
				@else
					@include('sections.'.$get->title)
				@endif
			@endif	
		@endforeach

	@endif

@stop
