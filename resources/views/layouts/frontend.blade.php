<!DOCTYPE html>
	<html lang="zxx" class="no-js">
	<head>
		<!-- Mobile Specific Meta -->
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- Favicon-->
		<link rel="shortcut icon" href="{{asset('/frontend/img/fav.png')}}">
		<!-- Author Meta -->
		<meta name="author" content="colorlib">
		<!-- Meta Description -->
		<meta name="description" content="">
		<!-- Meta Keyword -->
		<meta name="keywords" content="">
		<!-- meta character set -->
		<meta charset="UTF-8"> 
		<!-- Site Title -->
		<title>{{config('library.title')}}</title>
		
		<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet"> 
			<!-- img
			CSS
			============================================= -->
			<link rel="stylesheet" href="{{asset('/frontend/css/linearicons.css')}}">
			<link rel="stylesheet" href="{{asset('/frontend/css/font-awesome.min.css')}}">
			<link rel="stylesheet" href="{{asset('/frontend/css/bootstrap.css')}}">
			<link rel="stylesheet" href="{{asset('/frontend/css/magnific-popup.css')}}">
			<link rel="stylesheet" href="{{asset('/frontend/css/nice-select.css')}}">							
			<link rel="stylesheet" href="{{asset('/frontend/css/animate.min.css')}}">
			<link rel="stylesheet" href="{{asset('/frontend/css/owl.carousel.css')}}">			
			<link rel="stylesheet" href="{{asset('/frontend/css/jquery-ui.css')}}">			
			<link rel="stylesheet" href="{{asset('/frontend/css/main.css')}}">
		</head>
		<body>	
		@include('layouts.include._navbar')

		
		  <!-- #header -->
			@yield('content')
						
			<!-- start footer Area -->		
				
			<!-- End footer Area -->	
 

			<script src="{{asset('/frontend/js/vendor/jquery-2.2.4.min.js')}}"></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
			<script src="{{asset('/frontend/js/vendor/bootstrap.min.js')}}"></script>			
			<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA"></script>
  			<script src="{{asset('/frontend/js/easing.min.js')}}"></script>			
			<script src="{{asset('/frontend/js/hoverIntent.js')}}"></script>
			<script src="{{asset('/frontend/js/superfish.min.js')}}"></script>	
			<script src="{{asset('/frontend/js/jquery.ajaxchimp.min.js')}}"></script>
			<script src="{{asset('/frontend/js/jquery.magnific-popup.min.js')}}"></script>	
    		<script src="{{asset('/frontend/js/jquery.tabs.min.js')}}"></script>						
			<script src="{{asset('/frontend/js/jquery.nice-select.min.js')}}"></script>	
			<script src="{{asset('/frontend/js/owl.carousel.min.js')}}"></script>									
			<script src="{{asset('/frontend/js/mail-script.js')}}"></script>	
			<script src="{{asset('/frontend/js/main.js')}}"></script>	
			<script src="{{asset('js/bootstrap.min.js')}}"></script>
            @include('sweetalert::alert')
		</body>
	</html>