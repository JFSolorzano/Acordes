<?php namespace Acordes;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;

class Opciones extends Model implements SluggableInterface{

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
    protected $table = 'opciones';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre', 'extra', 'descripcion', 'costo', 'imagen', 'menu', 'slug'];

    public function menu()
    {
        return $this->belongsTo('Acordes\Menus','menu','id')->select(['id', 'nombre']);
    }

}
