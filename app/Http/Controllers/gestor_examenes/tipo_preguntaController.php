<?php

namespace App\Http\Controllers\gestor_examenes;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\tipo_preguntum;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;

class tipo_preguntaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index()
    {
        $tipo_pregunta = tipo_preguntum::paginate(15);

        return view('gestor_examenes.tipo_pregunta.index', compact('tipo_pregunta'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {
        return view('gestor_examenes.tipo_pregunta.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return void
     */
    public function store(Request $request)
    {
        $this->validate($request, ['tipo' => 'required', ]);

        tipo_preguntum::create($request->all());

        Session::flash('flash_message', 'tipo_preguntum added!');

        return redirect('gestor_examenes/tipo_pregunta');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return void
     */
    public function show($id)
    {
        $tipo_preguntum = tipo_preguntum::findOrFail($id);

        return view('gestor_examenes.tipo_pregunta.show', compact('tipo_preguntum'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return void
     */
    public function edit($id)
    {
        $tipo_preguntum = tipo_preguntum::findOrFail($id);

        return view('gestor_examenes.tipo_pregunta.edit', compact('tipo_preguntum'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     *
     * @return void
     */
    public function update($id, Request $request)
    {
        $this->validate($request, ['tipo' => 'required', ]);

        $tipo_preguntum = tipo_preguntum::findOrFail($id);
        $tipo_preguntum->update($request->all());

        Session::flash('flash_message', 'tipo_preguntum updated!');

        return redirect('gestor_examenes/tipo_pregunta');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return void
     */
    public function destroy($id)
    {
        tipo_preguntum::destroy($id);

        Session::flash('flash_message', 'tipo_preguntum deleted!');

        return redirect('gestor_examenes/tipo_pregunta');
    }
}
