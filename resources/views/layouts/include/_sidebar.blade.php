<div id="sidebar-nav" class="sidebar">
	<div class="sidebar-scroll">
		<nav>
			<ul class="nav">
				@if(auth()->user()->role == 'admin')
				<li><a href="/home" class="active"><i class="lnr lnr-pencil"></i> <span>Crud fasilitas dan kamar</span></a></li>
				
				@endif
				@if(auth()->user()->role == 'resepsionis')
				<li><a href="/home" class="active"><i class="lnr lnr-pencil"></i> <span>Pembayaran</span></a></li>
				
				@endif
				@if(auth()->user()->role == 'guest')
				<li><a href="/kamar" class="active"><i class="lnr lnr-pencil"></i> <span>Lihat Kamar</span></a></li>
				<li><a href="/fasilitas" class="active"><i class="lnr lnr-pencil"></i> <span>Lihat Fasilitas</span></a></li>
				<li><a href="/history" class="active"><i class="lnr lnr-pencil"></i> <span>Transaksi</span></a></li>
	
				@endif
				

			</ul>
		</nav>
	</div>
</div>