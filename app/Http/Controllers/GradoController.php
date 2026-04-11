<?php

namespace App\Http\Controllers;

use App\Models\Grado;
use App\Models\Nivel;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class GradoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $niveles = Nivel::with('grados')
        ->orderBy('nombre', 'asc')
        ->get();
        return view('admin.grados.index', compact('niveles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre_create' => 'required|string|max:255',
            'nivel_id_create' => 'required|exists:nivels,id',
        ]);

        $grado = new Grado();
        $grado->nivel_id = $request->input('nivel_id_create');
        $grado->nombre = $request->input('nombre_create');
        $grado->save();

        return redirect()->route('admin.grados.index')
            ->with('mensaje', 'Grado registrado exitosamente.')
            ->with('icono', 'success');
    }

    /**
     * Display the specified resource.
     */
    public function show(Grado $grado)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Grado $grado)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validate = Validator::make($request->all(), [
            'nivel_id' => 'required|exists:nivels,id',
            'nombre' => 'required|string|max:255',
        ]);

        if ($validate->fails()) {
            return redirect()
                ->back()
                ->withErrors($validate)
                ->withInput()
                ->with('modal_id', $id);
        }

        $grado = Grado::find($id);
        $grado->nivel_id = $request->input('nivel_id');
        $grado->nombre = $request->input('nombre');
        $grado->save();

        return redirect()->route('admin.grados.index')
            ->with('mensaje', 'Grado actualizado exitosamente.')
            ->with('icono', 'success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $grado = Grado::findOrFail($id);
        $grado->delete();

        return redirect()->route('admin.grados.index')
            ->with('mensaje', 'Grado eliminado exitosamente.')
            ->with('icono', 'success');
    }
}
