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

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index()
    {
       
       $a = DB::table('role_user')->where('role_id', 3)->get();
       $index=0;
       $vector=array();
       foreach($a as $b)
        {
            $vector[$index]=$b->user_id; 
            $index++;
           // echo $b->user_id;
           // echo $b->role_id;
           // echo "<br>";
        }
      // echo $a->count();
       //for ($i=0; $i < $a->count() ; $i++) { 
         //echo $a[$i]->user_id;
       //}
     //  echo $a->user_id;
       //$envia=array();
       //for ($i=0; $i < $user->size(); $i++) { 
         
       //}
       

        //$users = User::paginate(15);
        //$users = User::paginate(15);

        $mm=array();
        for ($x=0; $x < count($vector); $x++) { 
           $users = DB::table('users')->where('id', $vector[$x])->first();
           $mm[$x]=$users;
        }
        
       
        $users=$mm;

         //for ($m=0; $m < count($users); $m++) { 
            //$fa=$envia[$m];
            //echo $fa['id'];
           // echo $fa['name'];
            //echo $fa['apellido'] . "<br>";
         //   echo $users[$m]->name . "<br>";
       // }
      /*
        $envia=array();
        $k=0;
          //echo count($users);
        for ($i=0; $i < count($users); $i++) { 
       
          //echo $users[$i]->name;
          //echo $users[$i]->apellido . "<br>";
          $algo = new User();

           for ($j=0; $j < count($vector); $j++) { 
              
                if($users[$i]->id==$vector[$j]){

                 //  $algo->id=$users[$i]->id;
                   $algo->name=$users[$i]->name;
                   $algo->apellido=$users[$i]->apellido;
                   $algo->direccion=$users[$i]->direccion;
                   $algo->telefono=$users[$i]->telefono;
                   $algo->genero=$users[$i]->genero;
                   $algo->email=$users[$i]->email;
                   $algo->password=$users[$i]->password;

                  break;  
                }
           }
           
           
              if($algo->name==null){
               $envia[$k]=$algo;
                $k++;
              }
        
        }
    
        for ($m=0; $m < count($envia); $m++) { 
            //$fa=$envia[$m];
            //echo $fa['id'];
           // echo $fa['name'];
            //echo $fa['apellido'] . "<br>";
            echo $envia[$m]->name;
        }
        
         $users=$envia; 
       */
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {
        return view('admin.users.create');
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
        ['user_id' => $user, 'role_id' => 3]
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
            $nombre_tabla="users";//4
            $fecha_a = date("Y-m-d H:i:s");//5
            $accion_a='create';//6
            $id_user=Auth::id();
            $usuario= DB::table('users')->where('id', $id_user)->first();
            $nombre_usuario = $usuario->name.' '.$usuario->apellido;//7
            $id_bi=0;//8

            DB::select('CALL Bitacora(?,?,?,?,?,?,?,?)', array($dato_nuevo, $dato_viejo, $ip, 
                $nombre_tabla, $fecha_a, $accion_a, $nombre_usuario, $id_bi));
              //fin procedure

        Session::flash('flash_message', 'User added!');

        return redirect('admin/users');
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
        $user = User::findOrFail($id);

        return view('admin.users.show', compact('user'));
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
        $user = User::findOrFail($id);

        return view('admin.users.edit', compact('user'));
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
            $nombre_tabla="users";//4
            $fecha_a = date("Y-m-d H:i:s");//5
            $accion_a='update';//6
            $id_user=Auth::id();
            $usuario= DB::table('users')->where('id', $id_user)->first();
            $nombre_usuario = $usuario->name.' '.$usuario->apellido;//7
            $id_bi=0;//8

            DB::select('CALL Bitacora(?,?,?,?,?,?,?,?)', array($dato_nuevo, $dato_viejo, $ip, 
                $nombre_tabla, $fecha_a, $accion_a, $nombre_usuario, $id_bi));
              //fin procedure

        $user = User::findOrFail($id);
        $user->update($request->all());


        DB::table('users')
            ->where('id', $user->id)
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
            $nombre_tabla="users";//4
            $accion_a='updaten';//6
            $id_bi=$recurso;//8

            DB::select('CALL Bitacora(?,?,?,?,?,?,?,?)', array($dato_nuevo, $dato_viejo, $ip, 
                $nombre_tabla, $fecha_a, $accion_a, $nombre_usuario, $id_bi));
              //fin procedure


        Session::flash('flash_message', 'User updated!');

        return redirect('admin/users');
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
            $nombre_tabla="users";//4
            $fecha_a = date("Y-m-d H:i:s");//5
            $accion_a='delete';//6
            $id_user=Auth::id();
            $usuario= DB::table('users')->where('id', $id_user)->first();
            $nombre_usuario = $usuario->name.' '.$usuario->apellido;//7
            $id_bi=0;//8

            DB::select('CALL Bitacora(?,?,?,?,?,?,?,?)', array($dato_nuevo, $dato_viejo, $ip, 
                $nombre_tabla, $fecha_a, $accion_a, $nombre_usuario, $id_bi));
              //fin procedure

        DB::table('curso_inscritos')->where('user_id', $id)->delete();

        User::destroy($id);

        Session::flash('flash_message', 'User deleted!');

        return redirect('admin/users');
    }
}
