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
                    <li class="breadcrumb-item active" aria-current="page">Check Out</li>
                </ul>
            </nav>
        </div>
        <div class="col-md12">
            <div class="card">
            
                <div class="card-header">
                    <h3>Pemesanan</h3>
                    <p>Pesanan anda sudah sukses. Selanjutnya untuk pembayaran silahkan untuk pembayaran transfer direkening Bank 
BRI Nomer Rekening : 32113-8211312-123 </p>
                    @if(!empty($pesanan))
                    <p align="right">Tanggal Pesan : {{ $pesanan->tanggal}}</p>
                </div>
                <div class="card-body">
                <table class="table table-striped">
               <thead>
                   <tr>
                       <th>NO</th>
                       <th>Nama</th>
                       <th>Tipe Kamar</th>
                       <th>Nomer Kamar</th>
                       <th>Status</th>
                       <th>Harga</th>
                       <th>Jumlah</th>
                       <th>Total Bayar</th>
                       <th>Aksi</th>
                   </tr>
               </thead>
               <tbody>
                   <?php $no = 1; ?>
                   @foreach($pesanan_details as $pesanan_detail)
                   <tr>
                       <td>{{$no++}}</td>
                       <td>{{$pesanan_detail->user->name}}</td>
                       <td>{{$pesanan_detail->kamar->tipe_kamar}}</td>
                       <td>{{$pesanan_detail->kamar_id}}</td>
                       <td>@if($pesanan_detail->status == 1)
                            Proses verikasi
                                    @else
                                    Sudah pesan belum dibayar
                                    @endif</td>
                       <td>{{ number_format($pesanan_detail->kamar->harga_kamar) }}</td>
                       <td>{{$pesanan_detail->jumlah}}</td>
                       <td align="left"> Rp. {{ number_format($pesanan_detail->jumlah_harga) }}</td>
                       
                       <td>
                           <form action="/checkout/{{$pesanan_detail->id}}" method="post">
                               @csrf
                               {{ method_field('DELETE')}}
                                <button  class="btn btn-danger" onclick="return confirm('Anda yakin akan Hapus ?');" type="submit">Hapus</button>
                           </form>
                       </td>

                   </tr>
                   @endforeach
                   <tr>
                       <td colspan="4" align =" right"><strong>Total Harga</strong></td>
                           <td>Rp. {{ number_format($pesanan->jumlah_harga)}}</td>
                           <td>
                               <a href="/konfirmasi/checkout" class="btn btn-success" onclick="return confirm('Anda yakin akan memesan kamar ini ?');">Bayar</a>
                           </td>

                   </tr>
                   
               </tbody>
           </table>
           @endif
                
        
    </div>
</div>

@endsection


  
  



          





          