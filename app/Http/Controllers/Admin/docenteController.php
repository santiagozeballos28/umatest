<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;


use App\User;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;
use DB;

class docenteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index()
    {

        $a = DB::table('role_user')->where('role_id', 2)->get();
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
       
        $docente=$mm;

       // $docente = User::paginate(15);
        return view('admin.docente.index', compact('docente'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {
        return view('admin.docente.create');
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
        ['user_id' => $user, 'role_id' => 2]
        );   

        Session::flash('flash_message', 'docente added!');

        return redirect('admin/docente');
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
        $docente = User::findOrFail($id);

        return view('admin.docente.show', compact('docente'));
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
        $docente = User::findOrFail($id);

        return view('admin.docente.edit', compact('docente'));
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

        $docente = User::findOrFail($id);
        $docente->update($request->all());


         DB::table('users')
            ->where('id', $docente->id)
            ->update(array('password' => bcrypt($request->input('password'))));

        Session::flash('flash_message', 'docente updated!');

        return redirect('admin/docente');
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
        DB::table('curso_dictas')->where('user_id', $id)->delete();

        User::destroy($id);

        Session::flash('flash_message', 'docente deleted!');

        return redirect('admin/docente');
    }
}
