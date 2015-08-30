<?php namespace Acordes;

use Illuminate\Database\Eloquent\Model;
use Zizaco\Entrust\Traits\EntrustUserTrait;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;

class Promociones extends Model implements SluggableInterface{

    use EntrustUserTrait;

    use SluggableTrait;

    protected $sluggable = [
        'build_from' => 'nombre',
        'save_to'    => 'slug',
    ];
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'promociones';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre', 'descripcion', 'imagen', 'inicio', 'fin'];

    public function scopeBuscar($return, $parametros){

        if(trim($parametros)!="")
        {
            $return->where(\DB::raw("CONCAT(nombre,' ',descripcion,' ',inicio,' ',fin)"),"LIKE","%$parametros%");
        }

    }

}
