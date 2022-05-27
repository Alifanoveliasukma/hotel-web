<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Alert;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = User::where('id', Auth::user()->id)->first();
        return view('profile.index', compact(['user']));
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'password' => 'confirmed',
        ]);

        $user = User::where('id', Auth::user()->id)->first();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->nohp = $request->nohp;
        
        if(!empty($request->password))
        {
            $user->password = Hash::make($request->password);
        }
        $user->update();

        Alert::success('Profil berhasil di update !', 'Success');
        return redirect('home');
    }

}
