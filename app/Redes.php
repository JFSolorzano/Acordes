<?php namespace Acordes;

use Illuminate\Database\Eloquent\Model;
use Zizaco\Entrust\Traits\EntrustUserTrait;

class Redes extends Model {

    use EntrustUserTrait;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'redes';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre', 'link', 'icono'];

    public function scopeBuscar($return, $parametros){

        if(trim($parametros)!="")
        {
            $return->where(\DB::raw("CONCAT(nombre,' ',link)"),"LIKE","%$parametros%");
        }

    }

}
