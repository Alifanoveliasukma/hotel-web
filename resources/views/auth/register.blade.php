@extends('layouts.frontend')

@section('content')
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
                                    Sudah mendapat disertifikassi internasional
									</p>						
								</div>								
							</div>
						</div>
						<div class="col-lg-4 col-md-6 search-course-right section-gap">
							<form class="form-wrap" method="POST" action="{{ route('register') }}">
                                @csrf
								<h4 class="text-white pb-20 text-center mb-30">Registrasi untuk bergabung dengan kami</h4>		
								<input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Your Name" id="name"  >
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                                <input type="email" id="email" class="form-control @error('name') is-invalid @enderror" name="email" placeholder="Your Email" id="email"  >
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

								<input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password" >
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password-confirm" name="password_confirmation" required autocomplete="new-password"placeholder="Confirm Password" >
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

								<p>Sudah memiliki akun?login <a href="/login">disini	</a>				
								<button type="submit" class="btn btn-primary">
			{{ __('Register') }}
                                </button>
							</form>
						</div>
					</div>
				</div>	
			</section>
@endsection
