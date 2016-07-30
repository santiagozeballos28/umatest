<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class comentario extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'comentarios';

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
    protected $fillable = ['mensaje', 'fecha'];

        public function user()
    {
        return $this->belongsTo('App\User');
    }
        public function foros()
    {
        return $this->belongsTo('App\foro');
    }
}
