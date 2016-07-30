<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Session;
use App\categorium;

//require('App/Http/Controllers/fpdf/pdf/fpdf');
class gestorusuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($boton)
    {
       //return view('gestorcursos.todosloscursos');


       return view('gestorcursos.todosloscursos', compact('boton'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       categorium::create($request->all());

        Session::flash('flash_message', 'Post added!');

        return redirect('/todosloscursos');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
   
   public function ellasefue(){

     $nombre='helber'; 
     return view('gestor_examenes.vistas_examenes.test', compact('nombre'));
     
   }

   public function envio(Request $request){
     
     $nombre = $request->input('nombre');

     return view('gestor_examenes.vistas_examenes.test', compact('nombre'));
     
   }
}
