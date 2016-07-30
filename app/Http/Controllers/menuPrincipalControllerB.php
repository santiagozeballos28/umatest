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
class menuPrincipalControllerB extends BaseController
{


     /**
     * Este metodo muestra la descripcion de la resenia
     * historica
     */
    public function reseniaHistorica()
    {
        return view('MenuPrincipalB.reseniaHistorica');
    }
    
    /**
     * Este metodo muestra la descripcion de la resenia
     * de la vision
     */
    public function vision()
    {
        return view('MenuPrincipalB.vision');
    }
    
    public function mision()
    {
        return view('MenuPrincipalB.mision');

    }
   public function contactos()
    {
        return view('MenuPrincipalB.contactos');
    }


   public function ayuda()
    {
        return view('MenuPrincipalB.ayuda');
    }


}
