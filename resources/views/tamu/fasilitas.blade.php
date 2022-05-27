@extends('layouts.frontend')

@section('content')
<section class="popular-course-area section-gap">
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
										<a href="/lihat/{{$a->id}}"><img src="{{asset('images/'.$a->foto_fasilitas)}}" class="card-img-top" alt="..."></a>
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
@endsection


