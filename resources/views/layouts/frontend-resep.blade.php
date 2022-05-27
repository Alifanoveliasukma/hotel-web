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
		  <header id="header" id="home">
	  		<div class="header-top">
	  			<div class="container">
			  		<div class="row">
			  			<div class="col-lg-6 col-sm-6 col-8 header-top-left no-padding">
						  <a href="/"><span class="lnr lnr-apartment"></span> <span class="text">Hotel Hebat</span></a>			
			  			</div>
			  			<div class="col-lg-6 col-sm-6 col-4 header-top-right no-padding">
						  @guest
                          <a href="/lihat/"><span class="lnr lnr-envelope"></span> <span class="text">Kamar</span></a>
                          <a href="/fasilitas"><span class="lnr lnr-envelope"></span> <span class="text">Fasilitas</span></a>
                            @if (Route::has('login'))
							<a href="/login"><span class="lnr lnr-envelope"></span> <span class="text">Login</span></a>
							@endif
							@if (Route::has('register'))
							  <a href="/register"><span class="lnr lnr-envelope"></span> <span class="text">Register</span></a>	
							  @endif
							  @else	
							  
                              
                              <a href="/profile"><span class="lnr lnr-envelope"></span> <span class="text"> Anda masuk sebagai : {{ Auth::user()->name }} </span></a>

                            <a href="/history"><span class="lnr lnr-envelope"></span> <span class="text">Transaksi </span></a>
							<a href="/lihat/"><span class="lnr lnr-envelope"></span> <span class="text">Kamar</span></a>
                          <a href="/fasilitas"><span class="lnr lnr-envelope"></span> <span class="text">Fasilitas</span></a>
                            <?php
                                 $pesanan_utama = \App\Models\Pesanan::where('user_id', Auth::user()->id)->where('status',0)->first();
                                 if(!empty($pesanan_utama))
                                    {
                                     $notif = \App\Models\PesananDetail::where('pesanan_id', $pesanan_utama->id)->count(); 
                                    }
                                ?>
								<a href="/lihat/"><span class="lnr lnr-envelope"></span> <span class="text">Kamar</span></a>
                          <a href="/fasilitas"><span class="lnr lnr-envelope"></span> <span class="text">Fasilitas</span></a>
                            @if(!empty($notif))<a href="/history"><span class="lnr lnr-envelope"></span> <span class="text"> {{ $notif }} Pesanan saya </span></a>@endif
                            <a href="/home"><span class="lnr lnr-envelope"></span> <span class="text"> Profil </span></a>
                            <a href="{{ route('logout') }}" 
                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                       <span class="sf-with-ul"></span> <span class="text" > Logout </span>       
                                </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>	
							  @endguest	
			  			</div>
			  		</div>			  					
	  			</div> 
			</div>
		   
		  </header><!-- #header -->
          
		@include('layouts.include.content-guest')
		
		 <!--role resep  -->
		 
		@include('layouts.include.content2-resep')
		
		
<!-- role admin -->
		
		@include('layouts.include.content-admin')
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
			<script src="{{asset('js/bootstrap.min.js')}}></script>
		</body>
	</html>