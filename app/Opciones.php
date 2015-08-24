<?php namespace Acordes;

use Illuminate\Database\Eloquent\Model;

class Opciones extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'opciones';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre', 'extra', 'descripcion', 'costo', 'imagen', 'menu'];

    public function menu()
    {
        return $this->belongsTo('Acordes\Menus','menu','id')->select(['id', 'nombre']);
    }

    public function scopeBuscar($return, $parametros){

        if(trim($parametros)!="")
        {
            $return->where(\DB::raw("CONCAT(nombre,' ',descripcion,' ',extra,' ',costo)"),"LIKE","%$parametros%");
        }

    }
}
