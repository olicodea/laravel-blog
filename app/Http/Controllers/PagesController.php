<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;

class PagesController extends Controller
{
    public function inicio()
    {
        $position = "absolute";
        $apps = [
            ["name" => "notas", "descripcion" => "App de notas"],
            ["name" => "noticias", "descripcion" => "App de noticias con API"],
        ];

        $appsJSON = json_encode($apps);

        return view('apps', compact('apps', 'position'));
    }

    public function notas()
    {
        $position = "absolute";
        $notas = App\Nota::paginate(5);
        return view('notas.home', compact('notas', 'position'));
    }

    public function detalle($id)
    {
        $position = "absolute";
        $notas = App\Nota::all();
        $nota = App\Nota::findOrFail($id);
        return view('notas.detalle', compact('nota', 'notas', 'position'));
    }

    public function crear(Request $request)
    {
        //return $request->all();

        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required'
        ]);

        $notaNueva = new App\Nota;
        $notaNueva->nombre = $request->nombre;
        $notaNueva->descripcion = $request->descripcion;
        $notaNueva->save();
        return back()->with('mensaje', 'Nota agregada!');
    }

    public function editar($id)
    {
        $position = "absolute";
        $nota = App\Nota::findOrFail($id);
        return view('notas.editar', compact('nota', 'position'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required'
        ]);

        $notaUpdate = App\Nota::findOrFail($id);
        $notaUpdate->nombre = $request->nombre;
        $notaUpdate->descripcion = $request->descripcion;
        $notaUpdate->save();
        return back()->with('mensaje', 'Nota editada!');
    }

    public function eliminar($id)
    {
        $notaEliminar = App\Nota::findOrFail($id);
        $notaEliminar->delete();
        return back()->with('mensaje', 'Nota eliminada!');
    }

    public function noticias()
    {   $position = "";
        return view('noticias.noticias', compact('noticias', 'position'));
    }

    public function bebidas(){
        $position = "absolute";
        return view('bebidas.bebidas', compact('bebidas', 'position'));
    }
}
