<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\User;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;
use DB;

class administradorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index()
    {
       $a = DB::table('role_user')->where('role_id', 1)->get();
       $index=0;
       $vector=array();
       foreach($a as $b)
        {
            $vector[$index]=$b->user_id; 
            $index++;
        }
      
        $mm=array();
        for ($x=0; $x < count($vector); $x++) { 
           $users = DB::table('users')->where('id', $vector[$x])->first();
           $mm[$x]=$users;
        }
       
        $administrador=$mm;
        return view('admin.administrador.index', compact('administrador'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {
        return view('admin.administrador.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return void
     */
    public function store(Request $request)
    {
        $this->validate($request, ['name' => 'required|max:255|alpha', 'apellido' => 'required|max:255|alpha', 'direccion' => 'required|max:255', 'telefono' => 'required|numeric|unique:users|between:60000000,79999999', 'genero' => 'required', 'email' => 'required|max:255|unique:users', 'password' => 'required', ]);

        $pass = User::create($request->all());

        $pass->password=(bcrypt($pass->password));
        
        $pass->save();

        $user = DB::table('users')->where('email', $pass->email)->first();
        $user = $user->id;
        
        DB::table('role_user')->insert(
        ['user_id' => $user, 'role_id' => 1]
        );   

        Session::flash('flash_message', 'administrador added!');

        return redirect('admin/administrador');
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
        $administrador = User::findOrFail($id);

        return view('admin.administrador.show', compact('administrador'));
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
        $administrador = User::findOrFail($id);

        return view('admin.administrador.edit', compact('administrador'));
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
        $this->validate($request, ['name' => 'required|max:255|alpha', 'apellido' => 'required|max:255|alpha', 'direccion' => 'required|max:255', 'telefono' => 'required|numeric|between:60000000,79999999', 'genero' => 'required', 'email' => 'required|max:255', 'password' => 'required', ]);

        $administrador = User::findOrFail($id);
        $administrador->update($request->all());

        DB::table('users')
            ->where('id', $administrador->id)
            ->update(array('password' => bcrypt($request->input('password'))));

        Session::flash('flash_message', 'administrador updated!');

        return redirect('admin/administrador');
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
        User::destroy($id);

        Session::flash('flash_message', 'administrador deleted!');

        return redirect('admin/administrador');
    }
}
