<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\permiso;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;

class permisosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index()
    {
        $permisos = permiso::paginate(15);

        return view('admin.permisos.index', compact('permisos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {
        return view('admin.permisos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return void
     */
    public function store(Request $request)
    {
        $this->validate($request, ['nombre_permiso' => 'required', ]);

        permiso::create($request->all());

        Session::flash('flash_message', 'permiso added!');

        return redirect('admin/permisos');
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
        $permiso = permiso::findOrFail($id);

        return view('admin.permisos.show', compact('permiso'));
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
        $permiso = permiso::findOrFail($id);

        return view('admin.permisos.edit', compact('permiso'));
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
        $this->validate($request, ['nombre_permiso' => 'required', ]);

        $permiso = permiso::findOrFail($id);
        $permiso->update($request->all());

        Session::flash('flash_message', 'permiso updated!');

        return redirect('admin/permisos');
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
        permiso::destroy($id);

        Session::flash('flash_message', 'permiso deleted!');

        return redirect('admin/permisos');
    }
}
