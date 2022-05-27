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
                    <li class="breadcrumb-item"><a href="/kamar">kamar</a></li>
                    <li class="breadcrumb-item active">{{$kamar->nama_kamar}}</a></li>
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
                            <h4>{{$kamar->nama_kamar}}</h4>
                            <table class="table">
                                <tbody>
                                <tr>
                                        <td>Type</td>
                                        <td>:</td>
                                        <td>{{$kamar->tipe_kamar}}</td>
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
                                        <td>Silahkan Login : </td>
                                        <td>:</td>
                                        <td><a class="nav-link" href="/lihat2/{{$kamar->id}}">Sudah</a></td>
                                        <td><a class="nav-link" href="/lihat2/{{$kamar->id}}">Belum</a></td>
                                
                                    
                                    </tr>
            
                                    

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