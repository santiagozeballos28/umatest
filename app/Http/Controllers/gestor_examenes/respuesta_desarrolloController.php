<?php

namespace App\Http\Controllers\gestor_examenes;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\respuesta_desarrollo;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;

class respuesta_desarrolloController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index()
    {
        $respuesta_desarrollo = respuesta_desarrollo::paginate(15);

        return view('gestor_examenes.respuesta_desarrollo.index', compact('respuesta_desarrollo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {
        return view('gestor_examenes.respuesta_desarrollo.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return void
     */
    public function store(Request $request)
    {
        $this->validate($request, ['respuesta' => 'required', ]);

        respuesta_desarrollo::create($request->all());

        Session::flash('flash_message', 'respuesta_desarrollo added!');

        return redirect('gestor_examenes/respuesta_desarrollo');
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
        $respuesta_desarrollo = respuesta_desarrollo::findOrFail($id);

        return view('gestor_examenes.respuesta_desarrollo.show', compact('respuesta_desarrollo'));
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
        $respuesta_desarrollo = respuesta_desarrollo::findOrFail($id);

        return view('gestor_examenes.respuesta_desarrollo.edit', compact('respuesta_desarrollo'));
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
        $this->validate($request, ['respuesta' => 'required', ]);

        $respuesta_desarrollo = respuesta_desarrollo::findOrFail($id);
        $respuesta_desarrollo->update($request->all());

        Session::flash('flash_message', 'respuesta_desarrollo updated!');

        return redirect('gestor_examenes/respuesta_desarrollo');
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
        respuesta_desarrollo::destroy($id);

        Session::flash('flash_message', 'respuesta_desarrollo deleted!');

        return redirect('gestor_examenes/respuesta_desarrollo');
    }
}
