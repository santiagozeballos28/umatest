<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tarea extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'tareas';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre_tarea', 'descripcion', 'archivo','path_archivo', 'fecha_creacion', 'puntaje_total'];
        public function cursos()
    {
        return $this->belongsTo('App\curso');
    }
    public function enviado()
    {
       return $this->hasMany('App\enviado');
    }


}
