<?php namespace Acordes;

use Illuminate\Database\Eloquent\Model;
use Zizaco\Entrust\Traits\EntrustUserTrait;

class Datos extends Model {

    use EntrustUserTrait;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'datos';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre', 'contenido'];

    /**
     * Funcion que sirve para realizar las busquedas en los registros de la tabla
     * @param $query - Almacenara los registros que contengan los patrones ingresados
     * @param $parametros - Almacena la cadena de texto a buscar entre los registros
     */
    public function scopeBuscar($return, $parametros){

        if(trim($parametros)!="")
        {
            $return->where(\DB::raw("CONCAT(nombre,' ',contenido)"),"LIKE","%$parametros%");
        }

    }

}
