<?php namespace Acordes;

use Illuminate\Database\Eloquent\Model;

class Opiniones extends Model{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'opiniones';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['cliente','mensaje','estado'];

}
