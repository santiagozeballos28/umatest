<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class role extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'roles';

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
    protected $fillable = ['nombre_rol'];

     public function users()
    {
        return $this->belongsToMany('App\User', 'role_user');
    }


    public function permisos()
    {
        return $this->belongsToMany('App\permiso', 'permiso_role');
    }
}
