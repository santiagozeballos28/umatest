<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Session;
use DB;
class bitacoraController extends Controller
{
     public function bitacora_curso()
    {
        $curso=DB::table('bitacora_cursos')->get();
        return view('bitacora.indexCurso', compact('curso'));
    }
     // Docentes
    public function bitacora_examen()
    {
        $examen=DB::table('bitacora_examenes')->get();
        return view('bitacora.indexExamen', compact('examen'));
    }
    // estudiantes
    public function bitacora_tarea()
    {
        $tarea=DB::table('bitacora_tareas')->get();
        return view('bitacora.indexTarea',compact('tarea'));
    }
    
}