<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class examan extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'examens';

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
    protected $fillable = ['nombre_examen', 'estado_examen', 'fecha_examen', 'puntaje_totalm'];
    
    public function preguntas()
    {
       return $this->hasMany('App\preguntum');
    }

     public function notas2()
    {
       return $this->hasMany('App\notum');
    }

     public function cursos()
    {
        return $this->belongsTo('App\curso');
    }
  public function res_desarrollo()
    {
        return $this->hasMany('App\respuesta_desarrollo');
    }

}
