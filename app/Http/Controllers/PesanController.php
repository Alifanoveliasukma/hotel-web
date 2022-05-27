<?php

namespace App\Http\Controllers;

use App\Models\kamar;
use App\Models\Pesanan;
use App\Models\PesananDetail;
use App\Models\User;
use Alert;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PesanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index($id)
    {
        $pesanan_detail = PesananDetail::all();
        $kamar = kamar::where('id', $id)->first();
        return view('pesan.index', compact(['kamar', 'pesanan_detail']));
    }

    public function pesan(Request $request, $id)
    {
        $user = User::where('id', '=', $id)->first();
        $kamar = Kamar::where('id', '=', $id)->first();
        $tanggal = Carbon::now();

        //validasi apakah melebihi stok
        if($request->jumlah_harga <=0 )
        {
            Alert::error('Jumlah pesan tidak boleh lebih kecil dari 0 atau sama dengan 0');
            return redirect('pesan/'.$id);
        }
        if($request->jumlah_harga > $kamar->stok_kamar)
        {
            Alert::error('Masukkan nilai pesanan tidak lebih dari jumlah ketersediaan kamar.');
            return redirect('pesan/'.$id);
        }
        if($request->checkin >= $request->checkout)
        {
            Alert::error('Dilarang masukkan tanggal berakhir sebelum tanggal mulai dan tanggal saat memesan.');
            return redirect('pesan/'.$id);
        }
    
        //cek validasi
        $cek_pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status', 0)->first();
        //simpan ke database pesanan
        if(empty($cek_pesanan))
        {
            
            $pesanan = new Pesanan;
            $pesanan->user_id= Auth::user()->id;
            $pesanan->tanggal = $tanggal;
            $pesanan->status = 0;
            $pesanan->jumlah_harga = 0;
            $pesanan->kode = mt_rand(1000, 9999);
            $pesanan->save();
        }
        //simpan ke db pesanan detail
        $pesanan_baru = Pesanan::where('user_id', Auth::user()->id)->where('status', 0)->first();
        
        $cek_pesanan_detail = PesananDetail::where('kamar_id', $kamar->id)->where('pesanan_id', $pesanan_baru->id)->first();
        if(empty($cek_pesanan_detail))
        {
            $pesanan_detail = new PesananDetail;
            $pesanan_detail->user_id = Auth::user()->id;
            $pesanan_detail->name = Auth::user()->name;
            $pesanan_detail->nama_kamar = $kamar->nama_kamar;
            $pesanan_detail->kamar_id = $kamar->id;
            $pesanan_detail->tanggal = $tanggal;
            $pesanan_detail->pesanan_id = $pesanan_baru->id;
            $pesanan_detail->jumlah = $request->jumlah_harga;
            $pesanan_detail->checkin = $request->checkin;
            $pesanan_detail->checkout = $request->checkout;
            $pesanan_detail->jumlah_harga = $kamar->harga_kamar*$request->jumlah_harga;
            $pesanan_detail->save();
        }else
        {
        $pesanan_detail = PesananDetail::where('kamar_id', $kamar->id)->where('pesanan_id', $pesanan_baru->id)->first();
        $pesanan_detail->jumlah = $pesanan_detail->jumlah+$request->jumlah_harga;
        
        $harga_pesanan_detail_baru = $kamar->harga_kamar*$request->jumlah_harga;
        $pesanan_detail->jumlah_harga = $pesanan_detail->jumlah_harga+$harga_pesanan_detail_baru;
        $pesanan_detail->update();
        } 

        //jumlah total
        $pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status', 0)->first();
        $pesanan->jumlah_harga = $pesanan->jumlah_harga+$kamar->harga_kamar*$request->jumlah_harga;
        $pesanan->update();

        Alert::success('Pesanan telah masuk ke list!', 'Success');
        return redirect('/checkout');
    }

    public function checkout()
    {
        $pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status', 0)->first();
        $pesanan_details = [];
        if(!empty($pesanan))
        {
            $pesanan_details = PesananDetail::where('pesanan_id', $pesanan->id)->get();
        }

        return view('pesan.checkout', compact(['pesanan', 'pesanan_details']));
    }

    public function delete($id) 
    {
        $pesanan_detail = PesananDetail::where('id', $id)->first();

        $pesanan = Pesanan::where('id', $pesanan_detail->pesanan_id)->first();
        $pesanan->jumlah_harga = $pesanan->jumlah_harga-$pesanan_detail->jumlah_harga;
        $pesanan->update();

        $pesanan_detail->delete();

        Alert::success('Pesanan berhasil dihapus!', 'Success');
        return redirect('/checkout');
    }

    public function konfirmasi(Request $request)
    {
        $user = User::where('id', Auth::user()->id)->first();

        
        if(empty($user->nohp))
        {
            Alert::error('Indentitas Harap dilengkapi', 'Error');
            return redirect('/home');
        }

        $pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status', 0)->first();
        $pesanan_id = $pesanan->id;
        $pesanan->status = 1;
        $pesanan->update();

        $pesanan_details = PesananDetail::where('pesanan_id', $pesanan_id)->get();
        foreach($pesanan_details as $pesanan_detail) {
            $kamar = Kamar::where('id', $pesanan_detail->kamar_id)->first();
            $kamar->stok_kamar = $kamar->stok_kamar - $pesanan_detail->jumlah;
            $kamar->update();
        }

        Alert::success('Pembayaran Sukses!', 'Success');
        return redirect('history/'.$pesanan->id);   
    }

   
}
