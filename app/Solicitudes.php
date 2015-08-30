<?php namespace Acordes;

use Illuminate\Database\Eloquent\Model;

class Solicitudes extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'solicitudes';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['cliente', 'especificaciones', 'fechayhora', 'estado'];

}
