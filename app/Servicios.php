<?php namespace Acordes;

use Illuminate\Database\Eloquent\Model;
use Zizaco\Entrust\Traits\EntrustUserTrait;

class Servicios extends Model {

    use EntrustUserTrait;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'servicios';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre', 'descripcion', 'imagen', 'estado'];

    public function scopeBuscar($return, $parametros){

        if(trim($parametros)!="")
        {
            $return->where(\DB::raw("CONCAT(nombre,' ',descripcion)"),"LIKE","%$parametros%");
        }

    }

}
