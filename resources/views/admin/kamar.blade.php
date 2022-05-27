@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html>
   <head>
      <title>Kamar</title>
   </head>
<body>
    <div class="container">
    <h3><a href="/kamar/tambah">Tambah kamar </a></h3>
    <h3><a href="/home">Dashboard </a></h3>
    <table class="table table-striped">
        <thead>
            <tr>
              <th>Gambar</th>
              <th>Nama</th>
              <th>tipe</th>
              <th>Fasilitas Kamar</th>
              <th>Jumlah Kamar</th>
              <th>Harga Kamar</th>
              <th>Deskripsi Kamar</th>
              <th>Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach( $kamar as $k)
            <tr>
                
              <td><img src="{{asset('images/'.$k->foto_kamar)}}" width="100" height="100"></td>
              <td>{{$k->nama_kamar}}</td>
              <td>{{$k->tipe_kamar}}</td>
              <td>{{$k->fasilitas_kamar}}</td>
              <td>{{$k->stok_kamar}}</td>
              <td>Rp. {{ number_format($k->harga_kamar) }}</td>
              <td>{{$k->deskripsi_kamar}}</td>
              <td>
              <a href="/kamar/edit/{{$k->id}}">Edit</a> |
              <a href="/kamar/{{$k->id}}/hapus">Hapus</a>
              </td>
            
            </tr>
            @endforeach
        </tbody>
    </table>
    </div>
</body>
</html>
@endsection