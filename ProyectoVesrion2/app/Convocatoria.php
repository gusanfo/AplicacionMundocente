<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Convocatoria extends Model {

    protected $table = 'convocatorias';

    protected $fillable = [

        'departamento',
        'ciudad',
        'universidad',
        'titulo',
        'areas',
        'fecha_inicio',
        'fecha_finalizacion',
        'descripcion',
        'enlace'
    ];

    public static function filterAndPaginate($name)
    {
        return Convocatoria::areas($name)
            ->orderBy('id', 'DESC')
            ->paginate(5);
    }

    public function scopeAreas($query,$areas)
    {
        if(trim($areas) != ""){
            $query->where("areas",'LIKE',"%$areas%");
        }
    }
}
