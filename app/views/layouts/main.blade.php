<!DOCTYPE html>
<html lang="en">

<head>
	<!--<title>{{Helper::getmetavalue('meta_pagetitle')}}</title>-->
    <title>{{Helper::getmetavalue('page_title')}}</title>
    
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <meta name="description" content="{{Helper::getmetavalue('meta_description')}}">
    <meta name="content" content="{{Helper::getmetavalue('meta_content')}}">
    <meta name="keywords" content="{{Helper::getmetavalue('meta_keyword')}}">
    
    <meta name="author" content="">

    <!-- Bootstrap Core CSS -->
    <link href="{{URL::to('assets/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{URL::to('assets/css/agency.css')}}" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="{{URL::to('assets/font-awesome/css/font-awesome.min.css')}}" 
	rel="stylesheet" type="text/css">
    <link href="{{URL::to('assets/css/google_fonts.css')}}" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

	<!-- jQuery -->
    <script src="{{URL::to('assets/js/jquery.js')}}"></script>

	@yield('extra_scripts')

</head>

<body id="page-top" class="index">

	<!-- Navigation -->
     <nav class="navbar navbar-default navbar-fixed-top @if(Request::segment(1)=='policy' || Request::segment(1)=='terms') navbar-shrink @endif">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" 
				data-toggle="collapse" 
				data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand page-scroll"
				@if (isset($html))) 
				href="{{URL::to('/')}}">
				@else
				href="#page-top">
				@endif
				@if (isset($home))
					@if ($home['tile_image_active'])
					<img src="{{URL::to('/assets/'.$home['title_image'])}}" />
					@else
						{{$home["title"]}}
					@endif
				@endif
				</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" 
			id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
					<li class="hidden">
                        <a href="#page-top"></a>
                    </li>
					@if( isset($menu))
						@foreach ($menu as $entry=>$value)
							<li>
								<a class="page-scroll" 
								@if (isset($html_page))
									href="{{URL::to('/#'.$value['link'])}}">
								@else
									href="#{{$value['link']}}">
								@endif
								{{$value['display_name']}}
								</a>
							</li>
						@endforeach
					@endif
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>

	@yield('content')

	<footer>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <span class="copyright">Copyright &copy; Your Website {{date('Y')}}</span>
                </div>
                <div class="col-md-4">
                    <ul class="list-inline social-buttons">
						@if(($home['twitter_link'])!='')
                        <li><a href="{{$home['twitter_link']}}"><i class="fa fa-twitter"></i></a>
                        </li>@endif
                        @if(($home['facebook_link'])!='')
                        <li><a href="{{$home['facebook_link']}}"><i class="fa fa-facebook"></i></a>
                        </li>@endif
                        @if(($home['linkedin_link'])!='')
                        <li><a href="{{$home['linkedin_link']}}"><i class="fa fa-linkedin"></i></a>
                        </li>@endif
                    </ul>
                </div>
                <div class="col-md-4">
                    <ul class="list-inline quicklinks">
						@if (isset($html_pages['policy']) && $html_pages['policy']->active)
						<li><a href="{{URL::to('/policy')}}">Privacy Policy</a>
                        </li>
						@endif
						@if (isset($html_pages['terms']) && $html_pages['terms']->active)
                        <li><a href="{{URL::to('/terms')}}">Terms of Use</a>
                        </li>
						@endif
                    </ul>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{URL::to('assets/js/bootstrap.min.js')}}"></script>

    <!-- Plugin JavaScript -->
    <script src="{{URL::to('assets/js/jquery.easing.min.js')}}"></script>
    <script src="{{URL::to('assets/js/classie.js')}}"></script>
    <script src="{{URL::to('assets/js/cbpAnimatedHeader.js')}}"></script>

    <!-- Contact Form JavaScript -->
    <script src="{{URL::to('assets/js/jqBootstrapValidation.js')}}"></script>

    <!-- Custom Theme JavaScript -->
    <script src="{{URL::to('assets/js/agency.js')}}"></script>

</body>

</html>

