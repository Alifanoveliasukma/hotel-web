@extends('layouts.frontend')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
                <a href="/kamar" class="btn btn-primary">Kembali</a>
        </div>
        <div class="col-md-12 mt-3">
            <nav aria-label="breadcrumb">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/kamar">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Riwayat Pemesanan</li>
                </ul>
            </nav>
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>Riwayat Pemesanan</h3>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal</th>
                                <th>Status</th>
                                <th>Jumlah Harga</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $no = 1; ?>
                            @foreach($pesanan as $pesanans)
                            <tr>
                                <td>{{$no++}}</td>
                                <td>{{$pesanans->tanggal}}</td>
                                <td>
                                    @if($pesanans->status == 1)
                                    Menunggu verifikasi
                                    @else
                                    sudah di verifikasi
                                    @endif
                                </td>
                                
                                <td>
                                    <a href="/history/{{$pesanans->id}}" class="btn btn-primary">Detail</a>
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

@endsection


  
  



          





          