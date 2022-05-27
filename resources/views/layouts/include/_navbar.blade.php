<header id="header" id="home">
	  		<div class="header-top">
	  			<div class="container">
			  		<div class="row">
			  			<div class="col-lg-6 col-sm-6 col-8 header-top-left no-padding">
						  <a href="/"><span class="lnr lnr-apartment"></span> <span class="text">Hotel Hebat</span></a>			
			  			</div>
			  			<div class="col-lg-6 col-sm-6 col-4 header-top-right no-padding">
						@guest
                          <a href="/kamar"><span class="lnr lnr-envelope"></span> <span class="text">Kamar</span></a>
                          <a href="/fasilitas"><span class="lnr lnr-envelope"></span> <span class="text">Fasilitas</span></a>
                            @if (Route::has('login'))
							<a href="/login"><span class="lnr lnr-envelope"></span> <span class="text">Login</span></a>
							@endif

							@if (Route::has('register'))
							<a href="/register"><span class="lnr lnr-envelope"></span> <span class="text">Register</span></a>	
							@endif
                            
						@else	
                            @if(auth()->user()->role == 'admin')
                                    <a href="/profile"><span class="lnr lnr-envelope"></span> <span class="text"> Anda masuk sebagai : {{ Auth::user()->name }} </span></a>
                                    <a href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                        <span class="sf-with-ul"></span> <span class="text"> Logout </span>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>                                     
                                    </a>
                                    <a href="/home"><span class="lnr lnr-envelope"></span> <span class="text"> Dashboard</span></a>
                                   
                            @endif
                            @if(auth()->user()->role == 'resepsionis')
                                    <a href="/profile"><span class="lnr lnr-envelope"></span> <span class="text"> Anda masuk sebagai : {{ Auth::user()->name }} </span></a>
                                    <a href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                        <span class="sf-with-ul"></span> <span class="text"> Logout </span>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>                                   
                                    </a>
                                    <a href="/home"><span class="lnr lnr-envelope"></span> <span class="text"> Dashboard</span></a>                                 
                            @endif
                            @if(auth()->user()->role == 'guest')
                                    <a href="/profile"><span class="lnr lnr-envelope"></span> <span class="text"> Anda masuk sebagai : {{ Auth::user()->name }} </span></a>
                                    <a href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                        <span class="sf-with-ul"></span> <span class="text"> Logout </span>   
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>                                  
                                    </a>
                                    <a href="/home"><span class="lnr lnr-envelope"></span> <span class="text"> Dashboard</span></a>                          
                                    <a href="/history"><span class="lnr lnr-envelope"></span> <span class="text">Transaksi </span></a>    
                                    <?php
                                        $pesanan_utama = \App\Models\Pesanan::where('user_id', Auth::user()->id)->where('status',0)->first();
                                        if(!empty($pesanan_utama))
                                            {
                                            $notif = \App\Models\PesananDetail::where('pesanan_id', $pesanan_utama->id)->count(); 
                                            }
                                    ?>   
                                    @if(!empty($notif))<a href="/checkout"><span class="lnr lnr-envelope"></span> <span class="text"> {{ $notif }} Pesanan saya </span></a>@endif
                                    
                            @endif
							  
							  @endguest	
			  			</div>
			  		</div>			  					
	  			</div> 
			</div>
		   
		  </header>