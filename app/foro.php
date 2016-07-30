<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class foro extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'foros';

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
    protected $fillable = ['titulo', 'mensaje', 'archivo', 'fecha'];


   public function curso()
    {
        return $this->belongsTo('App\curso');
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }
     public function comentarios()
    {
       return $this->hasMany('App\comentario');
    }

}
