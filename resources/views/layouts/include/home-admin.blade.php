<section class="popular-course-area section-gap">
				<div class="container">
					<div class="row d-flex justify-content-center">
						<div class="menu-content pb-70 col-lg-8">
							<div class="title text-center">
								<h1 class="mb-10">Dashboard</h1>
								<p>Didesain khusus untuk para tamu istimewa</p>
							</div>
						</div>
					</div>						
					<div class="panel">
                        <div class="panel-heading">
                            <!-- Button trigger modal -->
                            <a class="btn btn-success update-pro" href="#" title="tambah data" data-toggle="modal" data-target="tambahKamar"><i class="fa fa-add"></i> <span>Tambah Kamar</span></a>
                            <!-- Modal -->
                            
                        </div>
                        <div class="panel-body">
                            <table class="table table-hover" >
                                <thead>
                                    <tr>
                                    <th>Gambar</th>
                                    <th>Nama</th>
                                    <th>Tipe Kamar</th>
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
                                               <a class="btn btn-success update-pro" href="#" title="tambah data" data-toggle="modal" data-target="{{'#editKamar' . $k->id}}"><i class="fa fa-add"></i> <span>edit</span></a>
                                                    <div class="modal fade" id="{{'editKamar' . $k->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">Masukan Data</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                <form action="/kamar/{{$k->id}}/update" method="POST" enctype="multipart/form-data">
                                                                    @method('POST')
                                                                        @csrf

                                                                    <div class="form-group">
                                                                        <label for="nama_fasilitas">Nama Kamar</label>
                                                                        <input type="text" class="form-control" name="nama_kamar" value="{{$k->nama_kamar}}">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="tipe_kamar">Tipe Kamar</label>
                                                                        <input type="text" class="form-control" name="tipe_kamar" value="{{$k->tipe_kamar}}">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="foto_fasilitas">Gambar</label>
                                                                        <input type="file" class="form-control" name="foto_kamar" value="{{$k->foto_kamar}}">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="nama_fasilitas">Fasilitas Kamar</label>
                                                                        <input type="text" class="form-control" name="fasilitas_kamar" value="{{$k->fasilitas_kamar}}">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="nama_fasilitas">Jumlah Kamar</label>
                                                                        <input type="number" class="form-control" name="stok_kamar" value="{{$k->stok_kamar}}">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="nama_fasilitas">Harga</label>
                                                                        <input type="number" class="form-control" name="harga_kamar" value="{{$k->harga_kamar}}">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="nama_fasilitas">Deskripsi</label>
                                                                        <input type="text" class="form-control" name="deskripsi_kamar" value="{{$k->deskripsi_kamar}}">
                                                                    </div>
                                                                    

                                                                    <button type="submit" class="btn btn-primary">Submit</button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <a href="/kamar/{{$k->id}}/hapus" class="btn btn-danger update-pro" onclick="return confirm('Anda yakin hapus data ini? ?');">Hapus</a>
                                            </td>                                
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            </div>
                        </div>
                            <div class="panel">
                            <div class="panel-heading">
                                <!-- Button trigger modal -->
                                <a class="btn btn-success update-pro" href="#" title="tambah data" data-toggle="modal" data-target="tambahFasilitas"><i class="fa fa-add"></i> <span>Tambah Fasilitas</span></a>
                                <!-- Modal -->
                                
                            </div>
                            <div class="panel-body">
                                <table class="table table-hover" id="datatable">
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
                                               <a class="btn btn-success update-pro" href="#" title="tambah data" data-toggle="modal" data-target="{{'#editFasilitas' . $f->id}}"><i class="fa fa-add"></i> <span>edit</span></a>
                                                    <div class="modal fade" id="{{'editFasilitas' . $f->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">Masukan Data</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>

                                                                <div class="modal-body">

                                                                <form action="/fasilitas/{{$f->id}}/update" method="POST" enctype="multipart/form-data">
                                                                        @csrf

                                                                    <div class="form-group">
                                                                        <label for="nama_fasilitas">Nama Fasilitas</label>
                                                                        <input type="text" class="form-control" name="nama_fasilitas" value="{{$f->nama_fasilitas}}">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="foto_fasilitas">Foto</label>
                                                                        <input type="file" class="form-control" name="foto_fasilitas" value="{{$f->foto_fasilitas}}">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="deskripsi_fasilitas">Deskripsi</label>
                                                                        <input type="text" class="form-control" name="deskripsi_fasilitas" value="{{$f->deskripsi_fasilitas}}">
                                                                    </div>
                                                                    

                                                                    <button type="submit" class="btn btn-primary">Submit</button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <a href="/fasilitas/{{$f->id}}/hapus" class="btn btn-danger update-pro" onclick="return confirm('Anda yakin hapus data ini ?');">Hapus</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
				</div>
                <div class="modal fade" id="tambahFasilitas" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Masukan Data</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
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
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="tambahKamar" tabindex="-1" role="dialog" aria-labelledby="cekStatusModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Masukan Data</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
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

        </div>
    </div>
</div>
					
</section>