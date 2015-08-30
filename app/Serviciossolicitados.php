<?php namespace Acordes;

use Illuminate\Database\Eloquent\Model;

class Serviciossolicitados extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'serviciossolicitados';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['servicio', 'solicitud'];
}
