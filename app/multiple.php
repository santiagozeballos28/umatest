<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class multiple extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'multiples';

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
    protected $fillable = ['respuesta', 'correcta'];

         public function preguntas2()
    {
        return $this->belongsTo('App\preguntum');
    }
}
