<?php

namespace App\Http\Controllers;

use App\Models\kamar;
use App\Models\PesananDetail;
use Illuminate\Http\Request;
use PDF;
use Alert;

class KamarController extends Controller
{
    public function index()
    {
        $kamar = kamar::all();
        return view('admin.kamar', compact(['kamar']));
    }

    public function tambah()
    {
        return view('admin.tambah-kamar');
    }

    public function store(Request $request)
    {
       $kamar = Kamar::create($request->all());
       if($request->hasFile('foto_kamar')){
           $request->file('foto_kamar')->move('images/',$request->file('foto_kamar')->getClientOriginalName());
           $kamar->foto_kamar = $request->file('foto_kamar')->getClientOriginalName();
           $kamar->save();
       }
       Alert::success('Tambah kamar berhasil!', 'Success');
       return redirect('/home');
    }

    public function edit($id)
    {
        $kamar = Kamar::find($id);
        return view('admin.edit-kamar', compact('kamar'));
    }
    
    public function update(Request $request, $id)
    {
        $kamar = Kamar::find($id);
        $kamar->update($request->all());
        if($request->hasFile('foto_kamar')){
            $request->file('foto_kamar')->move('images/',$request->file('foto_kamar')->getClientOriginalName());
            $kamar->foto_kamar = $request->file('foto_kamar')->getClientOriginalName();
            $kamar->save();
        }
        Alert::success('Update kamar berhasil!', 'Success');
        return redirect('/home');
        
    }

    public function delete($id)
    {
        $kamar = Kamar::find($id);
        $kamar->delete();
        Alert::success('Hapus kamar berhasil!', 'Success');
        return redirect('/home');
    }

    public function about()
    {
        return view('hotel.about');
    }

    public function cetak_pdf()
    {
    	$pesanan = PesananDetail::all();
 
    	$pdf = PDF::loadview('resepsionis.laporan_reservasi',compact(['pesanan']));
    	return $pdf->download('laporan-reservasi.pdf');
    }

    public function ser_checkin(Request $request)
    {
        
        if($request->has('search')){
            $pesanan_detail = PesananDetail::where('checkin','LIKE',"%".$request->search."%")->paginate(50);
    
        }else{ 
            $pesanan_detail = PesananDetail::paginate(50);
        }
        
        return view('home', compact(['pesanan_detail']));
    }

    

    public function filtering(Request $request)
    {
        if($request->has('search')){
            $pesanan_detail = PesananDetail::where('name', 'LIKE', "%".$request->search."%")->paginate(50);
        }else{ 
            $pesanan_detail = PesananDetail::paginate(50);
        }
        
        return view('home', compact(['pesanan_detail']));
    }

}
