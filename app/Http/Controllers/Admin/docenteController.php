<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;


use App\User;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;
use DB;
use Auth;

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
        $this->validate($request, ['name' => 'required|max:255|alpha', 'apellido' => 'required|max:255|alpha', 'direccion' => 'required|max:255', 'telefono' => 'required|numeric|unique:users|between:1000000,79999999', 'genero' => 'required', 'email' => 'required|email|max:255|unique:users', 'password' => 'required|min:8', ]);

         $pass = User::create($request->all());

         $pass->password=(bcrypt($pass->password));
        
         $pass->save();

        $user = DB::table('users')->where('email', $pass->email)->first();
        $user = $user->id;
        
        DB::table('role_user')->insert(
        ['user_id' => $user, 'role_id' => 2]
        );
          //store procedure
            $nombre_user = $request->input('name');
            $apellido_user = $request->input('apellido');
            $direccion_user= $request->input('direccion');
            $telefono_user=$request->input('telefono');
            $genero_user=$request->input('genero');
            $email_user=$request->input('email');
            $password_user=$request->input('password');

            $dato_nuevo=$nombre_user.'#'.$apellido_user.'#'.$direccion_user.'#'.$telefono_user.'#'.$genero_user.'#'.$email_user.'#'.$password_user;//1
            $dato_viejo="";//2
            $nombre_maq = gethostname(); $ip = gethostbyname($nombre_maq);//3
            $nombre_tabla="docente";//4
            $fecha_a = date("Y-m-d H:i:s");//5
            $accion_a='create';//6
            $id_user=Auth::id();
            $usuario= DB::table('users')->where('id', $id_user)->first();
            $nombre_usuario = $usuario->name.' '.$usuario->apellido;//7
            $id_bi=0;//8

            DB::select('CALL Bitacora(?,?,?,?,?,?,?,?)', array($dato_nuevo, $dato_viejo, $ip, 
                $nombre_tabla, $fecha_a, $accion_a, $nombre_usuario, $id_bi));
              //fin procedure   

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
        $this->validate($request, ['name' => 'required|max:255|alpha', 'apellido' => 'required|max:255|alpha', 'direccion' => 'required|max:255', 'telefono' => 'required|numeric|between:1000000,79999999', 'genero' => 'required', 'email' => 'required|email|max:255', 'password' => 'required|min:8', ]);


          $persona=DB::table('users')->where('id', $id)->first();
      //store procedure
            $nombre_user = $persona->name;
            $apellido_user = $persona->apellido;
            $direccion_user= $persona->direccion;
            $telefono_user=$persona->telefono;
            $genero_user=$persona->genero;
            $email_user=$persona->email;
            $password_user=$persona->password;

            $dato_nuevo="";//1
            $dato_viejo=$nombre_user.'#'.$apellido_user.'#'.$direccion_user.'#'.$telefono_user.'#'.$genero_user.'#'.$email_user.'#'.$password_user;//2
            $nombre_maq = gethostname(); $ip = gethostbyname($nombre_maq);//3
            $nombre_tabla="docente";//4
            $fecha_a = date("Y-m-d H:i:s");//5
            $accion_a='update';//6
            $id_user=Auth::id();
            $usuario= DB::table('users')->where('id', $id_user)->first();
            $nombre_usuario = $usuario->name.' '.$usuario->apellido;//7
            $id_bi=0;//8

            DB::select('CALL Bitacora(?,?,?,?,?,?,?,?)', array($dato_nuevo, $dato_viejo, $ip, 
                $nombre_tabla, $fecha_a, $accion_a, $nombre_usuario, $id_bi));
              //fin procedure

        $docente = User::findOrFail($id);
        $docente->update($request->all());


         DB::table('users')
            ->where('id', $docente->id)
            ->update(array('password' => bcrypt($request->input('password'))));



         $recurso= DB::table('bitacora_examenes')->where('usuario_bi', $nombre_usuario)->where('fecha_bi', $fecha_a)->first();
           $recurso=$recurso->id;

            //store procedure
            $nombre_user = $request->input('name');
            $apellido_user = $request->input('apellido');
            $direccion_user= $request->input('direccion');
            $telefono_user=$request->input('telefono');
            $genero_user=$request->input('genero');
            $email_user=$request->input('email');
            $password_user=$request->input('password');

            $dato_nuevo=$nombre_user.'#'.$apellido_user.'#'.$direccion_user.'#'.$telefono_user.'#'.$genero_user.'#'.$email_user.'#'.$password_user;//1
            $dato_viejo="";//2
            $nombre_tabla="docente";//4
            $accion_a='updaten';//6
            $id_bi=$recurso;//8

            DB::select('CALL Bitacora(?,?,?,?,?,?,?,?)', array($dato_nuevo, $dato_viejo, $ip, 
                $nombre_tabla, $fecha_a, $accion_a, $nombre_usuario, $id_bi));
              //fin procedure

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
        $persona=DB::table('users')->where('id', $id)->first();
      //store procedure
            $nombre_user = $persona->name;
            $apellido_user = $persona->apellido;
            $direccion_user= $persona->direccion;
            $telefono_user=$persona->telefono;
            $genero_user=$persona->genero;
            $email_user=$persona->email;
            $password_user=$persona->password;

            $dato_nuevo="";//1
            $dato_viejo=$nombre_user.'#'.$apellido_user.'#'.$direccion_user.'#'.$telefono_user.'#'.$genero_user.'#'.$email_user.'#'.$password_user;//2
            $nombre_maq = gethostname(); $ip = gethostbyname($nombre_maq);//3
            $nombre_tabla="docente";//4
            $fecha_a = date("Y-m-d H:i:s");//5
            $accion_a='delete';//6
            $id_user=Auth::id();
            $usuario= DB::table('users')->where('id', $id_user)->first();
            $nombre_usuario = $usuario->name.' '.$usuario->apellido;//7
            $id_bi=0;//8

            DB::select('CALL Bitacora(?,?,?,?,?,?,?,?)', array($dato_nuevo, $dato_viejo, $ip, 
                $nombre_tabla, $fecha_a, $accion_a, $nombre_usuario, $id_bi));
              //fin procedure

        DB::table('curso_dictas')->where('user_id', $id)->delete();

        User::destroy($id);

        Session::flash('flash_message', 'docente deleted!');

        return redirect('admin/docente');
    }
}
