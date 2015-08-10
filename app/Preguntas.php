<?php namespace Acordes;

use Illuminate\Database\Eloquent\Model;
use Zizaco\Entrust\Traits\EntrustUserTrait;

class Preguntas extends Model {

    use EntrustUserTrait;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'preguntas';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['pregunta', 'respuesta'];

    public function scopeBuscar($return, $parametros){

        if(trim($parametros)!="")
        {
            $return->where(\DB::raw("CONCAT(pregunta,' ',respuesta)"),"LIKE","%$parametros%");
        }

    }

}
