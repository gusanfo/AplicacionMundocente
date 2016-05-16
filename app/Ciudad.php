<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Ciudad extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'ciudades';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre',
        'departamento_id'
    ];

    public static function ciudades($id){
        return Ciudad::where("departamento_id",'=', $id )->get();

    }

}
