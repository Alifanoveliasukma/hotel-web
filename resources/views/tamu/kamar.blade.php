@extends('layouts.frontend')

@section('content')
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
										<a href="/lihat/{{$a->id}}"><img src="{{asset('images/'.$a->foto_kamar)}}" class="card-img-top" alt="..."></a>
									</div>
									<div class="meta d-flex justify-content-between">
										<p><span class="lnr lnr-bed"></span> Rp. {{ number_format($a->harga_kamar) }} <span class="lnr lnr-stoks"></span>{{$a->stok_kamar}} kamar tersedia</p>
										
									</div>									
								</div>
								<div class="details">
									<a href="/lihat/{{$a->id}}">
										<h4>
                                        {{$a->tipe_kamar}}	
										</h4>
									</a><a href="/liha/{{$a->id}}">Fasilitas kamar :
									<p>
                                    {{$a->fasilitas_kamar}}										
									</p></a>
								</div>
							</div>
                            @endforeach	
														
						</div>
					</div>
				</div>
					
</section>
@endsection


