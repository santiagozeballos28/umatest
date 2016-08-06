<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Session;
use DB;
class bitacoraController extends Controller
{

     // Docentes
    public function bitacora_examen()
    {
        $examen=DB::table('bitacora_examenes')->get();
        return view('bitacora.indexExamen', compact('examen'));
    }
   
    
}