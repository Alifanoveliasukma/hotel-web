<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use App\Models\PesananDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDF;

class HistoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status', '!=', 0 )->get();
        return view('history.index', compact(['pesanan']));
    }

    public function detail($id)
    {
        $pesanan = Pesanan::where('id', $id)->first();
        $pesanan_details = PesananDetail::where('pesanan_id', $pesanan->id)->get();

        return view('history.detail', compact(['pesanan', 'pesanan_details']));
    }

    public function cetak_pdf($id)
    {
        
        $data = Pesanan::find($id);
       
        $pesanan = PesananDetail::where('id' , '=', $data->id )->get();
        
 
    	$pdf = pdf::loadview('history.cetak-reservasi',compact(['pesanan']));
    	return $pdf->download('cetak-reservasi.pdf');
    }
}
