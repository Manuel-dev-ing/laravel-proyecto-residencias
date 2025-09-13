<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoriasController extends Controller
{
    

    public function index(){

        $query = Categories::where('status', 1)->paginate(10);
        // dd($query);
        return view('categorias.index', [
            'categories' => $query
        ]);
    }

    public function create(){

        return view('categorias.create');
    }


    public function store(Request $request){

        $request->validate([
            'name' => 'required'
        ]);

        Categories::create([
            'name' => $request->name,
            'status' => 1

        ]);

        session()->flash('mensaje', 'Categoria creada correctamente');

        return redirect()->route('categorias.index');
    }   


    public function edit(Categories $category){


        return view('categorias.edit', [
            'category' => $category
        ]);
    }

    public function update(Request $request, Categories $category){
        $request->validate([
            'name' => 'required'
        ]);
        // dd($request->name);
        $categorie = Categories::find($category->id);
        $categorie->name = $request->name;
        $categorie->save();

        if ($categorie->wasChanged()) {
            
            session()->flash('mensaje', 'Categoria actualizada correctamente');
            return redirect()->route('categorias.index');

        }else{
            session()->flash('mensaje', 'Ocurrio un error al actualizar');
            return redirect()->route('categorias.edit', $category);

        }

    }

    public function destroy(Request $request, Categories $category){
        $categorie = Categories::find($category->id);
        // dd($categorie);
        $categorie->status = 0;
        $categorie->save();

        if ($categorie->wasChanged()) {
            
            session()->flash('mensaje', 'Categoria eliminada correctamente');
            return redirect()->route('categorias.index');

        }else{
            session()->flash('mensaje', 'Ocurrio un error al eliminar la categoria');
            return redirect()->route('categorias.index', $category);

        }   

    }


}
