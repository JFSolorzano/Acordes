<?php namespace Acordes;

use Illuminate\Database\Eloquent\Model;

class Menus extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'menus';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre', 'descripcion','tipo'];

    public function opciones()
    {
        return $this->hasMany('Acordes\Opciones','menu','id');
    }

}
