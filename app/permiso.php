<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class permiso extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'permisos';

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
    protected $fillable = ['nombre_permiso'];


      public function roles()
    {
        return $this->belongsToMany('App\role', 'permiso_role');
    }
}
