<?php

namespace App\Http\Controllers;

use App\Models\Fasilitas;
use App\Models\kamar;
use Illuminate\Http\Request;

class TamuController extends Controller
{
    public function index()
    {
        $kamar = kamar::all();
        $fasilitas = Fasilitas::all();
        return view('welcome', compact(['kamar', 'fasilitas']));
    }
    public function kamar()
    {
        $kamar = kamar::all();
        return view('tamu.kamar', compact('kamar'));
    }

    public function fasilitas()
    {
        $fasilitas = Fasilitas::all();
        return view('tamu.fasilitas', compact('fasilitas'));
    }

    public function lihat($id)
    {
        $kamar = kamar::where('id', $id)->first();
        return view('pesan.index', compact(['kamar']));
    }
}
