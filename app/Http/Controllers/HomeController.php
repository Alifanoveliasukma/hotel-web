<?php

namespace App\Http\Controllers;

use App\Models\Fasilitas;
use App\Models\kamar;
use App\Models\Pesanan;
use App\Models\PesananDetail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        
        $fasilitas = Fasilitas::all();
        $kamar = kamar::all();
        $pesanan_detail = PesananDetail::all();
        $role = User::all();
        $user = User::where('id', Auth::user()->id)->first();

        if (auth()->user()->role == $role) {
            $role = 'admin';
            return view('home', compact(['pesanan_detail', 'kamar', 'fasilitas', 'role', 'user']));
        }else {
            $role = 'resepsionis';
            return view('home', compact(['pesanan_detail', 'kamar', 'fasilitas', 'role', 'user']));
        }
        return redirect('/')->with('role', $role);       
    }

    public function verifi($id)
    {
        $data = Pesanan::find($id);
        Pesanan::where('id','=', $id)->update([
            'status' => 2 ##Pembayaran Sukses
            
        ]);
        return redirect()->route('home');
    }

    public function checkin($id)
    {
        $data = PesananDetail::find($id);
        Pesanan::where('id', $id)->update([
            'status' => 3 ##Check in
        ]);
        return redirect()->route('home');
    }

    public function checkout($id)
    {
        $data = PesananDetail::find($id);
        Pesanan::where('id', $id)->update([
            'status' => 4 ##Checkout
        ]);
        return redirect()->route('home');
    }
    }

