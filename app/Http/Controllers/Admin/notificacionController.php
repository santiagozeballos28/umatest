<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\notificacion;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;

class notificacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index()
    {
        $notificacion = notificacion::paginate(15);

        return view('gestor_examenes.notificacion.index', compact('notificacion'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {
        return view('gestor_examenes.notificacion.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return void
     */
    public function store(Request $request)
    {
        $this->validate($request, ['id_user' => 'required', 'id_curso' => 'required', 'visto' => 'required', ]);

        notificacion::create($request->all());

        Session::flash('flash_message', 'notificacion added!');

        return redirect('admin/notificacion');
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
        $notificacion = notificacion::findOrFail($id);

        return view('gestor_examenes.notificacion.show', compact('notificacion'));
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
        $notificacion = notificacion::findOrFail($id);

        return view('gestor_examenes.notificacion.edit', compact('notificacion'));
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
        $this->validate($request, ['id_user' => 'required', 'id_curso' => 'required', 'visto' => 'required', ]);

        $notificacion = notificacion::findOrFail($id);
        $notificacion->update($request->all());

        Session::flash('flash_message', 'notificacion updated!');

        return redirect('admin/notificacion');
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
        notificacion::destroy($id);

        Session::flash('flash_message', 'notificacion deleted!');

        return redirect('admin/notificacion');
    }
}
