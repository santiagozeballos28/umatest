<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class notum extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'notas';

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
    protected $fillable = ['numero_preguntas', 'duracion', 'calificacion', 'fecha_inicio', 'fecha_fin'];

    
    public function users()
    {
        return $this->belongsTo('App\User');
    }
     public function examenes()
    {
        return $this->belongsTo('App\examan');
    }
}
