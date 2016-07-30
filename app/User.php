<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'apellido', 'direccion', 'telefono', 
    'genero', 'email', 'password'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];


       public function roles()
    {
        return $this->belongsToMany('App\role', 'role_user');
        
    }

     public function curso_inscrito2()
    {
       return $this->hasMany('App\curso_inscrito');
    }
    public function curso_dicta2()
    {
       return $this->hasMany('App\curso_dictum');
    }

     public function notas()
    {
       return $this->hasMany('App\notum');
    }

     public function entregado()
    {
       return $this->hasMany('App\entregado');
    }
       public function foros()
    {
       return $this->hasMany('App\foro');
    }
       public function comentarios()
    {
       return $this->hasMany('App\comentario');
    }
}
