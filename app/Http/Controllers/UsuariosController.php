<?php

namespace App\Http\Controllers;

use App\Models\Rol;
use App\Models\sucursal;
use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UsuariosController extends Controller
{
    

    public function index(){

        $usuarios = User::paginate(10);
        // $usuarios = User::where('rol_id', 1)->get();
        // dd($usuarios);
        

        return view('usuarios.index', [
            "usuarios" => $usuarios
        ]);
    }


    public function create(){

        $sucursales = sucursal::all();
        $rol = Rol::all();
        // dd($rol);

        return view('usuarios.create', [
            "rols" => $rol,
            "sucursales" => $sucursales

        ]);
    }

    public function store(Request $request){

        try {
            
            $request->validate([
                "name" => 'required',
                "first_lastname" => 'required',
                "email" => 'required',
                "rol" => 'required',
                "sucursal" => 'required',
                "password" => 'required|confirmed' 

            ]);

            User::create([
                'name' => $request->name,
                'first_lastname' => $request->first_lastname,
                'second_lastname' => $request->second_lastname,
                'email' => $request->email,
                'rol_id' => $request->rol,
                'sucursal_id' => $request->sucursal,
                'password' => Hash::make($request->password)
            ]);

            session()->flash('mensaje', 'El usuario fue creado correctamente.');

            return redirect()->route('usuarios.index');

        } catch (QueryException $e) {
            return back()->with('error', 'Hubo un problema al guardar: ' . $e->getMessage());
        }catch(\Exception $e){
            // Cualquier otro error
            return back()->with('error', 'Error inesperado: ' . $e->getMessage());
        }
        
    }

    public function edit(User $usuario){
        $sucursales = sucursal::all();
        $rol = Rol::all();

        return view('usuarios.edit', [
            'usuario' => $usuario,
            "rols" => $rol,
            "sucursales" => $sucursales
        ]);
    }

    public function update(Request $request, User $usuario){
        // dd($request->password);
        try {
            
            $request->validate([
                "name" => 'required',
                "first_lastname" => 'required',
                "email" => 'required',
                "rol" => 'required',
                "sucursal" => 'required',
            ]);

            $user = User::find($usuario->id);
            $user->name = $request->name;
            $user->first_lastname = $request->first_lastname;
            $user->second_lastname = $request->second_lastname;
            $user->email = $request->email;
            $user->rol_id = $request->rol;
            $user->sucursal_id = $request->sucursal;
            if ($request->password != null) {
                # code...
                $user->password = Hash::make($request->password);
            }

            $user->save();

            session()->flash('mensaje', 'El usuario fue actualizado correctamente.');
            
            return redirect()->route('usuarios.index'); 

        } catch (QueryException $e) {
            return back()->with('error', 'Hubo un problema al guardar: ' . $e->getMessage());
        }catch(\Exception $e){
            // Cualquier otro error
            return back()->with('error', 'Error inesperado: ' . $e->getMessage());
        }
        

    }
    public function destroy(User $usuario){
      

        try {
            $user = User::find($usuario->id);
                // dd($user);
            $user->delete();
            session()->flash('mensaje', 'Usuario eliminado correctamente.');
            
            return redirect()->route('usuarios.index');


        } catch (QueryException $e) {
            return back()->with('error', 'Hubo un problema al guardar: ' . $e->getMessage());
        }catch(\Exception $e){
            // Cualquier otro error
            return back()->with('error', 'Error inesperado: ' . $e->getMessage());
        }

    }



}
