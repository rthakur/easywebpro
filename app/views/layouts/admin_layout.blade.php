<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>EasyWebPro - Admin</title>

    <!-- Core CSS - Include with every page -->
    <link href="{{URL::to('/assets/css/bootstrap.min.css')}}" rel="stylesheet">

	<!-- Custom Fonts -->
    <link href="{{URL::to('assets/font-awesome/css/font-awesome.min.css')}}" 
	rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='http://fonts.googleapis.com/css?family=Kaushan+Script' 
	rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

    <!-- Page-Level Plugin CSS - Dashboard -->
    <link href="{{URL::to('/assets/css/plugins/morris/morris-0.4.3.min.css')}}" rel="stylesheet">
    <link href="{{URL::to('/assets/css/plugins/timeline/timeline.css')}}" rel="stylesheet">

    <!-- SB Admin CSS - Include with every page -->
    <link href="{{URL::to('/assets/css/sb-admin.css')}}" rel="stylesheet">
   	<script src="{{URL::to('/assets/js/jquery-1.10.2.js')}}"></script>
	<script src="{{URL::to('/assets/js/bootstrap.min.js')}}"></script>
	<script src="{{URL::to('/assets/js/bootstrap-datepicker.js')}}"></script>
	<script src="{{URL::to('/assets/js/jquery.rtnotify.js')}}"></script>
	<link rel="stylesheet" type="text/css" 
		href="{{URL::to('/assets/css/datepicker3.css')}}" />
	<link rel="stylesheet" type="text/css" 
		href="{{URL::to('/assets/css/jquery.rtnotify.css')}}" />

	<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.0/css/bootstrap-toggle.min.css" rel="stylesheet"> 
	<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.0/js/bootstrap-toggle.min.js"></script>

	<link rel="stylesheet" type="text/css" href="{{URL::to('assets/colorpicker/css/bootstrap-colorpicker.min.css')}}" />
	<script src="{{URL::to('assets/colorpicker/js/bootstrap-colorpicker.min.js')}}"></script>

	@yield('extra_scripts')

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

	<div id="wrapper">

		@yield('main_content')		

	</div>
	@include('layouts.notifications')
	<script>
	$('ul.nav > li > a[href="' + window.location.href + '"]').addClass('active');
	</script>
	<!-- Core Scripts - Include with every page -->
   <script src="{{URL::to('/assets/js/plugins/metisMenu/jquery.metisMenu.js')}}"></script>

    <!-- Page-Level Plugin Scripts - Dashboard -->
       <!-- <script src="/assets/js/plugins/morris/raphael-2.1.0.min.js"></script>
    <script src="/assets/js/plugins/morris/morris.js"></script>

<script src="/assets/js/demo/dashboard-demo.js"></script>   

<script src="/assets/js/contact_me.js"></script>
-->

    <!-- SB Admin Scripts - Include with every page -->
    <script src="{{URL::to('/assets/js/sb-admin.js')}}"></script>

    <!-- Page-Level Demo Scripts - Dashboard - Use for reference -->
    

	<!-- Plugin JavaScript -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
    <!--<script src="{{URL::to('/assets/js/classie.js')}}"></script>
    <script src="{{URL::to('/assets/js/cbpAnimatedHeader.js')}}"></script>-->

    <!-- Contact Form JavaScript -->
    <script src="{{URL::to('/assets/js/jqBootstrapValidation.js')}}"></script>
 

    <!-- Custom Theme JavaScript -->
    <script src="{{URL::to('/assets/js/agency.js')}}"></script>

</body>

</html>
