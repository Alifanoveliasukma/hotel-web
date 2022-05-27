<!doctype html>
<html lang="en">

<head>
	<title>Hotel Hebat</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<!-- VENDOR CSS -->
	<link rel="stylesheet" href="{{asset('admin/assets/vendor/bootstrap/css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{asset('admin/assets/vendor/font-awesome/css/font-awesome.min.css')}}">
	<link rel="stylesheet" href="{{asset('admin/assets/linearicons/style.css')}}">
	<link rel="stylesheet" href="{{asset('admin/assets/vendor/chartist/css/chartist-custom.css')}}">
	<!-- MAIN CSS -->
	<link rel="stylesheet" href="{{asset('admin/assets/css/main.css')}}">
	<!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
	<link rel="stylesheet" href="{{asset('admin/assets/css/demo.css')}}">
	<!-- GOOGLE FONTS -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
	<!-- ICONS -->
	<link rel="apple-touch-icon" sizes="76x76" href="{{asset('admin/assets/img/apple-icon.png')}}">
	<link rel="icon" type="image/png" sizes="96x96" href="{{asset('admin/assets/img/favicon.png')}}">
	<link rel="stylesheet" href="{{url('bootstrap/css/bootstrap.min.js') }}"> 
</head>

<body>
	<!-- WRAPPER -->
	<div id="wrapper">
		<!-- NAVBAR -->
		<nav class="navbar navbar-default navbar-fixed-top">

			<div class="container-fluid">
				<div class="navbar-btn">
					<button type="button" class="btn-toggle-fullwidth"><i class="lnr lnr-arrow-left-circle"></i></button>
				</div>
				<form class="navbar-form navbar-left">
					<div class="input-group">
						
					</div>
				</form>
				
				<div id="navbar-menu">
					<ul class="nav navbar-nav navbar-right">
						<li class="dropdown">
							<a href="#" class="dropdown-toggle icon-menu" data-toggle="dropdown">
								<i class="lnr lnr-alarm"></i>
								
							</a>
							
						</li> <?php
                                 $pesanan_utama = \App\Models\Pesanan::where('user_id', Auth::user()->id)->where('status',0)->first();
                                 if(!empty($pesanan_utama))
                                    {
                                     $notif = \App\Models\PesananDetail::where('pesanan_id', $pesanan_utama->id)->count(); 
                                    }
                                ?>
						
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown"><span>{{ Auth::user()->name }}</span> </a>
							<ul class="dropdown-menu">
								<li><a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a><form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                    <a href="/">Landing Page</a>
                                    @if(!empty($notif))
                                    <a href="/checkout">{{ $notif }}Pesanan saya</a>
                                    @endif
                                    </a>
                                
								</li>							
							</ul>
						</li>
						
					</ul>
				</div>
			</div>
		</nav>
		<!-- END NAVBAR -->
		<!-- LEFT SIDEBAR -->
		<!-- LEFT SIDEBAR -->
		@if(View::hasSection('sidebar'))
        @include('include.fitur.include._sidebar_supervisi')
		
		<!-- guru fitur -->
		@elseif(View::hasSection('guru_fitur'))
        @include('role.fitur.guru_fitur')
		@endif   

		<!-- Role tamu -->
		@include('layouts.include._sidebar')
		@include('layouts.include.content-guest')
		
		 <!--role resep  -->
		 @include('layouts.include._sidebar')
		@include('layouts.include.content2-resep')
		
		
<!-- role admin -->
		@include('layouts.include._sidebar')
		@include('layouts.include.content-admin')
		<!-- END LEFT SIDEBAR -->
		<!-- END LEFT SIDEBAR -->
		<!-- MAIN -->
		@yield('content')
		<!-- END MAIN -->
		<div class="clearfix"></div>
		<footer>
			<div class="container-fluid">
				<p class="copyright">Shared by <i class="fa fa-love"></i><a href="https://bootstrapthemes.co">BootstrapThemes</a>
</p>
			</div>
		</footer>
	</div>
	<!-- END WRAPPER -->
	<!-- Javascript -->
	<script src="{{asset('admin/assets/vendor/jquery/jquery.min.js')}}"></script>
	<script src="{{asset('admin/assets/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
	<script src="{{asset('admin/assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
	<script src="{{asset('admin/assets/vendor/jquery.easy-pie-chart/jquery.easypiechart.min.js')}}"></script>
	<script src="{{asset('admin/assets/vendor/chartist/js/chartist.min.js')}}"></script>
	<script src="{{asset('admin/assets/scripts/klorofil-common.js')}}"></script>
	
    @include('sweetalert::alert')
</body>

</html>
