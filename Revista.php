<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

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
        'titulo',
        'tipoRevista',
        'categoria',
        'fechaRecepcion',
        'enlace',
        'areas'
    ];


    public static function getId()
    {
        $value = Session::get('email');
        $result = \DB::table('users')->where('email',$value )->pluck('id');
        return $result;

    }



    public static function filterAndPaginate($type)
    {
        return Revista::where('user_id',self::getId())
        	->type($type)           
            ->orderBy('id', 'DESC')
            ->paginate(5);
    }
    public static function filterAndPaginate2($type)//$universidad
    {
        return Revista::type($type)       
            ->orderBy('id', 'DESC')
            ->paginate(5);
    }
//:::::::. filtro avanzado ::::::::::.
    public static function filterAdvanced($areas,$universidad)
    {
        return Revista::advanced($areas,$universidad)
            ->orderBy('id', 'DESC')
            ->paginate(5);
    }
     //:::::::. filtro avanzado ::::::::::.
    public function scopeAdvanced($query,$areas,$universidad)
    {
       //if(trim($type) != ""){
            $query->where("areas",'LIKE',"%$areas%")
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
            return Revista::where("areas",'LIKE',$partes[0])
				->Where(function($query){
                    $query->where("fechaRecepcion",'>=',date("Y-m-d",strtotime("now")))
                        ->orWhere("fechaRecepcion",'0000-00-00');})
                               ->paginate(5);
        }
        if(count($partes) == 2){
            return Revista::where("areas",'LIKE',$partes[0])
                ->orWhere("areas",'LIKE',$partes[1])
			->Where(function($query){
                    $query->where("fechaRecepcion",'>=',date("Y-m-d",strtotime("now")))
                        ->orWhere("fechaRecepcion",'0000-00-00');})
                ->paginate(5);
        }
        if(count($partes) == 3){
            return Revista::where("areas",'LIKE',$partes[0])
                ->orWhere("areas",'LIKE',$partes[1])
                ->orWhere("areas",'LIKE',$partes[2])
			->Where(function($query){
                    $query->where("fechaRecepcion",'>=',date("Y-m-d",strtotime("now")))
                        ->orWhere("fechaRecepcion",'0000-00-00');})
                ->paginate(5);
        }
    }

    public function scopeType($query,$type)
    {
        if(trim($type) != ""){
            $query->where("areas",'LIKE',"%$type%")
             ->orWhere("universidad",'LIKE',"%$type%");
        }
    }
    public static function revistaLimit()
    {
        $result = \DB::table('revistas')->limit(2)->orderBy('id', 'DESC')->get();
        return $result;
    }

}
