<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class entregado extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'entregados';

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
    protected $fillable = ['descripcion_tarea', 'archivo', 'fecha', 'puntaje'];


       public function users()
    {
        return $this->belongsTo('App\User');
    }
     public function enviado()
    {
        return $this->belongsTo('App\enviado');
    }
}
