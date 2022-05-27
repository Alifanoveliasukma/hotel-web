@extends('layouts.frontend')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
                <a href="/history" class="btn btn-primary">Kembali</a>
        </div>
        <div class="col-md-12 mt-3">
            <nav aria-label="breadcrumb">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/kamar">Home</a></li>
                    <li class="breadcrumb-item"><a href="/history">Riwayat Pemesanan</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Detail Pemesanan</li>
                </ul>
            </nav>
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h3>Pembayaran Sukses</h3>
                    
                </div>
            </div>
            <div class="card mt-3">
                <div class="card-body">
                    <h4>Detail Pemesanan</h4>
                    
                    @if(!empty($pesanan))
                    <p align="right">Tanggal Pesan : {{ $pesanan->tanggal}}</p>
                </div>
                <div class="card-body">
                <table class="table table-striped">
               <thead>
                   <tr>
                       <th>NO</th>
                       <th>Tanggal</th>
                       <th>Nama</th>
                       <th>Tipe Kamar</th>
                       <th>Nomer Kamar</th>
                       <th>Harga</th>
                       <th>Jumlah</th>
                       <th>Status</th>
                       <th>Total Bayar</th>
                       
                   </tr>
               </thead>
               <tbody>
                   <?php $no = 1; ?>
                   @foreach($pesanan_details as $pesanan_detail)
                   <tr>
                       <td>{{$no++}}</td>
                       <td>{{$pesanan_detail->pesanan->tanggal}}</td>
                       <td>{{$pesanan_detail->user->name}}</td>
                       <td>{{$pesanan_detail->kamar->tipe_kamar}}</td>
                       <td>{{$pesanan_detail->kamar_id}}</td>
                       <td>Rp. {{ number_format($pesanan_detail->kamar->harga_kamar) }}</td>
                       <td>{{$pesanan_detail->jumlah}}</td>
                       <td class="genric-btn disable radius">@if($pesanan_detail->pesanan->status == 1)
                            Sudah dibayar-menunggu konfirmasi<br> 
                                    @else
                                    Pembayaran diterima <a href="/cetak_pdf/{{$pesanan->id}}"target="_blank">CETAK BUKTI RESERVASI</a>
                                    @endif</td>
                       <td align="right"> Rp. {{ number_format($pesanan_detail->jumlah_harga) }}</td>
                       <td>
                          
                       </td>

                   </tr>
                   @endforeach
                   <tr>
                       <td colspan="4" align =" right"><strong>Total yang harus ditranfer : Rp. {{ number_format($pesanan->kode+$pesanan->jumlah_harga)}}</strong></td>
                        
                   </tr>
               </tbody>
           </table>

           @endif
                
        
    </div>
</div>

@endsection


  
  



          





          