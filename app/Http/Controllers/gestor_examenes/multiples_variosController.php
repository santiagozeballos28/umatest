<?php

namespace App\Http\Controllers\gestor_examenes;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\multiples_vario;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;
use DB;

class multiples_variosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index($id_pregunta)
    {
         $multiples_varios = DB::table('multiples_varios')->where('pregunta_id', $id_pregunta)->get();

        return view('gestor_examenes.multiples_varios.index', compact('multiples_varios', 'id_pregunta'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create($id_pregunta)
    {
        return view('gestor_examenes.multiples_varios.create', compact('id_pregunta'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return void
     */
    public function store(Request $request)
    {
        $this->validate($request, ['respuesta' => 'required', 'correcta' => 'required', ]);

        DB::table('multiples_varios')->insert(
            ['respuesta' => $request->input('respuesta'), 'correcta' => $request->input('correcta'), 
            'pregunta_id' => $request->input('pregunta_id')]
            ); 

        Session::flash('flash_message', 'multiple added!');

        return redirect('gestor_examenes/multiples_varios/'.$request->input('pregunta_id').'/index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return void
     */
    public function show($id, $id_pregunta)
    {
        $multiples_vario = multiples_vario::findOrFail($id);

        return view('gestor_examenes.multiples_varios.show', compact('multiples_vario', 'id_pregunta'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return void
     */
    public function edit($id, $id_pregunta)
    {
        $multiples_vario = multiples_vario::findOrFail($id);

        return view('gestor_examenes.multiples_varios.edit', compact('multiples_vario', 'id_pregunta'));
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
        $this->validate($request, ['respuesta' => 'required', 'correcta' => 'required', ]);

        $multiples_vario = multiples_vario::findOrFail($id);
        $multiples_vario->update($request->all());

        Session::flash('flash_message', 'multiples_vario updated!');

        return redirect('gestor_examenes/multiples_varios/'.$request->input('pregunta_id').'/index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return void
     */
    public function destroy($id, $id_pregunta)
    {
        multiples_vario::destroy($id);

        Session::flash('flash_message', 'multiples_vario deleted!');

        return redirect('gestor_examenes/multiples_varios/'.$id_pregunta.'/index');
    }
}
