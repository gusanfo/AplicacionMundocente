<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Revista extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'revistas';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'universidad',
        'nombre',
        'fecha_limite',
        'enlace'
    ];

}
