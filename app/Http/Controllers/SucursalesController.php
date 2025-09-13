<?php

namespace App\Http\Controllers;

use App\Models\sucursal;
use Illuminate\Http\Request;

class SucursalesController extends Controller
{
    

    public function index(){
        $sucursales = sucursal::where('status', 1)->paginate(10);
        // dd($sucursales);

        return view('sucursales.index', [
            'sucursales' => $sucursales
        ]);
    }


    public function create(){

        return view('sucursales.create');
    }

    public function store(Request $request){
        // dd($request->name);
        
        $request->validate([
            'name' => 'required',
            'phone_number' => 'required',
            'number' => 'required', 
            'street' => 'required',
            'neighborhood' => 'required',
            'city' => 'required'
        ]);

        sucursal::create([
            'name' => $request->name,
            'phone_number' => $request->phone_number,
            'number' => $request->number,
            'street' => $request->street,
            'neighborhood' => $request->neighborhood,
            'city' => $request->city,
            'status' => 1
        ]);
        
        session()->flash('mensaje', 'La sucursal se guardo correctamente');

        return redirect()->route('sucursales.index');
    }

    public function edit(sucursal $sucursal){

        // dd($sucursal);

        return view('sucursales.edit', [
            'sucursal' => $sucursal
        ]);
    }

    public function update(Request $request, sucursal $sucursal){
        // dd($sucursal->id);
        $request->validate([
            'name' => 'required',
            'phone_number' => 'required',
            'number' => 'required', 
            'street' => 'required',
            'neighborhood' => 'required',
            'city' => 'required'
        ]);

        $sucursals = sucursal::find($sucursal->id);
        // dd($sucursals);
        $sucursals->name = $request->name;
        $sucursals->phone_number = $request->phone_number;
        $sucursals->number = $request->number;
        $sucursals->street = $request->street;
        $sucursals->neighborhood = $request->neighborhood;
        $sucursals->city = $request->city;
        $sucursals->save();

        session()->flash('mensaje', 'La sucursal se actualizo correctamente');

        return redirect()->route('sucursales.index');

    }


    public function destroy(sucursal $sucursal){
        $sucursals = sucursal::find($sucursal->id);
        $sucursals->status = 0;
        $sucursals->save();
        // dd();
        if ($sucursals->wasChanged('status')) {
            
            session()->flash('mensaje', 'La sucursal se elimino correctamente');
            return redirect()->route('sucursales.index');
        }else{
            session()->flash('mensaje', 'Ocurrio un error al eliminar la sucursal');
            return redirect()->route('sucursales.index');
        }

    }


}
