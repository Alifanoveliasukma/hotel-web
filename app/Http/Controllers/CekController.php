<?php

namespace App\Http\Controllers;

use App\Models\kamar; 
use Illuminate\Http\Request;

class CekController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function cek($id)
    {
        $kamar = kamar::where('id', $id)->first();
        return view('pesan.index', compact(['kamar']));
    }
}
