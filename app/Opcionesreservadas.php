<?php namespace Acordes;

use Illuminate\Database\Eloquent\Model;

class Opcionesreservadas extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'opcionesreservadas';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['reservacion', 'opcion', 'cantidad'];

    public function opciones()
    {
        return $this->belongsTo('Acordes\Opciones','opcion','id')->select(['id', 'nombre']);
    }

    public function reservacion()
    {
        return $this->belongsTo('Acordes\Reservaciones','reservacion','id')->select(['id', 'cliente']);
    }
}
