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

        'departamento',
        'ciudad',
        'universidad',
        'titulo',
        'tipoRevista',
        'categoria',
        'fechaRecepcion',
        'enlace',
        'areas'
    ];


    public static function filterAndPaginate($name)
    {
        return Revista::areas($name)
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
