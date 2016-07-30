<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;


abstract class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    /*public function __construct() {
      $var= User::find(1);
      $var=$var->id;
         // $this->validate($request, ['id_usuario' => 'required', ]);
          $mandalo = array('id_usuario' => $var);
        estudiante::create($mandalo);

      //DB::table('estudiantes')->insert(
      //array('id_usuario' => 5)
      //);


    }
    */
}
