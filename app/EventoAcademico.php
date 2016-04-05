<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class EventoAcademico extends Model {


    protected $table = 'eventos_academicos';

    protected $fillable = [
        'departamento',
        'ciudad',
        'universidad',
        'areas',
        'titulo',
        'fecha_evento',
        'enlace'
    ];

    public static function filterAndPaginate($name)
    {
        return EventoAcademico::areas($name)
            ->where("fecha_evento",'>=',date("Y-m-d", strtotime("now")))
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
