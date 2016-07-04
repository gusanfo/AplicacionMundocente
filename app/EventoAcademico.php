<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;


class EventoAcademico extends Model {


    protected $table = 'eventos_academicos';

    protected $fillable = [
	    'user_id',
        'universidad',
        'ciudad',        
        'areas',
        'titulo',
        'fecha_inicio',
        'fecha_fin',
        'enlace'
    ];
     public static function getId()
    {
        $value = Session::get('email');
        $result = \DB::table('users')->where('email',$value )->pluck('id');
        return $result;

    }


    public static function filterAndPaginate($type)
    {
        return EventoAcademico::where('user_id',self::getId())
            ->type($type)
            ->orderBy('id', 'DESC')
            ->paginate(5);
    }
    public static function filterAndPaginate2($type)
    {
        return EventoAcademico::type($type)
            ->orderBy('id', 'DESC')
            ->paginate(5);
    }


    public function scopeType($query,$type)
    {
        if(trim($type) != ""){
            $query->where("areas",'LIKE',"%$type%")
             ->orWhere("universidad",'LIKE',"%$type%")
             ->orWhere("ciudad",'LIKE',"%$type%");
        }
    }
     public static function eventoAcademicoLimit()
    {
        $result = \DB::table('eventos_academicos')->limit(2)->orderBy('id', 'DESC')->get();
        return $result;
    }
}
