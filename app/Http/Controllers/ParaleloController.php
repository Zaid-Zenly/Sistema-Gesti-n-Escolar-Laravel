<?php

namespace App\Http\Controllers;

use App\Models\Paralelo;
use App\Http\Controllers\Controller;
use App\Models\Grado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ParaleloController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $grados = Grado::with('paralelos')
        ->orderBy('nombre', 'asc')
        ->get();
        return view('admin.paralelos.index', compact('grados'));
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
            'grado_id_create' => 'required|exists:grados,id',
        ]);

        $paralelo = new Paralelo();
        $paralelo->grado_id = $request->input('grado_id_create');
        $paralelo->nombre = $request->input('nombre_create');
        $paralelo->save();

        return redirect()->route('admin.paralelos.index')
            ->with('mensaje', 'Paralelo registrado exitosamente.')
            ->with('icono', 'success');
    }

    /**
     * Display the specified resource.
     */
    public function show(Paralelo $paralelo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Paralelo $paralelo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validate = Validator::make($request->all(), [
            'grado_id' => 'required|exists:grados,id',
            'nombre' => 'required|string|max:255',
        ]);

        if ($validate->fails()) {
            return redirect()
                ->back()
                ->withErrors($validate)
                ->withInput()
                ->with('modal_id', $id);
        }

        $paralelo = Paralelo::find($id);
        $paralelo->grado_id = $request->input('grado_id');
        $paralelo->nombre = $request->input('nombre');
        $paralelo->save();

        return redirect()->route('admin.paralelos.index')
            ->with('mensaje', 'Paralelo actualizado exitosamente.')
            ->with('icono', 'success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $paralelo = Paralelo::find($id);
        $paralelo->delete();

        return redirect()->route('admin.paralelos.index')
            ->with('mensaje', 'Paralelo eliminado exitosamente.')
            ->with('icono', 'success');
    }
}
