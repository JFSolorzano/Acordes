<?php namespace Acordes;

use Illuminate\Database\Eloquent\Model;

class Reservaciones extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'reservaciones';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['cliente', 'servicio', 'mensaje', 'telefono', 'inicio', 'fin'];

}
