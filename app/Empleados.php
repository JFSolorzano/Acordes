<?php namespace Acordes;

use Illuminate\Database\Eloquent\Model;
use Zizaco\Entrust\Traits\EntrustUserTrait;

class Empleados extends Model {

    use EntrustUserTrait;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'empleados';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['nombres', 'apellidos', 'biografia', 'foto', 'cargo'];

    public function scopeBuscar($return, $parametros){

        if(trim($parametros)!="")
        {
            $return->where(\DB::raw("CONCAT(nombres,' ',apellidos)"),"LIKE","%$parametros%");
        }

    }

    public function cargo()
    {
        return $this->belongsTo('Acordes\Cargos','cargo','id');
    }

}
