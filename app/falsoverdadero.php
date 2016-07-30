<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class falsoverdadero extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'falsoverdaderos';

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

         public function preguntas3()
    {
        return $this->belongsTo('App\preguntum');
    }
}
