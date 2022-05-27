@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html>
   <head>
      <title>Kamar</title>
   </head>
<body>
<div class="container mt-3">
<h3>Tambah Fasilitas </a></h3>
<form action="/fasilitas/create" method="POST" enctype="multipart/form-data">
    @csrf

  <div class="form-group">
    <label for="nama_fasiitas">Nama Fasilitas</label>
    <input type="text" class="form-control" name="nama_fasilitas">
  </div>
  <div class="form-group">
    <label for="foto_fasilitas">Gambar</label>
    <input type="file" class="form-control" name="foto_fasilitas">
  </div>
  <div class="form-group">
    <label for="deskripsi_fasilitas">Deskripsi Fasilitas</label>
    <input type="text" class="form-control" name="deskripsi_fasilitas">
  </div>
  

  <button type="submit" class="btn btn-primary">Submit</button>
</form>


@endsection