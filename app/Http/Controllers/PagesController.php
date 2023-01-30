<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;

class PagesController extends Controller
{
    public function inicio()
    {
        $apps = [
            ["name" => "notas", "descripcion" => "App de notas"],
            ["name" => "noticias", "descripcion" => "App de noticias con API"],
        ];

        $appsJSON = json_encode($apps);

        return view('apps', compact('apps'));
    }

    public function notas()
    {
        $notas = App\Nota::paginate(5);
        return view('notas.home', compact('notas'));
    }

    public function detalle($id)
    {
        $notas = App\Nota::all();
        $nota = App\Nota::findOrFail($id);
        return view('notas.detalle', compact('nota', 'notas'));
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
        $nota = App\Nota::findOrFail($id);
        return view('notas.editar', compact('nota'));
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
    {
        return view('noticias.noticias', compact('noticias'));
    }
}
