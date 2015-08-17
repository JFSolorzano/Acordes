<?php namespace Acordes;

use Illuminate\Database\Eloquent\Model;

class Cargos extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'cargos';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre', 'descripcion' ];

    public function empleados()
    {
        return $this->hasMany('Acordes\Empleados','cargo','id');
    }

}
