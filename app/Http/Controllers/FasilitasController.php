<?php

namespace App\Http\Controllers;

use App\Models\Fasilitas;
use Illuminate\Http\Request;
use Alert;

class fasilitasController extends Controller
{
    public function index()
    {
        $fasilitas = Fasilitas::all();
        return view('admin.fasilitas', compact(['fasilitas']));
    }

    public function tambah()
    {
        return view('admin.tambah-fasilitas');
    }

    public function store(Request $request)
    {
       $fasilitas = Fasilitas::create($request->all());
       if($request->hasFile('foto_fasilitas')){
           $request->file('foto_fasilitas')->move('images/',$request->file('foto_fasilitas')->getClientOriginalName());
           $fasilitas->foto_fasilitas = $request->file('foto_fasilitas')->getClientOriginalName();
           $fasilitas->save();
       }
       Alert::success('Tambah fasilitas berhasil!', 'Success');
       return redirect('/home');
    }

    public function edit($id)
    {
        $fasilitas = Fasilitas::find($id);
        return view('admin.edit-fasilitas', compact('fasilitas'));
    }
    
    public function update(Request $request, $id)
    {
        $fasilitas = Fasilitas::find($id);
        $fasilitas->update($request->all());
        if($request->hasFile('foto_fasilitas')){
            $request->file('foto_fasilitas')->move('images/',$request->file('foto_fasilitas')->getClientOriginalName());
            $fasilitas->foto_fasilitas = $request->file('foto_fasilitas')->getClientOriginalName();
            $fasilitas->save();
        }
        Alert::success('Update Fasilitas berhasil!', 'Success');
        return redirect('/home'); 
        
    }

    public function delete($id)
    {
        $fasilitas = Fasilitas::find($id);
        $fasilitas->delete();
        Alert::success('Hapus Fasilitas berhasil!', 'Success');
        return redirect('/home');
    }

    public function about()
    {
        return view('hotel.about');
    }

}


