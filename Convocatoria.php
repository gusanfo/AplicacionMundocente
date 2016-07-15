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
//:::::::. filtro avanzado ::::::::::.
    public static function filterAdvanced($areas,$ciudad,$universidad)
    {
        return Convocatoria::advanced($areas,$ciudad,$universidad)
            ->orderBy('id', 'DESC')
            ->paginate(5);
    }
     //:::::::. filtro avanzado ::::::::::.
    public function scopeAdvanced($query,$areas,$ciudad,$universidad)
    {
       //if(trim($type) != ""){
            $query->where("areas",'LIKE',"%$areas%")
                ->Where("ciudad",'LIKE',"%$ciudad%")
        ->Where("universidad",'LIKE',"%$universidad%");
        //}
    }


    public static function getAreas()
    {
        $value = Session::get('email');
        $result = \DB::table('users')->where('email',$value )->pluck('areas');
        return $result;

    }


    public static function filtradoAreasInteres(){
       $partes = explode(",", self::getAreas());
       // dd("Areas: ".$partes[0]);
       //dd(count($partes));

        if(count($partes) == 1){
            return Convocatoria::where("areas",'LIKE',$partes[0])
                ->Where(function($query){
                    $query->where("fecha_finalizacion",'>=',date("Y-m-d",strtotime("now")))
                        ->orWhere("fecha_finalizacion",'0000-00-00');})
                               ->paginate(5);
        }
        if(count($partes) == 2){
            return Convocatoria::where("areas",'LIKE',$partes[0])
                ->orWhere("areas",'LIKE',$partes[1])
                ->Where(function($query){
                    $query->where("fecha_finalizacion",'>=',date("Y-m-d",strtotime("now")))
                        ->orWhere("fecha_finalizacion",'0000-00-00');})
		                ->paginate(5);
        }
        if(count($partes) == 3){
            return Convocatoria::where("areas",'LIKE',$partes[0])
                ->orWhere("areas",'LIKE',$partes[1])
                ->orWhere("areas",'LIKE',$partes[2])
                ->Where(function($query){
                    $query->where("fecha_finalizacion",'>=',date("Y-m-d",strtotime("now")))
                        ->orWhere("fecha_finalizacion",'0000-00-00');})
                ->paginate(5);
        }
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
