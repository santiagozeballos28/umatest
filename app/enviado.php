<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class enviado extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'enviados';

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
    protected $fillable = ['fecha_limite'];

     public function tareas()
    {
        return $this->belongsTo('App\tarea');
    }
        public function entregado()
    {
       return $this->hasMany('App\entregado');
    }
}
