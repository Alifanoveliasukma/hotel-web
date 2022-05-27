@extends('layouts.frontend')

@section('content')
<section class="banner-area relative" id="home">
				<div class="overlay overlay-bg"></div>	
				<div class="container">
					<div class="row fullscreen d-flex align-items-center justify-content-between">
						<div class="banner-content col-lg-9 col-md-12">
							<h1 class="text-uppercase">
								SELAMAT DATANG DI WEBSITE {{config('library.title')}}			
							</h1>
							<p class="pt-10 pb-10">
								{{config('library.sub_welcome_message')}}
							</p>
							
						</div>										
					</div>
				</div>					
			</section>
			<!-- End banner Area -->
			<!-- Start feature Area -->
			<section class="feature-area">
				<div class="container">
					<div class="row">
						<div class="col-lg-4">
							<div class="single-feature">
								<div class="title">
									<h4>{{config('library.home_feature_column_1_title')}}</h4>
								</div>
								<div class="desc-wrap">
									<p>
									{{config('library.home_feature_column_1_content')}}
									</p>
									<a href="{{config('library.home_feature_column_1_link_url')}}">{{config('library.home_feature_column_1_link_text')}}</a>									
								</div>
							</div>
						</div>
						<div class="col-lg-4">
							<div class="single-feature">
								<div class="title">
									<h4>{{config('library.home_feature_column_2_title')}}</h4>
								</div>
								<div class="desc-wrap">
									<p>
									{{config('library.home_feature_column_2_content')}}
									</p>
									<a href="{{config('library.home_feature_column_2_link_url')}}">{{config('library.home_feature_column_2_link_text')}}</a>									
								</div>
							</div>
						</div>
						<div class="col-lg-4">
							<div class="single-feature">
								<div class="title">
									<h4>{{config('library.home_feature_column_3_title')}}</h4>
								</div>
								<div class="desc-wrap">
									<p>
									{{config('library.home_feature_column_3_content')}}
									</p>
									<a href="{{config('library.home_feature_column_3_link_url')}}">{{config('library.home_feature_column_3_link_text')}}</a>									
								</div>
							</div>
						</div>												
					</div>
				</div>	
			</section>
			<!-- End feature Area -->
			<section class="info-area pb-120">
				<div class="container-fluid">
					<div class="row align-items-center">
						<div class="col-lg-6 no-padding info-area-left">
						<img src="{{asset('/gambar/banner-bg.jpg') }}" >
						</div>
						<div class="col-lg-6 info-area-right">
							<h1>Tentang kami</h1>
							<p>Lepaskan diri anda ke hotel hebat, dikelilingi oleh keindahan pantai yang indah.
								Nikmati sore yang hangat dengan berenang dikolam renang dengan pemandangan matahari
								terbenam yang memukau. Kid's Club yang luas. Menawarkan beragam fasilitas
								dan kegiatan anak-anak yang akan melengkapi kenyamanan keluarga. Convention center kami, dilengkapi 
								pelayanan lengkap dengan ruang konvensi terbesar di garut mampu mengakomodasi hingga 3.000
								delegasi. Manfaatkan ruang penyelenggaraan konvensi M.I.C.E ataupun mewujudkan acara pernikahan
								adat yang mewah</p>
								<p><strong>Keterangan</strong></p>
								<p>Superior berada di lantai 3</p>
								<p>Deluxe berada di lantai 2</p>
								<p>Standar berada di lantai 1</p>
							<br>
						</div>
					</div>
				</div>	
			</section>
					
			<!-- Start popular-course Area -->
			<section class="popular-course-area section-gap">
				<div class="container">
					<div class="row d-flex justify-content-center">
						<div class="menu-content pb-70 col-lg-8">
							<div class="title text-center">
								<h1 class="mb-10">Kamar Kami</h1>
								<p>Didesain khusus untuk para tamu istimewa</p>
							</div>
						</div>
					</div>						
					<div class="row">
						<div class="active-popular-carusel">					
                            @foreach($kamar as $a)
							<div class="single-popular-carusel">
								<div class="thumb-wrap relative">
									<div class="thumb relative">
										<div class="overlay overlay-bg"></div>	
										<a href="/lihat/{{$a->id}}"><img src="{{asset('images/'.$a->foto_kamar)}}" class="card-img-top" alt="...">
									</div><a href="/lihat/{{$a->id}}">
									<div class="meta d-flex justify-content-between">
										<p><span class="lnr lnr-bed"></span> Rp. {{ number_format($a->harga_kamar) }} <span class="lnr lnr-stoks"></span>{{$a->stok_kamar}} kamar tersedia</p></a>
										
									</div>									
								</div>
								<div class="details">
                                <a href="/lihat/{{$a->id}}">
										<h4>
                                        {{$a->tipe_kamar}}	
										</h4>
									</a><a href="/lihat/{{$a->id}}">Fasilitas kamar :
									<p>
                                    {{$a->fasilitas_kamar}}										
									</p></a>
								</div>
							</div>
                            @endforeach	
														
						</div>
					</div>
				</div>
                <hr>
                <div class="container">
					<div class="row d-flex justify-content-center">
						<div class="menu-content pb-70 col-lg-8">
							<div class="title text-center">
								<h1 class="mb-10">Fasilitas Kami</h1>
								<p>Didesain khusus untuk para tamu istimewa</p>
							</div>
						</div>
					</div>						
					<div class="row">
						<div class="active-popular-carusel">					
                            @foreach($fasilitas as $a)
							<div class="single-popular-carusel">
								<div class="thumb-wrap relative">
									<div class="thumb relative">
										<div class="overlay overlay-bg"></div>	
										<img src="{{asset('images/'.$a->foto_fasilitas)}}" class="card-img-top" alt="...">
									</div>
																	
								</div>
								<div class="details">
									<a href="#">
										<h4>
                                        {{$a->nama_fasilitas}}
										</h4>
									</a>
									<p>
                                    {{$a->deskripsi_fasilitas}}										
									</p>
									
								</div>
							</div>
                            @endforeach	
														
						</div>
					</div>
				</div>	
			</section>
			<!-- End popular-course Area -->
			

			<!-- Start search-course Area -->
			<section class="search-course-area relative">
				<div class="overlay overlay-bg"></div>
				<div class="container">
					<div class="row justify-content-between align-items-center">
						<div class="col-lg-6 col-md-6 search-course-left">
							<h1 class="text-white">
								Registrasi <br>
								untuk penawaran special kami!
							</h1>
							
							<div class="row details-content">
								<div class="col single-detials">
									<span class="lnr lnr-apartment"></span>
									<a href="#"><h4>Expert Instructors</h4></a>		
									<p>
                                    Hotel yang didirikan sejak tahun 2019. Berlokasi di garut 
									</p>						
								</div>
								<div class="col single-detials">
									<span class="lnr lnr-license"></span>
									<a href="#"><h4>Certification</h4></a>		
									<p>
                                    Sudah mendapat sertifikassi internasional
									</p>						
								</div>								
							</div>
						</div>
						<div class="col-lg-4 col-md-6 search-course-right section-gap">
							<form class="form-wrap" method="post" action="{{ route('register') }}">
                                @csrf
								<h4 class="text-white pb-20 text-center mb-30">Registrasi untuk bergabung dengan kami</h4>		
								<input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Your Name" id="name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Your Name'" >
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                                <input type="email" id="email" class="form-control @error('name') is-invalid @enderror" name="email" placeholder="Your Email" id="email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Your Email'" >
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

								<input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password" onfocus="this.placeholder = 'your passord'" onblur="this.placeholder = 'Your Password '" required autocomplete="new-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password-confirm" name="password_confirmation" required autocomplete="new-password"placeholder="Confirm Password" onfocus="this.placeholder = 'Confirm Password'" onblur="this.placeholder = 'Confirm Password '" required autocomplete="Confirm Password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <p>sudah memiliki akun? login <a href="login">disini</a></p>

																
								<button class="primary-btn text-uppercase">Submit</button>
							</form>
						</div>
					</div>
				</div>	
			</section>
			<!-- End search-course Area -->
			
		
			<!-- Start upcoming-event Area -->
			
			<!-- End upcoming-event Area -->
						
			<!-- Start review Area -->
			<section class="review-area section-gap relative">
				<div class="overlay overlay-bg"></div>
				<div class="container">				
					<div class="row">
						<div class="active-review-carusel">
							<div class="single-review item">
								<div class="title justify-content-start d-flex">
									<a href="#"><h4>Alifa Novelia</h4></a>
									<div class="star">
										<span class="fa fa-star checked"></span>
										<span class="fa fa-star checked"></span>
										<span class="fa fa-star checked"></span>
										<span class="fa fa-star"></span>
										<span class="fa fa-star"></span>
									</div>
								</div>
								<p>
									Ini hotel yang bener-bener bagus banget, nyaman banget dan harganya ga mahal, pokoknya de besttt
								</p>
							</div>
							<div class="single-review item">
								<div class="title justify-content-start d-flex">
									<a href="#"><h4>Kasep</h4></a>
									<div class="star">
										<span class="fa fa-star checked"></span>
										<span class="fa fa-star checked"></span>
										<span class="fa fa-star checked"></span>
										<span class="fa fa-star"></span>
										<span class="fa fa-star"></span>
									</div>
								</div>
								<p>
									Baru kali ini Gue nemu hotel yang senyaman ini, masyaAllah banget si!!!
								</p>
							</div>
							<div class="single-review item">
								<div class="title justify-content-start d-flex">
									<a href="#"><h4>Sanny</h4></a>
									<div class="star">
										<span class="fa fa-star checked"></span>
										<span class="fa fa-star checked"></span>
										<span class="fa fa-star checked"></span>
										<span class="fa fa-star"></span>
										<span class="fa fa-star"></span>
									</div>
								</div>
								<p>
									PARAH PARAH PARAH PINGIN SALTO DI KOLAM RENANGGGGGG!!
								</p>
							</div>
							<div class="single-review item">
								<div class="title justify-content-start d-flex">
									<a href="#"><h4>Chintya</h4></a>
									<div class="star">
										<span class="fa fa-star checked"></span>
										<span class="fa fa-star checked"></span>
										<span class="fa fa-star checked"></span>
										<span class="fa fa-star"></span>
										<span class="fa fa-star"></span>
									</div>
								</div>
								<p>
									Hebat banget si SISTEMNYA Gak ribeeeeeeeeeet
								</p>
							</div>	
							<div class="single-review item">
								<div class="title justify-content-start d-flex">
									<a href="#"><h4>dede</h4></a>
									<div class="star">
										<span class="fa fa-star checked"></span>
										<span class="fa fa-star checked"></span>
										<span class="fa fa-star checked"></span>
										<span class="fa fa-star"></span>
										<span class="fa fa-star"></span>
									</div>
								</div>
								<p>
									masyaAllah aja aku mah cukup...gooood
								</p>
							</div>
																																		
						</div>
					</div>
				</div>	
			</section>
			
@stop