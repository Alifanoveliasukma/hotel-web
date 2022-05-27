@if(auth()->user()->role == 'resepsionis')
<div class="main">
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel">
                        <div class="panel-heading">

                        <div class="row g-3 align-items-center mt-2 mb-3">
                            <div class="col-auto">
                                <label>Cari berdasarkan Nama tamu</label>
                                <form action="/filtering" method="get">
                                    <input type="search" id="inputPassword6" name="search" class="form-control">
                                </form>
                                <label>Cari berdasarkan Tanggal checkin</label>
                                <form action="/filtering/checkin" method="get">
                                    <input type="search" id="inputPassword6" name="search" class="form-control">
                                </form>
                            </div>
                        </div>
                        <div class="form-group">
                        <div class="form-group">
                
                    </div>
                        <div class="panel-body">
                            <table class="table table-hover" id="datatable">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Id Tamu</th>
                                    <th>Nama Tamu</th>
                                    <th>Tipe Kamar</th>
                                    <th>No Kamar</th>
                                    <th>Id pesanan</th>
                                    <th>Check In</th>
                                    <th>Check Out</th>
                                    <th>Tanggal</th>
                                    <th>Jumlah kamar</th>
                                    <th>Total</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                                </thead>
                                    <tbody>
                                    <?php $no = 1; ?>
                                    @foreach($pesanan_detail as $d)
                                    <tr>
                                        <td>{{$no++}}</td>
                                        <td>{{$d->user_id}}</td>
                                        <td>{{$d->name}}</td>
                                        <td>{{$d->kamar->tipe_kamar}}</td>
                                        <td>{{$d->kamar->nama_kamar}}</td>
                                        <td>{{$d->pesanan_id}}</td>
                                        <td>{{$d->checkin}}</td>
                                        <td>{{$d->checkout}}</td>
                                        <td>{{$d->pesanan->tanggal}}</td>
                                        <td>{{$d->jumlah}}</td>
                                        <td>Rp. {{ number_format($d->jumlah_harga) }}</td>
                                        <td>@if($d->pesanan->status == 1)
                                            Pembayaran diterima
                                                @elseif($d->pesanan->status == 2)
                                                Pembayaran Selesai
                                                @elseif($d->pesanan->status == 3)
                                                Check in
                                                @else($d->pesanan->status == 4)
                                                Check Out
                                                @endif
                                                                
                                        </td>
                                        <td>@if($d->pesanan->status == 1)
                                        <a href="/verifikasi/{{$d->id}}" onclick="return confirm('Anda yakin akan konfirmasi ?');">Check in</a>
                                                @elseif($d->pesanan->status == 2)
                                                <a href="/checkin/{{$d->id}}" onclick="return confirm('Anda yakin? ?');">Check In</a>
                                                @elseif($d->pesanan->status == 3)
                                                <a href="/checkout/{{$d->id}}" onclick="return confirm('Anda yakin ? ?');">Check Out</a>
                                                @else($d->pesanan->status == 4)
                                                Selesai
                                                @endif
                                        </td>

                                    </tr>
         
                                        @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endif
