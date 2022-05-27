
    
                <h4>Bukti Pemesanan</h4>
                <table class="table">
                    <tbody>@foreach($pesanan as $a)
                    <tr>
                            <td>Tanggal dan Waktu</td>
                            <td>:</td>
                            <td>{{$a->tanggal}}</td>
                        </tr>
                        <tr>
                            <td>Nama</td>
                            <td>:</td>
                            <td>{{$a->user->name}}</td>
                        </tr>
                        <tr>
                            <td>Nama Kamar</td>
                            <td>:</td>
                            <td>{{$a->kamar->nama_kamar}}</td>
                        </tr>
                        <tr>
                            <td>Tipe Kamar</td>
                            <td>:</td>
                            <td>{{$a->kamar->tipe_kamar}}</td>
                        </tr>
                        <tr>
                            <td>Harga</td>
                            <td>:</td>
                            <td>Rp. {{ number_format($a->kamar->harga_kamar) }}</td>
                        </tr>
                        <tr>
                            <td>Jumlah</td>
                            <td>:</td>
                            <td>{{$a->jumlah}}</td>
                        </tr>
                        <tr>
                            <td>Jumlah</td>
                            <td>:</td>
                            <td>Rp. {{ number_format($a->jumlah_harga) }}</td>
                        </tr>
                       @endforeach
                    </tbody>
                </table>
                <h2>Semoga betah :)</h2>




  
  



          





          