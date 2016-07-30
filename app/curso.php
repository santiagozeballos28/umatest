<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class curso extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'cursos';

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
    protected $fillable = ['nombre','descripcion','capacidad','codigo', 'id_categoria'];


     public function categoria()
    {
        return $this->belongsTo('App\categorium');
    }
      public function curso_inscrito()
    {
       return $this->hasMany('App\curso_inscrito');
    }
    public function curso_dicta()
    {
       return $this->hasMany('App\curso_dictum');
    }

     public function examenes()
    {
       return $this->hasMany('App\examan');
    }

    public function tareas()
    {
       return $this->hasMany('App\tarea');
    }
   public function foros()
    {
       return $this->hasMany('App\foro');
    }
}
