<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\role;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;

class rolesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index()
    {
        $roles = role::paginate(15);

        return view('admin.roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {
        return view('admin.roles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return void
     */
    public function store(Request $request)
    {
        $this->validate($request, ['nombre_rol' => 'required', ]);

        role::create($request->all());

        Session::flash('flash_message', 'role added!');

        return redirect('admin/roles');
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
        $role = role::findOrFail($id);

        return view('admin.roles.show', compact('role'));
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
        $role = role::findOrFail($id);

        return view('admin.roles.edit', compact('role'));
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
        $this->validate($request, ['nombre_rol' => 'required', ]);

        $role = role::findOrFail($id);
        $role->update($request->all());

        Session::flash('flash_message', 'role updated!');

        return redirect('admin/roles');
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
        role::destroy($id);

        Session::flash('flash_message', 'role deleted!');

        return redirect('admin/roles');
    }
}
