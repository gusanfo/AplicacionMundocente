<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Universidad extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'universidades';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre'

    ];

    public static function universidades($id){
        return Universidad::where("ciudad_id",'=', $id )->get();

    }

}
