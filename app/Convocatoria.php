<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Convocatoria extends Model {

    protected $table = 'convocatoria';

    protected $fillable = [
        'universidad',
        'nombre',
        'cargo',
        'fecha_inicio',
        'fecha_finalizacion',
        'enlace'
    ];

}
