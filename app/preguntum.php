<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class preguntum extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'preguntas';

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
    protected $fillable = ['nombre_pregunta', 'puntaje_pregunta'];

      public function tipo_preguntas()
    {
        return $this->belongsTo('App\tipo_preguntum');
    }
 
       public function examenes()
    {
        return $this->belongsTo('App\examan');
    }

     public function simple()
    {
       return $this->hasMany('App\simple');
    }

     public function multiple()
    {
       return $this->hasMany('App\multiple');
    }

     public function desarrollo()
    {
       return $this->hasMany('App\desarrollo');
    }

     public function falsoverdadero()
    {
       return $this->hasMany('App\falsoverdadero');
    }



}
