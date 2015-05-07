@extends('layouts.main')

@section('content')

<!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top">
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
				href="#page-top">Start Bootstrap</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" 
			id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
					<li class="hidden">
                        <a href="#page-top"></a>
                    </li>
					@if( isset($menu))
						@foreach ($menu as $entry)
							<li class="page-scroll">
								<a href="#{{$entry['url']}}">
								{{$entry['title']}}
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

	<!-- Header -->
    <header>
        <div class="container">
            <div class="intro-text">
                <div class="intro-lead-in">Welcome To Our Studio!</div>
                <div class="intro-heading">It's Nice To Meet You</div>
                <a href="#services" class="page-scroll btn btn-xl">
				Tell Me More</a>
            </div>
        </div>

	</header>
    
	<!-- Section Services -->

	@include('sections.services')

	<!-- Portfolio Grid Section -->
	@include('sections.portfolio')

	<!-- About Section -->
	@include('sections.about')

	<!-- Team Section -->
	@include('sections.team')

	<!-- Clients Aside -->
    @include('sections.clients')

	<!-- Contact -->
	@include('sections.contact')
	
	<footer>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <span class="copyright">Copyright &copy; Your Website 2014</span>
                </div>
                <div class="col-md-4">
                    <ul class="list-inline social-buttons">
                        <li><a href="#"><i class="fa fa-twitter"></i></a>
                        </li>
                        <li><a href="#"><i class="fa fa-facebook"></i></a>
                        </li>
                        <li><a href="#"><i class="fa fa-linkedin"></i></a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <ul class="list-inline quicklinks">
                        <li><a href="#">Privacy Policy</a>
                        </li>
                        <li><a href="#">Terms of Use</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>

@stop
