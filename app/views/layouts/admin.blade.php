@extends('layouts.admin_layout')

@section('main_content')

		<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{URL::to('/admin')}}">Admin Dashboard</a>
            </div>
            <!-- /.navbar-header -->
          <div class="right-top">  
            <ul class="nav navbar-top-links navbar-right">
                
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="{{URL::to('/admin/logout')}}"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
          </div>
            <!-- /.navbar-top-links -->

        </nav>
        <!-- /.navbar-static-top -->

		<nav class="navbar-inverse navbar-static-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="side-menu">
                    <li>
                        <a href="{{URL::to('/admin')}}">
							<i class="fa fa-dashboard fa-fw"></i>
							Dashboard
						</a>
                    </li>
					@if (isset($menu))
					@foreach ($menu as $entry=>$value)
					<li class="text-capitalize">
						@if ($value->user_created)
						<a href="{{URL::to('/admin/section/'.$value['id'])}}">{{$entry}}</a>
						@else
						<a href="{{URL::to('/admin/'.$entry)}}">{{$entry}}</a>
						@endif
					</li>
					@endforeach
					@endif
                </ul>
                <!-- /#side-menu -->
            </div>
            <!-- /.sidebar-collapse -->
        </nav>
        <!-- /.navbar-static-side -->

		<div id="page-wrapper">

		@yield('content')

		</div>

@stop

