<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\User;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;
use DB;

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
        $this->validate($request, ['name' => 'required|max:255|alpha', 'apellido' => 'required|max:255|alpha', 'direccion' => 'required|max:255', 'telefono' => 'required|numeric|unique:users|between:60000000,79999999', 'genero' => 'required', 'email' => 'required|max:255|unique:users', 'password' => 'required', ]);

         $pass = User::create($request->all());

         $pass->password=(bcrypt($pass->password));
        
         $pass->save();

        $user = DB::table('users')->where('email', $pass->email)->first();
        $user = $user->id;
        
        DB::table('role_user')->insert(
        ['user_id' => $user, 'role_id' => 3]
        );   

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
        $this->validate($request, ['name' => 'required|max:255|alpha', 'apellido' => 'required|max:255|alpha', 'direccion' => 'required|max:255', 'telefono' => 'required|numeric|between:60000000,79999999', 'genero' => 'required', 'email' => 'required|max:255', 'password' => 'required', ]);

        $user = User::findOrFail($id);
       // $user->update($request->all());
        
        $user->update($request->all());


        DB::table('users')
            ->where('id', $user->id)
            ->update(array('password' => bcrypt($request->input('password'))));


        Session::flash('flash_message', 'User updated!');

        return redirect('/home');
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
        DB::table('curso_inscritos')->where('user_id', $id)->delete();

        User::destroy($id);

        Session::flash('flash_message', 'User deleted!');

        return redirect('admin/users');
    }
}
