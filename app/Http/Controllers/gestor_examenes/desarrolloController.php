<?php

namespace App\Http\Controllers\gestor_examenes;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\desarrollo;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;
use DB;

class desarrolloController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index()
    {
        $desarrollo = desarrollo::paginate(15);

        return view('gestor_examenes.desarrollo.index', compact('desarrollo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create($id_pregunta, $id_examen)
    {
        return view('gestor_examenes.desarrollo.create',compact('id_pregunta', 'id_examen'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return void
     */
    public function store(Request $request)
    {
       // $this->validate($request, ['respuesta' => 'required', ]);

       // desarrollo::create($request->all());

        DB::table('desarrollos')->insert(
            ['respuesta' => $request->input('respuesta'), 'pregunta_id' => $request->input('pregunta_id')]
            ); 

        Session::flash('flash_message', 'desarrollo added!');

        return redirect('gestor_examenes/pregunta/'.$request->input('examen_id').'/index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return void
     */
    public function show($id, $id_examen)
    {
        $desarrollo = desarrollo::findOrFail($id);

        return view('gestor_examenes.desarrollo.show', compact('desarrollo', 'id_examen'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return void
     */
    public function edit($id, $id_examen)
    {
        $desarrollo = desarrollo::findOrFail($id);

        return view('gestor_examenes.desarrollo.edit', compact('desarrollo', 'id_examen'));
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

        $desarrollo = desarrollo::findOrFail($id);
        $desarrollo->update($request->all());

        Session::flash('flash_message', 'desarrollo updated!');

        return redirect('gestor_examenes/pregunta/'.$request->input('examen_id').'/index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return void
     */
    public function destroy($id, $id_examen)
    {
        desarrollo::destroy($id);

        Session::flash('flash_message', 'desarrollo deleted!');

        return redirect('gestor_examenes/pregunta/'.$id_examen.'/index');
    }
}
