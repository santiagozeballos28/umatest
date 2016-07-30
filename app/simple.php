<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class simple extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'simples';

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
    protected $fillable = ['respuesta'];

       public function preguntas()
    {
        return $this->belongsTo('App\preguntum');
    }
}
