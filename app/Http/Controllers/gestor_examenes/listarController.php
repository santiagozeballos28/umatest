<?php

namespace App\Http\Controllers\gestor_examenes;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\examan;
use App\curso;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;
use DB;

class listarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index($id_curso)
    {
        $examen = examan::paginate(15);

        return view('gestor_examenes.listador', compact('examen','id_curso'));
    }


}
