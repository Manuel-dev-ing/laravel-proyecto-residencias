<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegistroController extends Controller
{
    public function create(){

        return view('register');
    }

    public function store(Request $request){
        $request->validate([
            'nombre' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);

        User::create([
            'name' => $request->nombre,
            'email' => $request->email,
            'password' => Hash::make($request->password) 
        ]);
        Auth::attempt([
            'email' => $request->email,
            'password' => $request->passwprd
        ]);

        return redirect()->route('dashboard');
    }
}
