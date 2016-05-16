<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;


class Convocatoria extends Model {

    protected $table = 'convocatorias';

    protected $fillable = [
    	'user_id',
        'ciudad',
        'universidad',
        'titulo',
        'areas',
        'fecha_inicio',
        'fecha_finalizacion',
        'descripcion',
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
        return Convocatoria::where('user_id',self::getId())
        	->type($type)
            ->orderBy('id', 'DESC')
            ->paginate(5);
    }
    public static function filterAndPaginate2($type)
    {
        return Convocatoria::type($type)
            ->orderBy('id', 'DESC')
            ->paginate(5);
    }

    public function scopeType($query,$type)
    {
        if(trim($type) != ""){
            $query->where("areas",'LIKE',"%$type%")
            ->orWhere("ciudad",'LIKE',"%$type%")
            ->orWhere("universidad",'LIKE',"%$type%");

        }
    }
     public static function convocatoriaLimit()
    {
        $result = \DB::table('convocatorias')->limit(2)->orderBy('id', 'DESC')->get();
        return $result;
    }
}
