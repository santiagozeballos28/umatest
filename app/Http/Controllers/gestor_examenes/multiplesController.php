<?php

namespace App\Http\Controllers\gestor_examenes;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\multiple;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;
use DB;
class multiplesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index($id_pregunta)
    {
         
        $multiples = DB::table('multiples')->where('pregunta_id', $id_pregunta)->get();

        //$multiples = multiple::paginate(15);

        return view('gestor_examenes.multiples.index', compact('multiples', 'id_pregunta'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */

    public function create($id_pregunta)
    {
        
        return view('gestor_examenes.multiples.create', compact('id_pregunta'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return void
     */
    public function store(Request $request)
    {
        //$this->validate($request, ['respuesta' => 'required', 'correcta' => 'required', ]);

        //multiple::create($request->all());

        $query=DB::table('multiples')->where('pregunta_id', $request->input('pregunta_id'))->where('correcta',1)->get();
        $query_size=count($query);

        if($query_size==0){
         
            DB::table('multiples')->insert(
            ['respuesta' => $request->input('respuesta'), 'correcta' => $request->input('correcta'), 
            'pregunta_id' => $request->input('pregunta_id')]
            ); 

        }else{

               DB::table('multiples')->insert(
            ['respuesta' => $request->input('respuesta'), 'correcta' => 0, 
            'pregunta_id' => $request->input('pregunta_id')]
            ); 
        }

        

        Session::flash('flash_message', 'multiple added!');

        return redirect('gestor_examenes/multiples/'.$request->input('pregunta_id').'/index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return void
     */
    public function show($id, $id_pregunta)
    {
        $multiple = multiple::findOrFail($id);

        return view('gestor_examenes.multiples.show', compact('multiple', 'id_pregunta'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return void
     */
    public function edit($id, $id_pregunta)
    {
        $multiple = multiple::findOrFail($id);

        return view('gestor_examenes.multiples.edit', compact('multiple', 'id_pregunta'));
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
        $this->validate($request, ['respuesta' => 'required', 'correcta' => 'required', ]);

        $multiple = multiple::findOrFail($id);
        $multiple->update($request->all());

        Session::flash('flash_message', 'multiple updated!');

        return redirect('gestor_examenes/multiples/'.$request->input('pregunta_id').'/index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return void
     */
    public function destroy($id, $id_pregunta)
    {

        multiple::destroy($id);

        Session::flash('flash_message', 'multiple deleted!');

        return redirect('gestor_examenes/multiples/'.$id_pregunta.'/index');
    }
}
