@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html>
   <head>
      <title>Kamar</title>
   </head>
<body>
<div class="container">
<h3><a href="/fasilitas/tambah">Tambah Fasilitas </a></h3>
<h3><a href="/home">Dashboard </a></h3>
<table class="table table-striped">
    <thead>
        <tr>
          <th>Foto</th>
          <th>Nama</th>
          <th>Deskripsi</th>
          <th>Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach( $fasilitas as $f)
        <tr>
            
          <td><img src="{{asset('images/'.$f->foto_fasilitas)}}" width="100" height="100"></td> 
          <td>{{$f->nama_fasilitas}}</td>
          <td>{{$f->deskripsi_fasilitas}}</td>
          <td>
          <a href="/fasilitas/edit/{{$f->id}}">Edit</a> |
          <a href="/fasilitas/{{$f->id}}/hapus">Hapus</a>
          </td>
         
        </tr>
        @endforeach
    </tbody>
</table>
</div>
</body>
</html>
@endsection