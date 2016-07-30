<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tipo_preguntum extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'tipo_preguntas';

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
    protected $fillable = ['tipo'];


     public function preguntas()
    {
       return $this->hasMany('App\preguntum');
    }
}
