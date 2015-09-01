<?php

namespace RocketCandy\Services\Validation;

class menu extends Validation {

    /**
     * @var array Validation rules for the test form, they can contain in-built Laravel rules or our custom rules
     */
    public $rules = array(
        'nombre' => array( 'required', 'string', 'min:10','unique:opciones,nombre' ),
        'extra' => array(  'string', 'min:5'),
        'descripcion' => array( 'required', 'string', 'min:20'),
        'costo' => array( 'required', 'numeric', 'min:1','max:1000'),
        'imagen' => array('required','image','image_size:>=300,>=300')

    );

}   //end of class


//EOF