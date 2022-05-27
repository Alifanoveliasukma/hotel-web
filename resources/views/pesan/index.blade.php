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
                    <li class="breadcrumb-item active">{{$kamar->tipe_kamar}}</a></li>
                </ul>
            </nav>
        </div>
        <div class="col-md-12 mt-1">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <img src="{{asset('images/'.$kamar->foto_kamar)}}" class="rounded mx-auto d-block" width="100%" alt="">
                        </div>
                        <div class="col-md-6 mt-6">
                            <h4>{{$kamar->tipe_kamar}}</h4>
                            <table class="table">
                                <tbody>
                                <tr>
                                        <td>No</td>
                                        <td>:</td>
                                        <td>{{$kamar->nama_kamar}}</td>
                                    </tr>
                                    <tr>
                                        <td>Harga</td>
                                        <td>:</td>
                                        <td>Rp. {{ number_format($kamar->harga_kamar)}}</td>
                                    </tr>
                                    <tr>
                                        <td>Tersedia</td>
                                        <td>:</td>
                                        <td>{{ number_format($kamar->stok_kamar)}}</td>
                                    </tr>
                                    <tr>
                                        <td>Fasilitas</td>
                                        <td>:</td>
                                        <td>{{$kamar->fasilitas_kamar}}</td>
                                    </tr>
                                    <tr>
                                        <td>Deskripsi</td>
                                        <td>:</td>
                                        <td>{{$kamar->deskripsi_kamar}}</td>
                                    </tr>
                                    <tr>
                                    @guest
                                        <td>@if (Route::has('login'))
                                        <a  class="genric-btn success-border" href="/pesan/{{$kamar->id}}" >Login</a>
                                        @endif</td>                                
                                    @else
                                        
                                        <td>Jumlah Pesan</td>
                                        <td>:</td>
                                        <td>
                                            <form method="post" action="{{('/pesan/'.$kamar->id)}}">
                                                @csrf

                                                <input type="number" id="jumlah_harga" name="jumlah_harga" class="form-control" min="1" max="{{$kamar->stok_kamar}}">
                                              
                                                <p>Check In</p>
                                                <input type="date" name="checkin" class="form-control" required="" min='<?= date('Y-m-d'); ?>'>
                                                <p>Check Out</p>
                                                <input type="date" name="checkout" class="form-control" required="" min='<?= date('Y-m-d'); ?>'>
                                                <button type="submit" class="genric-btn success-border" onclick="return confirm('Anda yakin akan Booking kamar ini ?');">Booking</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endguest
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection