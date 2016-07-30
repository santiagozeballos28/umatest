<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;
use DB;
// principalPanel
class menuPrincipalController extends BaseController
{
     public function index()
    {
        
        return view('prueba');
    }
     // Docentes
    public function reseniaHistorica()
    {
       return view('MenuPrincipal.reseniaHistorica');       
    }
    // estudiantes
    public function vision()
    {
        return view('MenuPrincipal.vision');
    }
    //ayuda
    public function mision()
    {
        return view('MenuPrincipal.mision');

    }
   public function contactos()
    {
        return view('MenuPrincipal.contactos');
    }


   public function ayuda()
    {
        return view('MenuPrincipal.ayuda');
    }


}
