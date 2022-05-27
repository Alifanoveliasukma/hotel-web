@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html>
   <head>
      <title>Kamar</title>
   </head>
<body>
<div class="container mt-3">
<h3>Tambah kamar </a></h3>
<form action="/kamar/create" method="POST" enctype="multipart/form-data">
    @csrf

  <div class="form-group">
    <label for="nama_fasilitas">Nama Kamar</label>
    <input type="text" class="form-control" name="nama_kamar">
  </div>
  <div class="form-group">
    <label for="tipe_kamar">Tipe Kamar</label>
    <input type="text" class="form-control" name="tipe_kamar">
  </div>
  <div class="form-group">
    <label for="foto_fasilitas">Gambar</label>
    <input type="file" class="form-control" name="foto_kamar">
  </div>
  <div class="form-group">
    <label for="nama_fasilitas">Fasilitas Kamar</label>
    <input type="text" class="form-control" name="fasilitas_kamar">
  </div>
  <div class="form-group">
    <label for="nama_fasilitas">Jumlah Kamar</label>
    <input type="number" class="form-control" name="stok_kamar">
  </div>
  <div class="form-group">
    <label for="nama_fasilitas">Harga</label>
    <input type="number" class="form-control" name="harga_kamar">
  </div>
  <div class="form-group">
    <label for="nama_fasilitas">Deskripsi</label>
    <input type="text" class="form-control" name="deskripsi_kamar">
  </div>
  

  <button type="submit" class="btn btn-primary">Submit</button>
</form>


@endsection