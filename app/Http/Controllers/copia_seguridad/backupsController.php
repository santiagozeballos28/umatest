<?php

namespace App\Http\Controllers\copia_seguridad;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\backup;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;
use DB;

class backupsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index()
    {
        $backups = backup::paginate(15);

        return view('copia_seguridad.backups.index', compact('backups'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {
        return view('copia_seguridad.backups.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return void
     */
    public function store(Request $request)
    {
        $this->validate($request, ['nombre_backup' => 'required',]);
        
        $nombre_archivo=$request->input('nombre_backup');
        $dbname = "umatest3"; 
        $dbhost = "localhost"; 
        $dbuser = "root"; 
        $dbpass = ""; 

        $backupFile = $nombre_archivo."_". date("Y-m-d-H-i-s") . '.sql';

   system("c:\\xampp\\mysql\\bin\\mysqldump.exe --host=$dbhost --user=$dbuser --password=$dbpass --ignore-table=$dbname.backups $dbname >  backup/$backupFile");

     $fecha_actual = date("Y-m-d H:i:s");

     DB::table('backups')->insert(['nombre_backup' => $request->input('nombre_backup'), 'archivo_backup'=> $backupFile, 'fecha_backup'=> $fecha_actual]);
    
        return redirect('copia_seguridad/backups');
    }


    public function restaurar($id){
      
        $nombre= DB::table('backups')->where('id', $id)->first();
        $dbname = "umatest3"; 
        $dbhost = "localhost"; 
        $dbuser = "root"; 
        $dbpass = ""; 
        $nombre=$nombre->archivo_backup;
    system("c:\\xampp\\mysql\\bin\\mysql --host=$dbhost --user=$dbuser --password=$dbpass $dbname < backup/$nombre");
         
        return view('/home', compact('nombre'));
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
        $backup = backup::findOrFail($id);

        return view('copia_seguridad.backups.show', compact('backup'));
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

        $backup = backup::findOrFail($id);

        return view('copia_seguridad.backups.edit', compact('backup'));
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
        $this->validate($request, ['nombre_backup' => 'required', 'archivo_backup' => 'required', 'fecha_backup' => 'required', ]);

        $backup = backup::findOrFail($id);
        $backup->update($request->all());

        Session::flash('flash_message', 'backup updated!');

        return redirect('copia_seguridad/backups');
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
        $nombre= DB::table('backups')->where('id', $id)->first();

        unlink('backup/'.$nombre->archivo_backup);   

        backup::destroy($id);

        Session::flash('flash_message', 'backup deleted!');

        return redirect('copia_seguridad/backups');
    }
}
