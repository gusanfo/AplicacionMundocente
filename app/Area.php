<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Area extends Model {

    protected $table = 'areas';

    protected $fillable = [
        'nombre'
    ];
    public function revista() {
        return $this->belongsTo('App\Revista');
    }


}
