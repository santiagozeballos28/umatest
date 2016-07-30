<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class desarrollo extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'desarrollos';

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

         public function preguntas4()
    {
        return $this->belongsTo('App\preguntum');
    }
}
