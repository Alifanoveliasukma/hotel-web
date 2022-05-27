@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html>
   <head>
      <title>Fasilitas</title>
   </head>
<body>
<div class="container mt-3">
<h3>Update Fasilitas </a></h3>
<form action="/fasilitas/{{$fasilitas->id}}/update" method="POST" enctype="multipart/form-data">
    @csrf

  <div class="form-group">
    <label for="nama_fasilitas">Nama Fasilitas</label>
    <input type="text" class="form-control" name="nama_fasilitas" value="{{$fasilitas->nama_fasilitas}}">
  </div>
  <div class="form-group">
    <label for="foto_fasilitas">Foto</label>
    <input type="file" class="form-control" name="foto_fasilitas" value="{{$fasilitas->foto_fasilitas}}">
  </div>
  <div class="form-group">
    <label for="deskripsi_fasilitas">Deskripsi</label>
    <input type="text" class="form-control" name="deskripsi_fasilitas" value="{{$fasilitas->deskripsi_fasilitas}}">
  </div>
  

  <button type="submit" class="btn btn-primary">Submit</button>
</form>


@endsection